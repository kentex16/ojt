<?php

use Ghostly\Database\DatabaseManager;

class UserModel extends DatabaseManager
{
    /** @var DatabaseManager */
    private $db;
    private $table = 'tbl_user';

    public function __construct()
    {
        $this->db = new DatabaseManager();
    }

    public function create($companyId, $departmentId, $teamId, $username, $password, $picture, $datejoined, $usertype, $isFirst, $isBanned, $isLeader)
    {
        $this->db->query("INSERT INTO $this->table (`company_id`, `department_id`, `team_id`, `user_username`, `user_password`, `user_picture`, `user_datejoined`, `user_usertype`, `is_firstlogin`, `is_banned`, `is_leader`)
            VALUES (:id, :departmentId, :teamId, :username, :password, :picture, :datejoined, :usertype, :firstlogin, :banned, :leader)");
        $this->db->handler->beginTransaction();
        $this->db->bind(':id', $companyId);
        $this->db->bind(':departmentId', $departmentId);
        $this->db->bind(':teamId', $teamId);
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $this->db->bind(':picture', $picture);
        $this->db->bind(':datejoined', $datejoined);
        $this->db->bind(':usertype', $usertype);
        $this->db->bind(':firstlogin', $isFirst);
        $this->db->bind(':banned', $isBanned);
        $this->db->bind(':leader', $isLeader);
        $this->db->execute();
        $last_insert_id = $this->db->handler->lastInsertId();
        $this->db->handler->commit();

        return $last_insert_id;
    }

    public function readAuth($username)
    {
        $this->db->query("SELECT * FROM $this->table WHERE `user_username` = :username");
        $this->db->bind(":username", $username);
        return $this->db->find();
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

    public function updateUserDetails($user_id, $team, $department)
    {
        $this->db->query("UPDATE $this->table SET `team_id` = :teamId, `department_id` = :dptId WHERE `id` = :userId");
        $this->db->bind(":userId", $user_id);
        $this->db->bind(":teamId", $team);
        $this->db->bind(":dptId", $department);

        return $this->db->execute();
    }

    public function updatePicture($userId, $picture)
    {
        $this->db->query("UPDATE $this->table SET `user_picture` = :picture WHERE `id` = :userId");
        $this->db->bind(":userId", $userId);
        $this->db->bind(":picture", $picture);
        return $this->db->execute();
    }

    public function update($userId, $username, $password)
    {
        $this->db->query("UPDATE $this->table SET `user_username` = :username, `user_password` = :password WHERE `id` = :userId");
        $this->db->bind(":userId", $userId);
        $this->db->bind(":username", $username);
        $this->db->bind(":password", $password);

        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE * FROM $this->table WHERE `id` = :id");
        $this->db->bind(":id", $id);

        return $this->db->execute();
    }
}
