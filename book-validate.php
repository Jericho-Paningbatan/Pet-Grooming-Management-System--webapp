<?php
session_start();
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['selectedDate']) && isset($_POST['bookingtime'])) {
        // This block handles the availability check

        // Get the date and time from the AJAX request
        $selectedDate = $_POST["selectedDate"];
        $bookingTime = $_POST["bookingtime"];

        // Replace with your MongoDB query to check availability
        // For example, if your bookings table is called "bookings":
        $connection = new MongoDB\Client("mongodb+srv://echoo:09611584813@group7.9lwukou.mongodb.net/");
        $collection = $connection->pet_grooming_system->bookings;

        try {
            $result = $collection->findOne([
                "date" => $selectedDate,
                "time" => $bookingTime,
                "status" => ['$in' => ["Pending", "Approved"]] // Correctly use $in as part of an array
            ]);

            if ($result) {
                // Slot is already booked
                echo "booked";
            } else {
                // Slot is available
                echo "available";
            }
        } catch (Exception $e) {
            // Log the error for debugging purposes
            error_log('MongoDB Query Error: ' . $e->getMessage());
            echo "error";
        }

        // Add this line to flush the output buffer and send the response immediately
        flush();
        exit();
    }
}
?>

