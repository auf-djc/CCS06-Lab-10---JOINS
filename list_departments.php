<?php
require "config.php";

// Execute the SQL query
$sql = "SELECT 
            d.dept_no AS 'Department Number',
            d.dept_name AS 'Department Name',
            CONCAT(e.first_name, ' ', e.last_name) AS 'Manager Name',
            dm.from_date AS 'From Date',
            dm.to_date AS 'To Date',
            TIMESTAMPDIFF(YEAR, dm.from_date, dm.to_date) AS 'Number of Years'
        FROM
            departments d
            JOIN dept_manager dm ON d.dept_no = dm.dept_no
            JOIN employees e ON dm.emp_no = e.emp_no";

$result = $conn->query($sql);

// Check if the query was successful
if ($result !== false && $result->rowCount() > 0) {
    // Output the results in a table
    echo "<style>
            table {
                width: 100%;
                border-collapse: collapse;
                font-family: Arial, sans-serif;
            }
            
            th, td {
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
        </style>";
    
    echo "<table>
            <caption>Department Information</caption>
            <tr>
                <th>Department Number</th>
                <th>Department Name</th>
                <th>Manager Name</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Number of Years</th>
            </tr>";

    // Fetch the rows and display them in the table
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['Department Number'] . "</td>";
        echo "<td>" . $row['Department Name'] . "</td>";
        echo "<td>" . $row['Manager Name'] . "</td>";
        echo "<td>" . $row['From Date'] . "</td>";
        echo "<td>" . $row['To Date'] . "</td>";
        echo "<td>" . $row['Number of Years'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No results found.";
}

// Close the database connection
$conn = null;
?>
