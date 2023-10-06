<?php

class ProfileController
{
    /** @var ProfileModel */
    private $profile;

    public function __construct()
    {
        $this->profile = new ProfileModel();
    }

    public function saveProfile($userId, $fname, $mname, $lname, $birthday, $gender, $address, $house, $street, $barangay, $city, $zipcode, $email, $telephone, $cellphone)
    {
        return $this->profile->create($userId, $fname, $mname, $lname, $birthday, $gender, $address, $house, $street, $barangay, $city, $zipcode, $email, $telephone, $cellphone);
    }

    public function getProfile($id)
    {
        return $this->profile->read($id);
    }

    public function getAllProfile()
    {
        return $this->profile->readAll();
    }

    public function updateProfile($userId, $fname, $mname, $lname, $gender, $address, $house, $street, $barangay, $city, $country, $zipcode, $email, $cellphone)
    {
        return $this->profile->update($userId, $fname, $mname, $lname, $gender, $address, $house, $street, $barangay, $city, $country, $zipcode, $email, $cellphone);
    }

    public function updateUserProfile($profile_id, $email, $contact, $address)
    {
        return $this->profile->updateProfileInfo($profile_id, $email, $contact, $address);
    }

    public function deleteProfile()
    {
    }
}
