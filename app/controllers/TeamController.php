<?php

class TeamController
{
    /** @var TeamModel */
    private $team;

    public function __construct()
    {
        $this->team = new TeamModel();
    }

    public function saveTeam($company_id, $department_id, $user_id, $name, $currentsize, $maxsize)
    {
        return $this->team->create($company_id, $department_id, $user_id, $name, $currentsize, $maxsize);
    }

    public function getTeam($id)
    {
        return $this->team->read($id);
    }

    public function getAllTeam()
    {
        return $this->team->readAll();
    }

    public function updateTeam()
    {
    }

    public function deleteTeam()
    {
    }
}
