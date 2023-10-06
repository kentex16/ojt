<?php

use Ghostly\Database\DatabaseManager;

class CompanyModel extends DatabaseManager
{
    private $db;
    private $table = 'tbl_company';

    public function __construct()
    {
        $this->db = new DatabaseManager();
    }

    public function create($name, $ceo, $representative, $honorific, $address, $website, $logo, $email, $cellphone, $telephone)
    {
        $this->db->query("INSERT INTO $this->table (`company_name`, `company_ceo`, `company_representative`, `company_honorifics`, `company_address`, 
            `company_website`, `company_logo`, `company_email`, `company_cellphone`, `company_telephone`)
            VALUES (:name, :ceo, :rep, :honorific, :address, :website, :logo, :email, :cellphone, :telephone)");
        $this->db->bind(":name", $name);
        $this->db->bind(":ceo", $ceo);
        $this->db->bind(":rep", $representative);
        $this->db->bind(":honorific", $honorific);
        $this->db->bind(":address", $address);
        $this->db->bind(":website", $website);
        $this->db->bind(":logo", $logo);
        $this->db->bind(":email", $email);
        $this->db->bind(":cellphone", $cellphone);
        $this->db->bind(":telephone", $telephone);

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

    public function update()
    {
    }

    public function delete($id)
    {
        $this->db->query("DELETE * FROM $this->table WHERE `id` = :id");
        $this->db->bind(":id", $id);

        return $this->db->execute();
    }
}
