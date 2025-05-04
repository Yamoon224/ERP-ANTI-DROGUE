<x-auth-layout>
    <div class="text-center w-90 m-auto">
        <p class="mb-2 {{ $errors->get('email') ? 'text-danger' : (session('status') ? 'text-success' : '') }}">
            {{ $errors->get('email') ? $errors->get('email')[0] : (session('status') ? session('status') : '') }}
        </p>
    </div>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label for="username" class="form-label">@lang('locale.username')</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="@lang('locale.username')" required>
        </div>

        <div class="mb-2">
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-muted float-end"><small>@lang('locale.forgot_pwd')</small></a>
            @endif

            <label for="password" class="form-label">@lang('locale.password')</label>
            <div class="input-group input-group-merge">
                <input type="password" id="password" name="password" class="form-control" placeholder="@lang('locale.password')" required>
                <div class="input-group-text" data-password="false">
                    <span class="password-eye"></span>
                </div>
            </div>
        </div>

        <div class="mb-2">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember">
                <label class="form-check-label" for="checkbox-signin">@lang('locale.remember_me')</label>
            </div>
        </div>

        <div class="mb-2 text-center">
            <button class="btn btn-block btn-primary"> @lang('locale.sign_in') </button>
        </div>
    </form>
</x-auth-layout>
