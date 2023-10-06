<?php

use Ghostly\Database\DatabaseManager;

class TaskModel extends DatabaseManager
{
    /** @var DatabaseManager */
    private $db;
    private $table = 'tbl_task';

    public function __construct()
    {
        $this->db = new DatabaseManager();
    }

    public function create($team_id, $project_id, $name, $desc, $status)
    {
        $this->db->query("INSERT INTO $this->table (`team_id`, `project_id`, `task_name`, `task_description`, `task_status`)
            VALUES (:teamId, :projectId, :name, :desc, :status)");
        $this->db->bind(":teamId", $team_id);
        $this->db->bind(":projectId", $project_id);
        $this->db->bind(":name", $name);
        $this->db->bind(":desc", $desc);
        $this->db->bind(":status", $status);

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

    public function readProjectData($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE `project_id` = :id");
        $this->db->bind(":id", $id);
        return $this->db->find();
    }

    public function readCount($id)
    {
        $this->db->query('SELECT COUNT(*) AS "TaskCount" FROM tbl_task WHERE project_id = :id');
        $this->db->bind(":id", $id);

        return $this->db->find();
    }

    public function readCompleteCount($project_id, $status_id)
    {
        $this->db->query('SELECT COUNT(*) AS "TaskComplete" FROM tbl_task WHERE project_id = :id AND task_status = :status');
        $this->db->bind(":id", $project_id);
        $this->db->bind(":status", $status_id);

        return $this->db->find();
    }

    public function update()
    {
    }

    public function updateFile($id, $status)
    {
        $this->db->query("UPDATE $this->table SET `task_status` = :status WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->bind(":status", $status);

        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE * FROM $this->table WHERE `id` = :id");
        $this->db->bind(":id", $id);

        return $this->db->execute();
    }
}
