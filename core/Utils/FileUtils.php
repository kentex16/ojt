<?php

class FileUtils
{
    public function setFile($array)
    {
        foreach ($this->sanitizeArray($array) as $file) {
            echo ($file['name']) . "<br />";
        }
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
