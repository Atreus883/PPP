<?php namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $allowedFields = ['calendar_id', 'event_title', 'event_description', 'event_date'];
    protected $useTimestamps = false;

    // Relasi ke tabel calendars
    public function getEventsByCalendar($calendarId)
    {
        return $this->where('calendar_id', $calendarId)->findAll();
    }
}
