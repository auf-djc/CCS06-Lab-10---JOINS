<?php
require "config.php";

use App\Employee;

if (isset($_GET['dept_no'])) {
    $dept_no = $_GET['dept_no'];
    $employees = Employee::getById($dept_no);
}

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
            <h1>LIST OF EMPLOYEES</h1>
        </div>
        <?php if (isset($employees) && count($employees) > 0) { ?>
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>TITLE</th>
                        <th>FULL NAME</th>
                        <th>BIRTHDAY</th>
                        <th>AGE</th>
                        <th>GENDER</th>
                        <th>HIRE DATE</th>
                        <th>SALARY</th>
                        <th>SALARY HISTORY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee) { ?>
                        <tr>
                            <td><?php echo $employee->getTitle(); ?></td>
                            <td><?php echo $employee->getFullName(); ?></td>
                            <td><?php echo $employee->getBirth(); ?></td>
                            <td><?php echo $employee->getAge(); ?></td>
                            <td><?php echo $employee->getGender(); ?></td>
                            <td><?php echo $employee->getStartDate(); ?></td>
                            <td><?php echo $employee->getSalary(); ?></td>
                            <td>
                                <a href="list_salary.php?emp_no=<?php echo $employee->getEmpNo(); ?>">VIEW</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No employees found for department <?php echo $dept_no; ?></p>
        <?php } ?>
    </div>
</body>

</html>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
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

    .return-btn {
        display: block;
        margin-bottom: 20px;
        font-family: Arial, sans-serif;
        color: #333;
        text-decoration: none;
        font-weight: bold;
    }
</style>