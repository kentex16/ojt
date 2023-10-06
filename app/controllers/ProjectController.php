<?php

class ProjectController
{
    /** @var ProjectModel */
    private $project;

    public function __construct()
    {
        $this->project = new ProjectModel();
    }

    public function saveProject($company_id, $department_id, $team_id, $title, $desc, $status, $sdate, $edate, $progress)
    {
        return $this->project->create($company_id, $department_id, $team_id, $title, $desc, $status, $sdate, $edate, $progress);
    }

    public function getProject($id)
    {
        return $this->project->read($id);
    }

    public function getAllProject()
    {
        return $this->project->readAll();
    }

    public function updateProject()
    {
    }

    public function deleteProject()
    {
    }
}
