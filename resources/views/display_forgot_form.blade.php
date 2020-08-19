<br>
<form action="./reset_passwd" method="post">

<div class="formblock">
    <h2>Forgot Your Password?</h2>

    <p><label for="username">Enter Your Username:</label><br />
        <input type="text" name="username" id="username" size="16" maxlength="16" required /></p>
        {{ csrf_field() }}
    <button type="submit">Change Password</button>

</div>
<br>