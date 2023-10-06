<?php

class NotificationController
{
    /** @var NotificationModel */
    private $notification;

    public function __construct()
    {
        $this->notification = new NotificationModel();
    }

    public function saveNotification($company_id, $department_id, $user_id, $notif_name, $notif_desc, $notif_date, $is_read)
    {
        return $this->notification->create($company_id, $department_id, $user_id, $notif_name, $notif_desc, $notif_date, $is_read);
    }

    public function getNotification($id)
    {
        return $this->notification->read($id);
    }

    public function getAllNotification()
    {
        return $this->notification->readAll();
    }

    public function updateNotification()
    {
    }

    public function deleteNotification()
    {
    }
}
