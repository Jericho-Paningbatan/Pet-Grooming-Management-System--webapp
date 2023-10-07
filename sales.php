<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

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

        body {
            font-family: 'Helvetica Neue', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            width: 100%;
            height: 100%;
            background-color: #fff;
            border-radius: 0; /* Remove border-radius */
            box-shadow: none; /* Remove box-shadow */
            overflow: hidden;
        }
        .header {
            background-color: #B53471;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-size: 24px;
        }
        .date-picker-container {
            text-align: center;
            padding: 10px;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .date-picker-label {
            font-weight: semi-bold;
            margin-right: 10px;
            font-size: 15px;
        }
        .date-picker input[type="date"] {
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 5px;
            font-size: 16px;
        }
        .filter-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15
            px;
            font-size: 16px;
            cursor: pointer;
            margin-left: 10px; /* Add margin to create a gap */
        }
        .total-sales {
            text-align: center;
            padding: 10px;
            background-color: #c7ecee;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: #fff;
        }
        /* Alternate row colors for each table */
        table:nth-child(2n) tr:nth-child(even),
        table:nth-child(2n+1) tr:nth-child(odd) {
            background-color: #e5e5e5;
        }
        /* Alternate header colors for each table */
        table:nth-child(2n) th {
            background-color: #16a085; /* Green */
        }
        table:nth-child(2n+1) th {
            background-color: #B53471; /* Blue */
        }
        table td:nth-child(6) {
        color: yellow;
    }
        @media (min-width: 600px) {
            /* Add styles for larger screens if needed */
        }
    </style>
</head>
<body>
<div class="container" >
   
    <div class="total-sales">
        <label for="total-daily-sales" style="color:green; font-weight: bold; font-size:16px;">Total Generated Sales for (<?php date_default_timezone_set('Asia/Manila'); echo isset($_POST['date']) ? date('M d, Y', strtotime($_POST['date'])) : date('M d, Y');
?>):</label><br>
        <span id="total-daily-sales" style="font-weight:bold; font-size:16px;"></span>
    </div>
    <form action="" method="POST">
        <div class="date-picker-container">
            <label class="date-picker-label" for="date">Check Date:</label>
            <input type="date" id="date" name="date" value="<?php  date_default_timezone_set('Asia/Manila'); echo isset($_POST['date']) ? $_POST['date'] : date('Y-m-d'); ?>">
            <button class="filter-button" type="submit">Filter</button>
        </div>
    </form>
  
    <div class="containers"style="display: none;">
    <?php
    require 'vendor/autoload.php';

    date_default_timezone_set('Asia/Manila');

    $client = new MongoDB\Client("mongodb+srv://echoo:09611584813@group7.9lwukou.mongodb.net/");
    $db = $client->selectDatabase('pet_grooming_system');
    $collection = $db->selectCollection('sales_record');

    if (isset($_POST['date']) || !isset($_POST['date'])) {
        $selectedDate = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d'); 
        $selectedDateFormatted = date('M d, Y', strtotime($selectedDate));
        $filter = ['date' => $selectedDateFormatted];
        $cursor = $collection->find($filter);

        $totalDailySales = 0;

        $hasDocuments = false;
        foreach ($cursor as $document) {
            $hasDocuments = true;

            $price = floatval($document['price']->__toString());
            $quantity = intval($document['quantity']);
            $totalSales = $quantity * $price;
            $totalDailySales += $totalSales;

            echo '<table >';
            echo '<tr><th>Date</th><td>' . $document['date'] . '</td></tr>';
            echo '<tr><th>Category</th><td>' . $document['category'] . '</td></tr>';
            echo '<tr><th>Item</th><td>' . $document['item'] . '</td></tr>';
            echo '<tr><th>Quantity</th><td>' . $quantity . '</td></tr>';
            echo '<tr><th>Price</th><td>₱' . $price . '</td></tr>';
            echo '<tr><th>Generated Sales</th><td class="generated-sales">₱' . $totalSales . '</td></tr>';
            
            echo '</table>';
        }

        if (!$hasDocuments) {
            echo '<p style="text-align: center;">No Sales Record</p>';
        }

        echo '<script>';
        echo 'document.getElementById("total-daily-sales").textContent = "₱' . $totalDailySales . '";';
        echo '</script>';
    }
    ?>
    </div>
   
</div>
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
