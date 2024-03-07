<?php

namespace OOP;


class Employee extends User{

    protected $role;
    protected $salary;
    protected $stack = [];

    function __construct($userName, $email, $role){ // kvieciamas objekto kurimo metu
        $this->userName = $userName;
        $this->email = $email;
        $this->role = $role;
    }


    public function setSalary(int $salary){
        $this->salary = $salary;
    }

    public function getSalary(){
        return $this->salary;
    }

    public function setRole(string $role){
        $this->role = $role;
    }

    public function getRole(){
        return $this->role;
    }

    public function setStack(...$stack){
        foreach($stack as $key=>$value){
            $this->stack[] = trim(strtolower($value));
        }
    }

    public function getStack(){
        return $this->stack;
    }
    

    public function showUserInfo(){ // objekto metodas arba getter
        return [
            $this->userName,
            $this->email,
            $this->role,
            $this->salary,
            'stack' => $this->stack
        ];
    }



    public static function availableRoles() {
            return ['manager', 'coder', 'tester'];
    }




}