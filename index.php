<?php
require "config.php";

use App\Employee;

$employee = Employee::list();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container">
        <div class="row header">
            <h1>LIST OF DEPARTMENTS</h1>
        </div>
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>DEPARTMENT NUMBER</th>
                    <th>DEPARTMENT NAME</th>
                    <th>MANAGER NAME</th>
                    <th>FROM DATE</th>
                    <th>TO DATE</th>
                    <th>TOTAL YEARS</th>
                    <th>EMPLOYEES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employee as $employee) : ?>
                    <tr>
                        <td><?php echo $employee->getDeptNo(); ?></td>
                        <td><?php echo $employee->getDeptName(); ?></td>
                        <td><?php echo $employee->getFullName(); ?></td>
                        <td><?php echo $employee->getHireDate(); ?></td>
                        <td>Current</td>
                        <td><?php echo $employee->getTotalYear(); ?></td>
                        <td><a href="list_employees.php?dept_no=<?php echo $employee->getDeptNo(); ?>">VIEW</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #e9e9e9;
    }

    caption {
        font-weight: bold;
        margin-bottom: 10px;
    }

    h1 {
        font-family: Arial, sans-serif;
    }
</style>