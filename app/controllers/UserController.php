<?php

class UserController
{
    /** @var UserModel */
    private $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function saveUser($companyId, $departmentId, $teamId, $username, $password, $picture, $datejoined, $usertype, $isFirst, $isBanned, $isLeader)
    {
        return $this->user->create($companyId, $departmentId, $teamId, $username, $password, $picture, $datejoined, $usertype, $isFirst, $isBanned, $isLeader);
    }

    public function getUser($id)
    {
        return $this->user->read($id);
    }

    public function getUserPicture($id)
    {
        $userDetails = $this->user->read($id);
        return $userDetails->user_picture != "" ? $userDetails->user_picture : "/assets/img/default.jpg";
    }

    public function getAllUser()
    {
        return $this->user->readAll();
    }

    public function updateUser($userId, $username, $password)
    {
        return $this->user->update($userId, $username, $password);
    }

    public function updateUserInfo($user_id, $team, $department)
    {
        return $this->user->updateUserDetails($user_id, $team, $department);
    }

    public function updateUserPicture($userId, $picture)
    {
        return $this->user->updatePicture($userId, $picture);
    }

    public function deleteUser()
    {
    }
}
