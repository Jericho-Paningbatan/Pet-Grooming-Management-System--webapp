<?php
session_start();
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['bookBtn'])) {
        // This block handles the booking data submission

        // Get the date and time from the form submission
        $selectedDate = $_POST["selectedDate"];
        $bookingTime = $_POST["bookingtime"];
        $petName = $_POST["petName"];
        $petBreed = $_POST["petBreed"];
        $petAge = $_POST["petAge"];
        $petGender = $_POST["petGender"];
        $petServices = $_POST["petServices"];

        // Get user information from the session
        $userId = $_SESSION['user_id'];
        $firstName = $_SESSION['firstname'];
        $lastName = $_SESSION['lastname'];
        $phoneNumber = $_SESSION['phone'];

        // Combine first name and last name to create the "name" field
        $name = $firstName . ' ' . $lastName;

        // Replace with your MongoDB connection string and credentials
        $connection = new MongoDB\Client("mongodb+srv://echoo:09611584813@group7.9lwukou.mongodb.net/");
        $collection = $connection->pet_grooming_system->bookings;

        try {
            // Find the highest existing book_id in the collection
            $maxBookId = $collection->find([], ['projection' => ['book_id' => 1], 'sort' => ['book_id' => -1], 'limit' => 1])->toArray();
            $nextBookId = 1;

            if (!empty($maxBookId)) {
                // If there are existing documents, increment the highest book_id by 1
                $nextBookId = $maxBookId[0]['book_id'] + 1;
            }

            // Prepare the document to be inserted
            $document = [
                "book_id" => $nextBookId, // Auto-incrementing book_id
                "user_id" => $userId,
                "name" => $name,
                "phone_number" => $phoneNumber,
                "date" => $selectedDate,
                "time" => $bookingTime,
                "pet_name" => $petName,
                "breed" => $petBreed,
                "pet_age" => $petAge,
                "pet_gender" => $petGender,
                "service_type" => $petServices,
                "status" => "Pending" // You can set the initial status as "Pending" or any other appropriate value
            ];

            // Insert the document into the collection
            $result = $collection->insertOne($document);

            if ($result->getInsertedCount() > 0) {
                echo "Booking successful! Data saved to MongoDB.";
            } else {
                echo "Failed to save data to MongoDB.";
            }
        } catch (Exception $e) {
            // Log the error for debugging purposes
            error_log('MongoDB Insert Error: ' . $e->getMessage());
            echo "Error occurred while saving the booking. Please try again.";
        }
    }
}
?>

