<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css'); ?>" />
</head>
<body>
    <?= view('navbar') ?>
    
    <div class="login-container">
        <h2>Login</h2>
        <form action="<?= site_url('/login') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p>Don't have an account? <a href="<?= site_url('/signin') ?>">Sign In</a></p>
    </div>

    <?= view('footer') ?>
</body>
</html>
