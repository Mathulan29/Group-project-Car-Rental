<?php
require '../connect.php';

$query = "SELECT id,name,mobile,dob,gender FROM hub";
$result_set = mysqli_query($connection, $query);

if ($result_set) {
    

    $table = '<table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;">';
    $table .= '<thead>';
    $table .= '<tr style="background-color: #f2f2f2;">';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">Driver ID</th>';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">Name</th>';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">Mobile</th>';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">DOB</th>';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">Gender</th>';
    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';
    while ($record = mysqli_fetch_assoc($result_set)) {
        $table .= '<tr>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['id'] . '</td>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['name'] . '</td>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['mobile'] . '</td>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['dob'] . '</td>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['gender'] . '</td>';
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
