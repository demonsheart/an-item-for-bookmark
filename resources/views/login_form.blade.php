<p><a href="/register">Not a member?</a></p>
<form method="post" action="./auth_login">
    {{-- 输出错误信息 --}}
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="formblock">
        <h2>Members Log In Here</h2>

        <p><label for="username">Username:</label><br />
            <input type="text" name="username" id="username" required /></p>

        <p><label for="passwd">Password:</label><br />
            <input type="password" name="passwd" id="passwd" required /></p>
            {{ csrf_field() }}
        <button type="submit">Log In</button>

        <p><a href="/forgot_form">Forgot your password?</a></p>
    </div>

</form>