<?php
session_start();
include 'favicon/favicon.php';
require 'session/session.php';
checkLogin($collection);
require 'vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb+srv://echoo:09611584813@group7.9lwukou.mongodb.net/");
$database = $mongoClient->pet_grooming_system;
$collection = $database->bookings;

function getBookingHistory($sessionId) {
    global $collection;
    
    $query = ["user_id" => $sessionId];
    $options = [];
    $cursor = $collection->find($query, $options);

    $bookings = [];
    foreach ($cursor as $document) {
        $bookings[] = $document;
    }

    return $bookings;
}

$sessionId = $_SESSION['user_id'];
$bookings = getBookingHistory($sessionId);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking History</title>
  
    <style>


body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
  margin: 0;
  padding: 0;
  background-color: #f9f9f9;
}

header {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 1rem;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

header h1 {
  margin: 0;
}

header input[type="date"] {
  padding: 0.5rem;
  font-size: 16px;
  border: 2px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
  color: #333;
  outline: none;
}

header input[type="date"]:focus {
  border-color: #6b6bff;
}

main {
  padding: 2rem;
}

.history-table {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #ccc;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.history-table th,
.history-table td {
  padding: 1rem;
  border: 1px solid #ccc;
}

.history-table th {
  background-color: #f2f2f2;
  text-align: left;
  font-weight: bold;
}

.history-table tbody tr:nth-child(odd) {
  background-color: #f9f9f9;
}

.history-table tbody tr:hover {
  background-color: #f2f2f2;
  cursor: pointer;
}

/* Additional styles for a more elegant look */

/* Align header elements */
header h1,
header input[type="date"] {
  display: block;
  margin: 10px auto;
  max-width: 300px;
  width: 100%;
}

/* Center the table */
main {
  display: flex;
  justify-content: center;
}

/* Add some spacing between the table cells */
.history-table th,
.history-table td {
  padding: 0.8rem 1rem;
}

/* Add subtle hover effect */
.history-table tbody tr:hover {
  background-color: #eaeaea;
  transition: background-color 0.2s ease-in-out;
}

/* Styling for the table header and input field */
header {
  position: relative;
}

header h1 {
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 15px;
}

header input[type="date"] {
  font-size: 16px;
  border: 2px solid #ccc;
  border-radius: 5px;
  padding: 8px;
  color: #333;
  outline: none;
}

/* Custom styling for the status cell */
.history-table td:last-child {
  text-transform: capitalize;
  color: #007bff;
  font-weight: 600;
}

/* Add a box shadow to the table */
.history-table {
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Adjust the font size and weight for better readability */
.history-table th,
.history-table td {
  font-size: 16px;
  font-weight: 400;
}

/* Customize the table header row */
.history-table th {
  background-color: #f9f9f9;
  border-bottom: 2px solid #ccc;
  color:#eb4d4b;
}

/* Add some space around the table */
main {
  padding: 20px;
}
.back-button {
      position: absolute;
      top: 10px;
      left: 10px;
      font-size: 20px;
      color: white;
      cursor: pointer;
    }
    .back-button a{

        color:white;
        font-size:20px;
        text-decoration:none;

    }


    </style>

</head>
<body>
    <header>
    <div class="back-button"><a href="home.php">&#8592;</a></div>
        <h1>Booking History</h1>
        <!-- <input type="date" id="datePicker"> -->
      </header>
      <table class="history-table">
      <thead>
        <tr>
          <th>Book Date</th>
          <th>Book Time</th>
          <th>Pet's Name</th>
          <th>Pet's Breed</th>
          <th>Service Type</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($bookings as $booking) { ?>
          <tr>
            <td><?php echo $booking->date; ?></td>
            <td><?php echo $booking->time; ?></td>
            <td><?php echo $booking->pet_name; ?></td>
            <td><?php echo $booking->breed; ?></td>
            <td><?php echo $booking->service_type; ?></td>
            <td><?php echo $booking->status; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>

</body>
</html>
 