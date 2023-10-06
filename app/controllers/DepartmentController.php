<?php

class DepartmentController
{
    /** @var DepartmentModel */
    private $department;

    public function __construct()
    {
        $this->department = new DepartmentModel();
    }

    public function saveDepartment($company_id, $name)
    {
        return $this->department->create($company_id, $name);
    }

    public function getDepartment($id)
    {
        return $this->department->read($id);
    }

    public function getAllDepartment()
    {
        return $this->department->readAll();
    }

    public function updateDepartment()
    {
    }

    public function deleteDepartment()
    {
    }
}
