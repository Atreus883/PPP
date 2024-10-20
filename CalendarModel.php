<?php namespace App\Models;

use CodeIgniter\Model;

class CalendarModel extends Model
{
    protected $table = 'calendars';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'date'];
    protected $useTimestamps = false;
    
    // Relasi ke tabel users
    public function getUserCalendars($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }
}
