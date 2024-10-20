<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\CalendarModel;
use App\Models\EventModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = ['url', 'form'];

    /**
     * Instances of CalendarModel and EventModel
     */
    protected $calendarModel;
    protected $eventModel;

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Load session service
        $this->session = \Config\Services::session();

        // Load models
        $this->calendarModel = new CalendarModel();
        $this->eventModel = new EventModel();
    }

    /**
     * Create a new calendar entry
     */
    public function createCalendar()
    {
        $data = [
            'name' => $this->request->getPost('name'),
        ];

        if ($this->calendarModel->insert($data)) {
            return redirect()->to('/calendars')->with('message', 'Calendar created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create calendar.');
        }
    }

    /**
     * Update an existing calendar entry
     */
    public function updateCalendar($id)
    {
        $data = [
            'name' => $this->request->getPost('name'),
        ];

        if ($this->calendarModel->update($id, $data)) {
            return redirect()->to('/calendars')->with('message', 'Calendar updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update calendar.');
        }
    }

    /**
     * Delete a calendar entry
     */
    public function deleteCalendar($id)
    {
        if ($this->calendarModel->delete($id)) {
            return redirect()->to('/calendars')->with('message', 'Calendar deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete calendar.');
        }
    }

    /**
     * Create a new event entry
     */
    public function createEvent()
    {
        $data = [
            'calendar_id' => $this->request->getPost('calendar_id'),
            'title'       => $this->request->getPost('title'),
            'date'        => $this->request->getPost('date'),
        ];

        if ($this->eventModel->insert($data)) {
            return redirect()->to('/events')->with('message', 'Event created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create event.');
        }
    }

    /**
     * Update an existing event entry
     */
    public function updateEvent($id)
    {
        $data = [
            'title' => $this->request->getPost('title'),
            'date'  => $this->request->getPost('date'),
        ];

        if ($this->eventModel->update($id, $data)) {
            return redirect()->to('/events')->with('message', 'Event updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update event.');
        }
    }

    /**
     * Delete an event entry
     */
    public function deleteEvent($id)
    {
        if ($this->eventModel->delete($id)) {
            return redirect()->to('/events')->with('message', 'Event deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete event.');
        }
    }
}
