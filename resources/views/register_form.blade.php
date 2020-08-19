<form method="post" action="./auth_register">
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
        <h2>Register Now</h2>

        <p><label for="email">Email Address:</label><br />
            <input type="email" name="email" id="email" size="30" maxlength="100" required /></p>

        <p><label for="username">Preferred Username <br>(between 4 and 20 chars):</label><br />
            <input type="text" name="username" id="username" size="16" maxlength="16" required /></p>

        <p><label for="passwd">Password <br>(between 8 and 20 chars):</label><br />
            <input type="password" name="passwd" id="passwd" size="16" maxlength="16" required /></p>

        <p><label for="passwd2">Confirm Password:</label><br />
            <input type="password" name="passwd2" id="passwd2" size="16" maxlength="16" required /></p>

        {{ csrf_field() }}
        <button type="submit">Register</button>

    </div>

</form>