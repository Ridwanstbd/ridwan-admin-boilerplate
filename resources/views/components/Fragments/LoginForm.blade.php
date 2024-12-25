<form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST" id="loginForm">
    @csrf
    <x-Fragments.EmailInput 
        name="email"
        id="email"
        label="Email"
        placeholder="example@example.com"
        required
    />
    <x-Fragments.PasswordInput 
        name="password"
        id="password"
        label="Password"
        placeholder="input password here"
        required
    />

    <div class="flex items-center justify-between">
        <x-Elements.Checkbox 
        id="remember_me"
        name="remember"
        label="Remember Me"
        />

        <div class="text-sm">
            <x-Elements.Link href="{{ route('password.request')}}" >
                Forgot your password?
            </x-Elements.Link>
        </div>
    </div>

    <x-Elements.Form.ButtonSubmit type="submit">
        <h1>Login</h1>
    </x-Elements.Form.ButtonSubmit>
</form>