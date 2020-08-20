<br>
<form action="./reset_passwd" method="post">
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
    <h2>Forgot Your Password?</h2>

    <p><label for="username">Enter Your Username:</label><br />
        <input type="text" name="username" id="username" size="20" maxlength="20" required /></p>
        {{ csrf_field() }}
    <button type="submit">Change Password</button>

</div>
<br>