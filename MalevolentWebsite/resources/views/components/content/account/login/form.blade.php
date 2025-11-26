<div class="login">
    <form method="POST" action="{{ route('auth.login') }}">
        @csrf

        <input type="text" name="name" placeholder="Please insert your username">
        <input type="password" name="password" placeholder="Please insert your password">

        <div class="checkbox">
            <input id="c1-13" name="remember" type="checkbox">
            <label for="c1-13">Remember Me</label>
        </div>

        <button type="submit">Login</button>
    </form>

    <div class="login-social">
        <a href="/discord/redirect">Login via Discord</a>
    </div>
</div>
