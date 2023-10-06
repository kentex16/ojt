<?php

use Ghostly\Database\DatabaseManager;

class TeamModel extends DatabaseManager
{
    /** @var DatabaseManager */
    private $db;
    private $table = 'tbl_team';

    public function __construct()
    {
        $this->db = new DatabaseManager();
    }

    public function create($company_id, $department_id, $user_id, $name, $currentsize, $maxsize)
    {
        $this->db->query("INSERT INTO $this->table (`company_id`, `department_id`, `user_id`, `team_name`, `team_currentsize`, `team_maxsize`)
            VALUES (:companyId, :departmentId, :userId, :name, :size, :maxsize)");
        $this->db->bind(":companyId", $company_id);
        $this->db->bind(":departmentId", $department_id);
        $this->db->bind(":userId", $user_id);
        $this->db->bind(":name", $name);
        $this->db->bind(":size", $currentsize);
        $this->db->bind(":maxsize", $maxsize);

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
