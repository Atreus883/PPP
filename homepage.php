<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/homepage.css'); ?>" />
</head>
<body>
    <?= view('navbar') ?>
    
    <div class="container">
        <h1>Welcome to the Schedule Management System</h1>
        <p>Manage your calendar and events effectively!</p>
        <p>Sign up now!</p>
        <a href="<?= site_url('/login') ?>" class="btn btn-primary">Login</a>
        <a href="<?= site_url('/signin') ?>" class="btn btn-secondary">Sign In</a>
    </div>

    <?= view('footer') ?>
</body>
</html>
