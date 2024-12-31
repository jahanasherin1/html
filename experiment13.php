<!DOCTYPE html>
<html>
<head>
    <title>KSEB Bill</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f8f9fa;
        }

        .form-container {
            width: 350px;
            margin: 20px auto;
            padding: 25px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .bill-container {
            width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ced4da;
        }

        th {
            background-color: #e9ecef;
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
        }

        .right-align {
            text-align: right;
        }

        .center-align {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>KSEB Bill</h2>
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <label for="consumerId">Consumer ID:</label>
            <input type="text" name="consumerId" id="consumerId" required>
            <label for="currentReading">Unit consumed:</label>
            <input type="number" name="currentReading" id="currentReading" required min="1">
            <input type="submit" value="Generate">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = htmlspecialchars($_POST["name"]);
        $consumerId = htmlspecialchars($_POST["consumerId"]);
        $unit = intval($_POST["currentReading"]);

        if ($unit <= 0) {
            echo "<div class='form-container'><p class='error'>Please enter a valid unit value.</p></div>";
        } else {
            $energyCharges = ($unit <= 300) ? $unit * 6.40 : 
                            (($unit <= 350) ? $unit * 7.25 : 
                            (($unit <= 400) ? $unit * 7.60 : 
                            (($unit <= 500) ? $unit * 7.90 : $unit * 8.80)));

            $otherCharges = 60.00;
            $totalPayable = $energyCharges + $otherCharges;

            echo "<div class='bill-container'>
                    <div class='header'>
                        <h2>KSEB</h2>
                        <h3>ELECTRICITY BILL</h3>
                    </div>
                    <table>
                        <tr><td>Consumer no: C#{$consumerId}</td></tr>
                        <tr><td>Name: {$name}</td></tr>
                        <tr><td>Address: VENGAYIL</td></tr>
                        <tr><td>Due Date: " . date('d/m/Y', strtotime('+10 days')) . "</td></tr>
                        <tr><td>Disconn Dt: " . date('d/m/Y', strtotime('+15 days')) . "</td></tr>
                    </table>
                    <table>
                        <tr><th class='center-align'>Unit</th><th class='center-align'>Curr</th><th class='center-align'>Cons</th></tr>
                        <tr><td class='center-align'>KWH/A/I</td><td class='center-align'>{$unit}</td><td class='center-align'>{$unit}</td></tr>
                    </table>
                    <table>
                        <tr><td>Energy Charges:</td><td class='right-align'>" . number_format($energyCharges, 2) . "</td></tr>
                        <tr><td>Other Charges:</td><td class='right-align'>" . number_format($otherCharges, 2) . "</td></tr>
                        <tr><td>Payable:</td><td class='right-align'>" . number_format($totalPayable, 2) . "</td></tr>
                    </table>
                    <p class='right-align'>Pay Online at www.kseb.in</p>
                </div>";
        }
    }
    ?>
</body>
</html>
