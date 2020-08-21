<br>
<form action="./change_passwd" method="post">
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
    <h2>Change Password</h2>

    <p><label for="old_passwd">Old Password:</label><br />
        <input type="password" name="old_passwd" id="old_passwd" size="20" maxlength="20" required /></p>

    <p><label for="passwd2">New Password:</label><br />
        <input type="password" name="new_passwd" id="new_passwd" size="20" maxlength="20" required /></p>

    <p><label for="passwd2">Repeat New Password:</label><br />
        <input type="password" name="new_passwd2" id="new_passwd2" size="20" maxlength="20" required /></p>

    {{ csrf_field() }}
    <button type="submit">Change Password</button>

</div>
<br>