<?php

class FileController
{
    /** @var FileModel */
    private $file;

    public function __construct()
    {
        $this->file = new FileModel();
    }

    public function saveFile($team_id, $project_id, $name, $desc, $array)
    {
        $location = $_SERVER["DOCUMENT_ROOT"] . "/public/assets/img/uploads";
        foreach ($this->sanitizeArray($array) as $file) {
            $newFileName = "task" . $team_id . "_file_" . $file['name'];
            if (move_uploaded_file($file['tmp_name'], $location . "/" . $newFileName)) {
                $this->file->create($team_id, $project_id, $name, $desc, $file['name'], ("/assets/img/uploads/" . $newFileName));
            }
        }
    }

    public function getFile($id)
    {
        return $this->file->read($id);
    }

    public function getAllFile()
    {
        return $this->file->readAll();
    }

    public function updateFile()
    {
    }

    public function deleteFile()
    {
    }

    private function sanitizeArray(&$file_post)
    {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }
        return $file_ary;
    }
}
