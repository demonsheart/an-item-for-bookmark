<form method="post" action="register_new.php">

    <div class="formblock">
        <h2>Register Now</h2>

        <p><label for="email">Email Address:</label><br />
            <input type="email" name="email" id="email" size="30" maxlength="100" required /></p>

        <p><label for="username">Preferred Username <br>(max 16 chars):</label><br />
            <input type="text" name="username" id="username" size="16" maxlength="16" required /></p>

        <p><label for="passwd">Password <br>(between 6 and 16 chars):</label><br />
            <input type="password" name="passwd" id="passwd" size="16" maxlength="16" required /></p>

        <p><label for="passwd2">Confirm Password:</label><br />
            <input type="password" name="passwd2" id="passwd2" size="16" maxlength="16" required /></p>


        <button type="submit">Register</button>

    </div>

</form>