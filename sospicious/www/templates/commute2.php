<?php
    // session_start();
    // include("../php/connect.php");

    // if($_SERVER['REQUEST_METHOD'] == "POST"){
    //     //something was posted

    //     $ride_id = $_POST["commute2_input_loc"];
    //     $user_id = $_POST["password"];
    //     $firstname = $_POST["firstname"];
    //     $lastname = $_POST["lastname"];
    //     $email = $_POST["email"];
    //     $mobile = $_POST["mobile"];
    //     $birthdate = $_POST["birthdate"];

    //     if (!empty($username) && !empty($password) 
    //     && !empty($firstname) && !empty($lastname) 
    //     && !empty($email) && !empty($mobile) 
    //     && !empty($birthdate)) {
    //         if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
    //             echo "Invalid email format!";
    //             die;
    //         }else{

    //         }

    //         //save to database
    //         $query = "INSERT INTO sos_rides (username, password, user_fname, user_lname, user_email, user_mobile, user_birthdate) 
    //             VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$mobile', '$birthdate')";

    //         mysqli_query($conn, $query);

    //         // header("Location: ../templates/index.php");
    //         // die;
    //    }else{
    //     echo "Please fill in all the fields!";
    //    }
    // }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/commute.css">
</head>
<body>
    <div class="commute2_container">

        <div class="commute2_two_buttons">
            <button class="commute2_share_my_ride">Share my ride</button>
            <button class="commute2_history">history</button>
        </div>

        <div class="commute2_send">
            <div>
                <label for="commute2_send_to">Send to:</label>
            </div>
            <div>
                <input type="text" class="commute2_transparent">
            </div>
            <!-- <img class="commute2_img" src="../img/Chips Input.png" alt="mom">
            <img class="commute2_img" src="../img/Chips Input (1).png" alt=""> -->
        </div>

        <div class="commute2_loc">
            <div class="commute2_inline">
                <div>
                    <img class="commute2_pin" src="../img/map-pin-c.svg" alt="map-pin">
                </div>
                <div>
                    <input class="commute2_input" id="commute2_input_loc" type="text" size="25" required>
                </div>
            </div>
            <!-- <br> -->
            <div class="commute2_inline">
                <div>
                    <img class="commute2_taxi" src="../img/ph_taxi-light.svg" alt="taxi">
                </div>
                <div>
                    <input class="commute2_input" id="commute2_time" type="text" size="25" required>
                </div>
            </div>
        </div>
        <form action="#" class="form">
            <div class="commute2_column">
                <div class="commute2_col">
                    <label class="commute2_label" for="commute2_vehicle">Type</label>
                    <div class="commute2_dropdown">
                    <select name="commute2_vehicle" id="commute2_option" class="commute2_same" required id="commute2_transpo" >
                        <option value="Taxi">Taxi</option>
                        <option value="Bus">Bus</option>
                        <option value="Tricycle">Tricycle</option>
                        <option value="Motorcycle">Motorcycle</option>
                    </select>
                    </div>
                </div>
                    <div class="commute2_col">
                        <label class="commute2_label"  for="commute2_plate_number">Plate Number</label>
                        <div class="commute2_pt">
                        <input class="commute2_same" id="try" type="text" placeholder="ABC 1234">
                    </div>
                    </div>
            </div>
        </form>

        <div class="commute2_driver">
            <label class="commute2_label"  for="commute2_driver_name">Driver's Name</label>
            <div>
                <input class="commute2_same" id="jd" type="text" placeholder="Juan Dela Cruz" size="40">
            </div>
        </div>

        <div class="commute2_other_details">
            <label class="commute2_label"  for="commute2_details">Other Details</label>

            <div>
                <textarea name="" id="commute2_textarea" cols="43" rows="6" class="commute2_same"></textarea>
                
            </div>
        </div>

        <div class="commute2_two_buttons">
            <!-- <button onclick="myFunction" type="submit" class="commute2_share">Share</button> -->
            <input type="submit" value="share" class="commute2_share" onclick="myFunction()">
            <button class="commute2_cancel">Cancel</button>
        </div>

        <div class="message">
                <div class="success" id="success">Your Message Successfully Sent!</div>
                <div class="danger" id="danger">Fields Can't be Empty!</div>
        </div>
        

    </div>

    <script src="../js/commute.js"></script>
</body>
</html>