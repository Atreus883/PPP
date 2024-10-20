<?php

namespace App\Controllers;

use App\Models\CalendarModel;

class CalendarController extends BaseController
{
    public function index()
    {
        $calendarModel = new CalendarModel();
        $data['calendars'] = $calendarModel->findAll();
        return view('pages/dashboard', $data);
    }

    public function create()
    {
        return view('pages/add');
    }

    public function save()
    {
        $calendarModel = new CalendarModel();
        $data = [
            'user_id' => session()->get('user_id'),
            'date' => $this->request->getPost('date'),
        ];
        $calendarModel->insert($data);
        return redirect()->to('/calendars');
    }

    public function edit($id)
    {
        $calendarModel = new CalendarModel();
        $data['calendar'] = $calendarModel->find($id);
        return view('pages/edit', $data);
    }

    public function update($id)
    {
        $calendarModel = new CalendarModel();
        $data = [
            'date' => $this->request->getPost('date'),
        ];
        $calendarModel->update($id, $data);
        return redirect()->to('/calendars');
    }

    public function delete($id)
    {
        $calendarModel = new CalendarModel();
        $calendarModel->delete($id);
        return redirect()->to('/calendars');
    }
}
