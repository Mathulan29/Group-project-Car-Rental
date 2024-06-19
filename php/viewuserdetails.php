<?php
require '../connect.php';

$query = "SELECT userID, Name, Email, Address FROM user";
$result_set = mysqli_query($connection, $query);

if ($result_set) {
    

    $table = '<table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;">';
    $table .= '<thead>';
    $table .= '<tr style="background-color: #f2f2f2;">';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">User ID</th>';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">Name</th>';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">Email</th>';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">Address</th>';
    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';
    while ($record = mysqli_fetch_assoc($result_set)) {
        $table .= '<tr>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['userID'] . '</td>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['Name'] . '</td>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['Email'] . '</td>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['Address'] . '</td>';
    }
    $table .= '</tbody>';
    $table .= '</table>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Query</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #0ABAB5;
        }

        a {
            text-decoration: none;
            color: blue;
        }

        a:hover {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    echo $table;
    ?>
</body>

</html>
