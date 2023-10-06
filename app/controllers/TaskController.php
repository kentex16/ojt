<?php

class TaskController
{
    /** @var TaskModel */
    private $task;

    public function __construct()
    {
        $this->task = new TaskModel();
    }

    public function saveTask($team_id, $project_id, $name, $desc, $status)
    {
        return $this->task->create($team_id, $project_id, $name, $desc, $status);
    }

    public function getTask($id)
    {
        return $this->task->read($id);
    }

    public function getAllTask()
    {
        return $this->task->readAll();
    }

    public function getTaskCount($id)
    {
        return $this->task->readCount($id);
    }

    public function getTaskComplete($project_id, $status_id)
    {
        return $this->task->readCompleteCount($project_id, $status_id);
    }

    public function getTaskProject($id)
    {
        return $this->task->readProjectData($id);
    }

    public function updateTask()
    {
    }

    public function updateTaskStatus($id, $status)
    {
        return $this->task->updateFile($id, $status);
    }

    public function deleteTask()
    {
    }
}
