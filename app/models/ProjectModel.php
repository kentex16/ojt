<?php

use Ghostly\Database\DatabaseManager;

class ProjectModel extends DatabaseManager
{
    private $db;
    private $table = 'tbl_project';

    public function __construct()
    {
        $this->db = new DatabaseManager();
    }

    public function create($company_id, $department_id, $team_id, $title, $desc, $status, $sdate, $edate, $progress)
    {
        $this->db->query("INSERT INTO $this->table (`company_id`, `department_id`, `team_id`, `project_title`, `project_description`,
            `project_status`, `project_sdate`, `project_edate`, `project_progress`)
            VALUES (:companyId, :departmentId, :teamId, :title, :desc, :status, :sdate, :edate, :progress)");
        $this->db->bind(":companyId", $company_id);
        $this->db->bind(":departmentId", $department_id);
        $this->db->bind(":teamId", $team_id);
        $this->db->bind(":title", $title);
        $this->db->bind(":desc", $desc);
        $this->db->bind(":status", $status);
        $this->db->bind(":sdate", $sdate);
        $this->db->bind(":edate", $edate);
        $this->db->bind(":progress", $progress);

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
