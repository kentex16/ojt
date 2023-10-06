<?php

use Ghostly\Database\DatabaseManager;

class NotificationModel extends DatabaseManager
{
    private $db;
    private $table = 'tbl_notification';

    public function __construct()
    {
        $this->db = new DatabaseManager();
    }

    public function create($company_id, $department_id, $user_id, $notif_name, $notif_desc, $notif_date, $is_read)
    {
        $this->db->query("INSERT INTO $this->table (`company_id`, `department_id`, `user_id`, `notif_name`, `notif_description`, `notif_date`, `is_read`)
            VALUES (:companyId, :departmentId, :userId, :name, :description, :date, :read)");
        $this->db->bind(":companyId", $company_id);
        $this->db->bind(":departmentId", $department_id);
        $this->db->bind(":userId", $user_id);
        $this->db->bind(":name", $notif_name);
        $this->db->bind(":description", $notif_desc);
        $this->db->bind(":date", $notif_date);
        $this->db->bind(":read", $is_read);

        return $this->db->execute();
    }

    public function read($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE `id` = :id");
        $this->db->bind(":id", $id);
        return $this->db->find();
    }

    public function readAll()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->findAll();
    }

    public function update()
    {
    }

    public function delete($id)
    {
        $this->db->query("DELETE * FROM $this->table WHERE `id` = :id");
        $this->db->bind(":id", $id);

        return $this->db->execute();
    }
}
