<?php

class AuthController
{
    /** @var UserModel */
    private $authenticate;

    public function __construct()
    {
        $this->authenticate = new UserModel();
    }

    /**
     * @param int $id
     * @param String $username
     * @param String $password
     * @return Boolean
     */
    public function verifyUser($username, $password)
    {
        $userCredentials = $this->authenticate->readAuth($username);
        if ($username == $userCredentials->user_username && $this->getPassword($userCredentials->id, $password)) {
            return $this->verifyUserLevel($userCredentials->id);
        } else {
            header("Location: /account/login?error=1");
        }
    }

    public function verifyUserLevel($id)
    {
        $userCredentials = $this->authenticate->read($id);
        if ($userCredentials->user_usertype == 0) {
            $_SESSION['user'] = $userCredentials;
            return header("Location: /account/root/");
        }

        if ($userCredentials->user_usertype == 1) {
            $_SESSION['user'] = $userCredentials;
            return header("Location: /account/admin/");
        }

        if ($userCredentials->user_usertype == 2) {
            $_SESSION['user'] = $userCredentials;
            return header("Location: /account/leader/");
        }

        if ($userCredentials->user_usertype == 3) {
            $_SESSION['user'] = $userCredentials;
            return header("Location: /account/member/");
        }
    }

    /**
     * @param String $password
     * @return String
     */
    public function setPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @param int $id
     * @param String $password
     * @return Boolean
     */
    public function getPassword($id, $password)
    {
        $userCredentials = $this->authenticate->read($id);
        return password_verify($password, $userCredentials->user_password);
    }
}
