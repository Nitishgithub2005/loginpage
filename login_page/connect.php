<?php
  $usr = $_POST['usr']; // Assuming the input field on the web form has name="username"
  $pass = $_POST['pass'];

    // Create connection
    $conn = new mysqli('localhost', 'nitish', '', 'login');

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        echo "Connected successfully";

        // Retrieve input values from the web form
        $usr = $_POST['usr']; // Assuming the input field on the web form has name="username"
        $pass = $_POST['pass']; // Assuming the input field on the web form has name="password"
        
        // Prepare and execute the statement
        $stmt = $conn->prepare("INSERT INTO registration (usr, pass) VALUES (?, ?)");
        $stmt->bind_param("ss", $usr, $pass);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "Registration successful";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
?>
