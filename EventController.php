<?php

namespace App\Controllers;

use App\Models\EventModel;

class EventController extends BaseController
{
    public function index()
    {
        $eventModel = new EventModel();
        $data['events'] = $eventModel->findAll();
        return view('pages/dashboard', $data);
    }

    public function create()
    {
        return view('pages/event_form');
    }

    public function save()
    {
        $eventModel = new EventModel();
        $data = [
            'calendar_id' => $this->request->getPost('calendar_id'),
            'event_title' => $this->request->getPost('event_title'),
            'event_description' => $this->request->getPost('event_description'),
            'event_date' => $this->request->getPost('event_date'),
        ];
        $eventModel->insert($data);
        return redirect()->to('/events');
    }

    public function edit($id)
    {
        $eventModel = new EventModel();
        $data['event'] = $eventModel->find($id);
        return view('pages/edit', $data);
    }

    public function update($id)
    {
        $eventModel = new EventModel();
        $data = [
            'event_title' => $this->request->getPost('event_title'),
            'event_description' => $this->request->getPost('event_description'),
            'event_date' => $this->request->getPost('event_date'),
        ];
        $eventModel->update($id, $data);
        return redirect()->to('/events');
    }

    public function delete($id)
    {
        $eventModel = new EventModel();
        $eventModel->delete($id);
        return redirect()->to('/events');
    }
}
