<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cricket</title>
    <style>
        body {
            background-color: lightblue;
            font-family: Arial, sans-serif;
        }
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #fff2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Indian Cricket Players</h1>
    <?php
    // Array of Indian Cricket players
    $indianPlayers = array(
        "Virat Kohli",
        "Rohit Sharma",
        "Jasprit Bumrah",
        "Ravindra Jadeja",
        "Hardik Pandya",
        "Shubman Gill"
    );
    $playerEarnings = array(
        "Virat Kohli" => 23904,
        "Rohit Sharma" => 20000, 
        "Jasprit Bumrah" => 15000,
        "Ravindra Jadeja" => 12000,
        "Hardik Pandya" => 10000,
        "Shubman Gill" => 8000
    );

    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Player Name</th>";
    echo "<th>Earnings (Yearly)</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Loop through the array and display each player in a table row
    foreach ($indianPlayers as $player) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($player) . "</td>";
        echo "<td>₹" . number_format($playerEarnings[$player]) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    ?>
</body>
</html>
