<?php

class EventController
{
    /** @var EventModel */
    private $event;

    public function __construct()
    {
        $this->event = new EventModel();
    }

    public function saveEvent($company_id, $event_name, $event_sdate, $event_edate)
    {
        return $this->event->create($company_id, $event_name, $event_sdate, $event_edate);
    }

    public function getEvent($id)
    {
        return $this->event->read($id);
    }

    public function getAllEvent()
    {
        return $this->event->readAll();
    }

    public function updateEvent()
    {
    }

    public function deleteEvent()
    {
    }
}
