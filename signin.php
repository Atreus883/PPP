<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/signin.css'); ?>" />
</head>
<body>
    <?= view('navbar') ?>
    
    <div class="signin-container">
        <h2>Sign In</h2>
        <form action="<?= site_url('/signin') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
        </form>
        <p>Already have an account? <a href="<?= site_url('/login') ?>">Login</a></p>
    </div>

    <?= view('footer') ?>
</body>
</html>
