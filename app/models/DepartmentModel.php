<?php

use Ghostly\Database\DatabaseManager;

class DepartmentModel extends DatabaseManager
{
    private $db;
    private $table = 'tbl_department';

    public function __construct()
    {
        $this->db = new DatabaseManager();
    }

    public function create($company_id, $departmentName)
    {
        $this->db->query("INSERT INTO $this->table (`company_id`, `department_name`)
            VALUES (:companyId, :departmentName)");
        $this->db->bind(':companyId', $company_id);
        $this->db->bind(':departmentName', $departmentName);

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
