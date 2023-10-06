<?php

class CompanyController
{
    /** @var CompanyModel */
    private $company;

    public function __construct()
    {
        $this->company = new CompanyModel();
    }

    public function saveCompany($name, $ceo, $representative, $honorific, $address, $website, $logo, $email, $cellphone, $telephone)
    {
        return $this->company->create($name, $ceo, $representative, $honorific, $address, $website, $logo, $email, $cellphone, $telephone);
    }

    public function getCompany($id)
    {
        return $this->company->read($id);
    }

    public function getAllCompany()
    {
        return $this->company->readAll();
    }

    public function updateCompany()
    {
    }

    public function deleteCompany()
    {
    }
}
