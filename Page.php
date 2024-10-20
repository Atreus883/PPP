<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CalendarModel;
use App\Models\EventModel;

class Page extends BaseController
{
    public function homepage()
    {
        // Memuat view homepage
        return view('homepage');
    }

    public function signin()
    {
        // Memuat view halaman signin
        return view('pages/signin');
    }

    public function login()
    {
        // Memuat view halaman login
        return view('pages/login');
    }

    public function dashboard()
    {
        // Ambil data pengguna dari session
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/login');
        }

        // Ambil data kalender dan acara dari model
        $calendarModel = new CalendarModel();
        $eventModel = new EventModel();

        // Ambil kalender untuk pengguna yang sedang login
        $calendars = $calendarModel->where('user_id', $userId)->findAll();
        $events = $eventModel->whereIn('calendar_id', array_column($calendars, 'id'))->findAll();

        // Kirim data ke view dashboard
        $data = [
            'calendars' => $calendars,
            'events' => $events,
        ];

        return view('pages/dashboard', $data);
    }

    public function logout()
    {
        // Menghancurkan session untuk logout
        session()->destroy();
        return redirect()->to('/login');
    }
}
