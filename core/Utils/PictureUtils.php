<?php

class PictureUtils
{
    public function setImage($pictureArray)
    {
        $location = $_SERVER["DOCUMENT_ROOT"] . "/public/assets/img/uploads";
        $fileName = $pictureArray["name"];
        $fileTemp = $pictureArray["tmp_name"];
        $fileSize = $pictureArray["size"];
        $newFileName = $_SESSION['user']->user_username . "_" . $fileName;

        if (move_uploaded_file($fileTemp, $location . "/" . $newFileName)) {
            return "/assets/img/uploads/" . $newFileName;
        }
    }

    public function companyImage($pictureArray)
    {
        $location = $_SERVER["DOCUMENT_ROOT"] . "/public/assets/img/uploads";
        $fileName = $pictureArray["name"];
        $fileTemp = $pictureArray["tmp_name"];
        $fileSize = $pictureArray["size"];
        $newFileName = "Company_" . $fileName;

        if (move_uploaded_file($fileTemp, $location . "/" . $newFileName)) {
            return "/assets/img/uploads/" . $newFileName;
        }
    }

    public function arrayFile($array)
    {
        foreach ($array as $files) {
            echo $files["name"] . "<br>";
        }
    }

    public function checkImage($array)
    {
        return move_uploaded_file($array["name"], "/public/assets/uploads/");
    }
}
