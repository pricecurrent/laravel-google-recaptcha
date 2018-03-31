<?php

namespace App\Http\Controllers;

use App\Post;
use Zttp\Zttp;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }


    public function store()
    {
        $response = Zttp::asFormParams()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('captcha.captcha.secret'),
            'response' => request('g-recaptcha-response'),
            'remoteip' => request()->ip(),
        ]);


        if ($response->json()['success'] !== true) {
            return redirect()->back()->withFlashMessage('Вы што, робот?');
        }

        $post = Post::create([
            'title' => request('title'),
        ]);

        return back()->withFlashMessage('Ваш пост успешно добавлен');
    }
}
