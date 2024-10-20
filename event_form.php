<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Form</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/event_form.css'); ?>" />
</head>
<body>
    <?= view('navbar') ?>
    
    <div class="event-form-container">
        <h2>Create New Event</h2>
        <form action="<?= site_url('/add_event') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="calendar_id" value="<?= $calendarId ?>">
            <div class="form-group">
                <label for="event_title">Event Title</label>
                <input type="text" name="event_title" id="event_title" required>
            </div>
            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" name="event_date" id="event_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>
    </div>

    <?= view('footer') ?>
</body>
</html>
