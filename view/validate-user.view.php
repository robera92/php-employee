<?php 

use OOP\Employee;

$has_error = false;

$userName = preg_match('/^[a-zA-Z0-9_]+$/', $_POST['userName']) ? filter_var($_POST['userName'], FILTER_SANITIZE_STRING) : $has_error = 'Invalid username!';
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : $has_error = 'Invalid email!';
$role = in_array($_POST['role'], Employee::availableRoles()) ? filter_var($_POST['role'], FILTER_SANITIZE_STRING) : $has_error = 'Invalid role!';
$salary = intval($_POST['salary']) > 0 ? intval($_POST['salary']) : $has_error = 'Invalid salary!';
$stack = preg_match('/^[a-zA-Z0-9 ,]+$/', $_POST['stack']) ? filter_var($_POST['stack'], FILTER_SANITIZE_STRING) : $has_error = 'Invalid stack!';


if($has_error){
    echo '<div class="alert alert-warning" role="alert">'.$has_error.'</div>';
}
else{
    echo'<div class="alert alert-success" role="alert">This is a success alert—check it out!</div>';

    $user = new Employee($userName, $email, $role);
    $user->setSalary($salary);

    foreach(explode(',', $stack) as $value){
        $user->setStack($value);
    }
    
    
    var_dump($user);

    echo'<hr>';

    foreach($user->showUserInfo() as $value){
        if(is_array($value)){
            foreach ($value as $val){
                echo "$val<br>";
            }
        }
        else{
            echo "$value<br>";
        }
    }

}
