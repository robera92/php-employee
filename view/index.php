<?php

    require('../vendor/autoload.php');

    use OOP\Employee;
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
        <h1 class="d-print-none">New Employee</h1>
        <?php if(isset($_POST['userName']) && !empty($_POST['userName'])){
            include('validate-user.view.php');
        } 
        ?>
        <div class="d-print-none">
        <hr/>
        <h2>Data Entry Form</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="userName" class="form-label">User Name</label>
                <input type="text" name="userName" class="form-control" id="userName"  value="<?=isset($_POST['userName']) ? htmlspecialchars($_POST['userName']): ''?>" placeholder="Enter user name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" value="<?=isset($_POST['email']) ? htmlspecialchars($_POST['email']): ''?>" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-select"  required>
                    <option value="" disabled selected>Please select</option>
                    <?php foreach (Employee::availableRoles() as $key=>$value): ?>
                        <option value="<?= htmlspecialchars($value) ?>" <?=isset($_POST['role']) && $_POST['role'] == $value ? 'selected' : ''?>><?= htmlspecialchars(ucwords($value)) ?></option>
                    <?php endforeach; ?>
                    <option value="bad">Wrong role to check</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" name="salary" class="form-control"  value="<?=isset($_POST['salary']) ? intval($_POST['salary']): ''?>" id="salary" placeholder="Enter salary" required>
            </div>
            <div class="mb-3">
                <label for="stack" class="form-label">Stack (ex: php, mysql, js)</label>
                <input type="text" name="stack" class="form-control" id="stack"  value="<?=isset($_POST['stack']) ? htmlspecialchars($_POST['stack']): ''?>" placeholder="Stack, separated by comma" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    
        </div>
    </body>
    </html>