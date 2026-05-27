<!DOCTYPE html>
<html>
<head><title>Login Page</title></head>
<body style="font-family: sans-serif; text-align: center; padding-top: 50px;">
    <h2>Login Area</h2>
    
    <form action="<?= base_url('login-check') ?>" method="POST">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Sign In</button>
    </form>
</body>
</html>