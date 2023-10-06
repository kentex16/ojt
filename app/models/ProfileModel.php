<?php

use Ghostly\Database\DatabaseManager;

class ProfileModel extends DatabaseManager
{
    /** @var DatabaseManager */
    private $db;
    private $table = 'tbl_profile';
    private $table2 = 'tbl_user';

    public function __construct()
    {
        $this->db = new DatabaseManager();
    }

    public function create($userId, $fname, $mname, $lname, $birthday, $gender, $address, $house, $street, $barangay, $city, $zipcode, $email, $telephone, $cellphone)
    {
        $this->db->query("INSERT INTO $this->table (`user_id`, `profile_fname`, `profile_mname`, `profile_lname`, `profile_birthday`, `profile_gender`, `profile_fulladdress`, `profile_house`, `profile_street`, `profile_barangay`, `profile_city`, `profile_zipcode`, `profile_email`, `profile_telephone`, `profile_cellphone`)
            VALUES (:id, :fname, :mname, :lname, :bday, :gender, :address, :house, :street, :barangay, :city, :zipcode, :email, :telephone, :cellphone)");
        $this->db->bind(":id", $userId);
        $this->db->bind(":fname", $fname);
        $this->db->bind(":mname", $mname);
        $this->db->bind(":lname", $lname);
        $this->db->bind(":bday", $birthday);
        $this->db->bind(":gender", $gender);
        $this->db->bind(":address", $address);
        $this->db->bind(":house", $house);
        $this->db->bind(":street", $street);
        $this->db->bind(":barangay", $barangay);
        $this->db->bind(":city", $city);
        $this->db->bind(":zipcode", $zipcode);
        $this->db->bind(":email", $email);
        $this->db->bind(":telephone", $telephone);
        $this->db->bind(":cellphone", $cellphone);

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

    public function update($userId, $fname, $mname, $lname, $gender, $address, $house, $street, $barangay, $city, $country, $zipcode, $email, $cellphone)
    {
        $this->db->query("UPDATE $this->table SET 
            `profile_fname` = :firstname, `profile_mname` = :middlename, `profile_lname` = :lastname,
            `profile_gender` = :gender, `profile_fulladdress` = :address, 
            `profile_house` = :house, `profile_street` = :street, `profile_barangay` = :barangay,
            `profile_city` = :city, `profile_country` = :country, `profile_zipcode` = :zipcode, 
            `profile_email` = :email, `profile_cellphone` = :cellphone
            WHERE `id` = :userId");
        $this->db->handler->beginTransaction();
        $this->db->bind(":userId", $userId);
        $this->db->bind(":firstname", $fname);
        $this->db->bind(":middlename", $mname);
        $this->db->bind(":lastname", $lname);
        $this->db->bind(":gender", $gender);
        $this->db->bind(":address", $address);
        $this->db->bind(":house", $house);
        $this->db->bind(":street", $street);
        $this->db->bind(":barangay", $barangay);
        $this->db->bind(":city", $city);
        $this->db->bind(":country", $country);
        $this->db->bind(":zipcode", $zipcode);
        $this->db->bind(":email", $email);
        $this->db->bind(":cellphone", $cellphone);
        $this->db->execute();

        return $this->db->handler->commit();
    }

    public function updateProfileInfo($profile_id, $email, $contact, $address)
    {
        $this->db->query("UPDATE $this->table SET `profile_email` = :email, `profile_cellphone` = :cellphone, `profile_fulladdress` = :address WHERE `id` = :profileId");
        $this->db->bind(":profileId", $profile_id);
        $this->db->bind(":email", $email);
        $this->db->bind(":cellphone", $contact);
        $this->db->bind(":address", $address);

        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE * FROM $this->table WHERE `id` = :id");
        $this->db->bind(":id", $id);

        return $this->db->execute();
    }
}
