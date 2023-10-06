<?php

use Ghostly\Database\DatabaseManager;

class EventModel extends DatabaseManager
{
    private $db;
    private $table = 'tbl_event';

    public function __construct()
    {
        $this->db = new DatabaseManager();
    }

    public function create($company_id, $event_name, $event_sdate, $event_edate)
    {
        $this->db->query("INSERT INTO $this->table (`company_id`, `event_name`, `event_sdate`, `event_edate`)
            VALUES (:companyId, :name, :sdate, :edate)");
        $this->db->bind(":companyId", $company_id);
        $this->db->bind(":name", $event_name);
        $this->db->bind(":sdate", $event_sdate);
        $this->db->bind(":edate", $event_edate);

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
