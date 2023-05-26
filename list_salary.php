<?php
require "config.php";

use App\Employee;

if (isset($_GET['emp_no'])) {
    $emp_no = $_GET['emp_no'];
    $employees = Employee::getByEmpNo($emp_no);
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
            <h1>SALARY HISTORY</h1>
        </div>
        <?php if (isset($employees) && count($employees) > 0) { ?>
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>FROM DATE</th>
                        <th>TO DATE</th>
                        <th>SALARY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee) { ?>
                        <tr>
                            <td><?php echo $employee->getHireDate(); ?></td>
                            <td><?php echo $employee->getEndDate(); ?></td>
                            <td><?php echo $employee->getSalary(); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No salary history found for employee <?php echo $emp_no; ?></p>
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
</style>