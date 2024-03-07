<?php
namespace OOP;

abstract class User{

    protected $userName;
    protected $email;

    public function setUserName(string $userName)
    {
        $this->userName = $userName;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    abstract public function showUserInfo();

}

?>