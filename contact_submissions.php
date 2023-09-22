<?php
// Database configuration
$host = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create a new PDO instance
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Set PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Prepare the SQL statement
    $stmt = $pdo->prepare("INSERT INTO contact_submissions (name, email, message) VALUES (:name, :email, :message)");

    // Bind the parameters
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":message", $message);

    // Execute the statement
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->rowCount() > 0) {
        // Success message
        echo "Thank you for your submission!";
    } else {
        // Error message
        echo "Oops! Something went wrong.";
    }
}
?>
