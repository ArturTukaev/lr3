<?php

if (isset($_POST['username']) && $_POST['email'] && $_POST['subject']) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

    try {
        $conn = new mysqli('localhost', 'root', '', 'fb');
    
        if ($conn->connect_error) {
            die(json_encode($conn->connect_error));
        }

        $sql = "INSERT INTO `reviews`(`username`, `email`, `subject`) 
                VALUES ('{$username}','{$email}','{$subject}')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(array('success' => true));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    catch (Exception $e)
    {
        echo 'Ошибка: ', $e->getMessage(), "\n";
    }
} else {
    echo json_encode(array('success' => false));
}
