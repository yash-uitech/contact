<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    
    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db"

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender =  $_POST['gender'];
    $email =  $_POST['email'] ;
    $phone =  $_POST['phone'];
    $desc =  $_POST['desc'];
    $sql = "INSERT INTO `trip1`.`trip1` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name',
    '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    


    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Hand:wght@400..700&family=Wittgenstein:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
        <link rel="website icon" href="bg.jpg">

</head>

<body>
    <img class="bg" src="bg.jpg" alt="MIT US">
    <div class="container">
        <h2>Welcome to MIT US Trip Form</h2>
        <p>Enter the details to comform the booking for your trip</p>
        <?php
        if($insert == true){
        echo "<b><p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p></b>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="number" name="age" id="age" placeholder="Enter your Age" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
            <input type="email" name="email" id="email" placeholder="Enter your email"  required>
            <input type="number" name="phone" id="phone" placeholder="Enter your phone number" minlength="10" maxlength="10" required>
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter any other information here" required minlength="10" maxlength="200" required></textarea>
            <button class="btn">SUBMIT</button>

        </form>
    </div>
    <script src="index.js"></script>
    

</body>

</html>