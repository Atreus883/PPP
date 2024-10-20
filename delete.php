<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Event</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css'); ?>" />
</head>
<body>
    <?= view('navbar') ?>

    <div class="dashboard-container">
        <h2>Delete Event</h2>
        <form action="<?= site_url('/delete_event') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="event_id">Event ID</label>
                <input type="text" name="event_id" id="event_id" required>
            </div>
            <button type="submit" class="btn btn-danger">Delete Event</button>
        </form>
    </div>

    <?= view('footer') ?>
</body>
</html>
