<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css'); ?>" />
</head>
<body>
    <?= view('navbar') ?>
    
    <div class="dashboard-container">
        <h2>Welcome to your Dashboard</h2>

        <h3>Your Calendars</h3>
        <table class="calendar-table">
            <tr>
                <th>Calendar ID</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($calendars as $calendar): ?>
            <tr>
                <td><?= $calendar['id'] ?></td>
                <td>
                    <a href="<?= site_url("/event_form/{$calendar['id']}") ?>" class="btn btn-primary">Add Event</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h3>Your Events</h3>
        <table class="event-table">
            <tr>
                <th>Event Title</th>
                <th>Date</th>
            </tr>
            <?php foreach ($events as $event): ?>
            <tr>
                <td><?= $event['event_title'] ?></td>
                <td><?= $event['event_date'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <?= view('footer') ?>
</body>
</html>
