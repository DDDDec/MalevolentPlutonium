<form method="POST" action="{{ route('auth.register') }}">
    @csrf

    <input type="email" name="email" placeholder="Please insert your email">
    <input type="email" name="email_confirmation" placeholder="Please confirm your email">
    <input type="password" name="password" placeholder="Please insert your password">
    <input type="password" name="password_confirmation" placeholder="Please confirm your password">
    <input type="password" name="code" placeholder="Please insert your in game code">

    <div class="checkbox">
        <input id="c1-13" name="terms" type="checkbox">
        <label for="c1-13">Terms & Conditions</label>
    </div>

    <button type="submit">Register</button>
</form>
