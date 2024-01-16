<?php
require 'vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb+srv://echoo:09611584813@group7.9lwukou.mongodb.net/");
$database = $mongoClient->pet_grooming_system;
$collection = $database->employee_attendance;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedDate = $_POST["attendance-date"];

    // Convert the selected date to the MongoDB date format (string)
    $selectedDateMongoFormat = date_create_from_format("Y-m-d", $selectedDate)->format("M d, Y");

    // Query MongoDB for records with the selected date
    $filter = ["Date" => $selectedDateMongoFormat];
    $cursor = $collection->find($filter);

    $attendanceData = iterator_to_array($cursor);
} else {
    // Default data for the current date in "Y-m-d" format
    $currentDate = date("Y-m-d");
    $filter = ["Date" => $currentDate];
    $cursor = $collection->find($filter);

    $attendanceData = iterator_to_array($cursor);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Attendance Report</title>
    <style>

.loader-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Ensure it's above other elements */
        }
        .generated-sales {
        background-color: yellow !important;
    }
        .loader {
            border: 4px solid #007BFF; /* Blue, change to your desired color */
            border-top: 4px solid transparent;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite; /* Rotate animation */
        }

        /* Keyframe animation for loading spinner */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }



        /* Reset some default styles */
        body, h1, table {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        header {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        
        h1 {
            font-size: 24px;
            margin: 0;
        }

        main {
            padding: 20px;
        }

        .attendance-table {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            width:100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
        }

        table th {
            background-color: #007BFF;
            color: #fff;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #e0e0e0;
        }

    

        .filter-container {
            margin-bottom: 20px;
        }

        .filter-container label {
            font-size: 15px;
        }

        .filter-container select,
        .filter-container input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .filter-container select {
            background-color: #fff;
        }

        .filter-container input[type="date"] {
            background-color: transparent;
        }

        .search-button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
            margin-bottom:25px;
        }

        .search-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Attendance Report</h1>
    </header>
    <main>
        <div class="filter-container">
            <form method="POST">
                <label for="attendance-date">Select Date:</label>
                <input type="date" name="attendance-date" id="attendance-date" style="width: 95%;" value="<?php echo isset($_POST["attendance-date"]) ? $_POST["attendance-date"] : (new DateTime(null, new DateTimeZone('Asia/Manila')))->format('Y-m-d'); ?>">

                <button class="search-button" style="width: 20%; background-color: green;">Search</button>
            </form>
        </div>
        <div class="attendance-table">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Employee Name</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($attendanceData as $record) : ?>
                        <tr>
                            <td><?php echo $record["Date"]; ?></td>
                            <td><?php echo $record["Firstname"] . " " . $record["Lastname"]; ?></td>
                            <td><?php echo $record["Time-In"]; ?></td>
                            <td><?php echo $record["Time-Out"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <div class="loader-container" id="loader">
        <div class="loader"></div>
    </div>
</body>
<script>
    function showContainer() {
        document.getElementById('loader').style.display = 'none'; 
        document.querySelector('.containers').style.display = 'block'; 
    }

  window.addEventListener('load', function () {
      setTimeout(showContainer, 2000); 
    });
</script>
</html>
