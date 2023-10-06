<?php

use Ghostly\Database\DatabaseManager;

class FileModel extends DatabaseManager
{
    private $db;
    private $table = 'tbl_filerepository';

    public function __construct()
    {
        $this->db = new DatabaseManager();
    }

    public function create($team_id, $project_id, $name, $desc, $filename, $directory)
    {
        $this->db->query("INSERT INTO $this->table (`team_id`, `project_id`, `file_name`, `file_description`, `file_filename`, `file_directory`)
            VALUES (:teamid, :projectid, :name, :desc, :filename, :directory)");
        $this->db->bind(":teamid", $team_id);
        $this->db->bind(":projectid", $project_id);
        $this->db->bind(":name", $name);
        $this->db->bind(":desc", $desc);
        $this->db->bind(":filename", $filename);
        $this->db->bind(":directory", $directory);

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
