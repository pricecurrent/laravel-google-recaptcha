@if (session()->has('flash_message'))
    <div class="alert">
        {{ session('flash_message') }}
    </div>
@endif
