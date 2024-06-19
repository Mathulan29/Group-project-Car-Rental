<?php
require '../connect.php';

$query = "SELECT bookingID,CarID,start,end,PickUp,DropOff,TotalPrice,userID FROM bookings";
$result_set = mysqli_query($connection, $query);

if ($result_set) {
   

    $table = '<table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;">';
    $table .= '<thead>';
    $table .= '<tr style="background-color: #f2f2f2;">';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">Booking ID</th>';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">Car ID</th>';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">Start time</th>';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">End time</th>';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">PickUp</th>';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">DropOff</th>';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">TotalPrice</th>';
    $table .= '<th style="border: 1px solid #dddddd; padding: 10px; text-align: left;">UserID</th>';
    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';
    while ($record = mysqli_fetch_assoc($result_set)) {
        $table .= '<tr>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['bookingID'] . '</td>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['CarID'] . '</td>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['start'] . '</td>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['end'] . '</td>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['PickUp'] . '</td>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['DropOff'] . '</td>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['TotalPrice'] . '</td>';
        $table .= '<td style="border: 1px solid #dddddd; padding: 10px;">' . $record['userID'] . '</td>';
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
            font-family: 'Poppins', sans-serif;
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
