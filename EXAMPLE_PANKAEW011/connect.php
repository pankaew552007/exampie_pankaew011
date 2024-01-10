<?php
    $id_card = $_POST['id_card'];
    $password = $_POST['password'];

    // database connection
    $conn = mysqli_connect('localhost', 'root', '', 'example_pankaew011');
    if(mysqli_connect_error()){
        die('Connection Failed : ' . mysqli_connect_error());
    } else {
        // แก้ชื่อตัวแปร $email เป็น $id_card
        $stmt = $conn->prepare("INSERT INTO register (id_card, password) VALUES (?, ?)");
       
        // ตรวจสอบว่า prepare สำเร็จหรือไม่
        if ($stmt) {
            $stmt->bind_param("ss", $id_card, $password);
           
            if ($stmt->execute()) {
                echo "register ok...";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error in prepare statement: " . $conn->error;
        }

        $conn->close();
    }
?>