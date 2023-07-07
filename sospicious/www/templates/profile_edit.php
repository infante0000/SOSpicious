<?php
    require_once "../php/connect.php";
    session_start();
    $user_id = 1;

    if(isset($_POST['update_profile'])){

        $update_fname = mysqli_real_escape_string($conn, $_POST['edit_fname']);
        $update_lname = mysqli_real_escape_string($conn, $_POST['edit_lname']);
        $update_email = mysqli_real_escape_string($conn, $_POST['edit_email']);
        $update_mobile = mysqli_real_escape_string($conn, $_POST['edit_mobile']);
     
        mysqli_query($conn, "UPDATE `user_infor` SET user_fname = '$update_fname', user_lname = '$update_lname', user_email = '$update_email', user_mobile = '$update_mobile' WHERE user_id = '$user_id'") or die('query failed');
        echo "Update Success";

        $update_image = $_FILES['edit_profilepic']['name'];
        $update_image_size = $_FILES['edit_profilepic']['size'];
        $update_image_tmp_name = $_FILES['edit_profilepic']['tmp_name'];
        $update_image_folder = '../img/uploaded_img/'.$update_image;

        if(!empty($update_image)){
            if($update_image_size > 2000000){
                $message[] = 'Image is too large';
            }else{
                $image_update_query = mysqli_query($conn, "UPDATE `user_infor` SET user_picture = '../img/uploaded_img/$update_image' WHERE user_id = '$user_id'") or die('query failed');
                if($image_update_query){
                    move_uploaded_file($update_image_tmp_name, $update_image_folder);
                }
                $message[] = 'Profile Picture updated succssfully!';
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!--
        Customize this policy to fit your own app's needs. For more guidance, please refer to the docs:
            https://cordova.apache.org/docs/en/latest/
        Some notes:
            * https://ssl.gstatic.com is required only on Android and is needed for TalkBack to function properly
            * Disables use of inline scripts in order to mitigate risk of XSS vulnerabilities. To change this:
                * Enable inline JS: add 'unsafe-inline' to default-src
        -->
        <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: https://ssl.gstatic.com 'unsafe-eval' https://cdnjs.cloudflare.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com;
        script-src 'self' 'unsafe-eval' 'unsafe-inline' https://maps.googleapis.com https://cdnjs.cloudflare.com; object-src 'self'; script-src-elem 'self' 'unsafe-eval' 'unsafe-inline' 
        https://maps.googleapis.com *; media-src *; img-src 'self' data: content:; connect-src 'self';">

        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
        <link rel="stylesheet" href="../css/profile.css">
        <title>SOSpicious</title>
    </head>
    <body>        
        <div class="app">
            <div id="profile_edit">
                <?php
                    $select = mysqli_query($conn, "SELECT * FROM `user_infor` WHERE user_id = '$user_id'") or die('query failed');
                    if(mysqli_num_rows($select) > 0){
                        $fetch = mysqli_fetch_assoc($select);
                    }
                ?>

                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="edit_header">
                        <div class="profile-pic-div">
                            <img src="<?php echo $fetch['user_picture']; ?>" alt="user-profile-pic" id="profile_pic">
                            <input type="file" id="edit_profilepic" name="edit_profilepic" accept=".jpg, .jpeg, .png">
                            <label for="edit_profilepic" id="profile_uploadPic">Choose a<br>Photo</label>
                        </div>
                        <h1 id="profile_username">@<?php echo $fetch['username']; ?></h1>
                    </div>

                    <div class="editForm">
                        <div class="fields">
                            <div class="input-field">
                                <label for="edit_fname">First Name</label>
                                <input type="text" id="edit_fname" name="edit_fname" value="<?php echo $fetch['user_fname']; ?>" placeholder="First Name" required>
                            </div>
    
                            <div class="input-field">
                                <label for="edit_lname">Last Name</label>
                                <input type="text" id="edit_lname" name="edit_lname" value="<?php echo $fetch['user_lname']; ?>" placeholder="Last Name" required>
                            </div>
    
                            <div class="input-field">
                                <label for="edit_dob">Date of Birth</label>
                                <input type="date" id="edit_dob" name="edit_dob" value="<?php echo $fetch['user_birthdate']; ?>" placeholder="Enter birth date" required>
                            </div>
    
                            <div class="input-field">
                                <label for="edit_email">Email</label>
                                <input type="email" id="edit_email" name="edit_email" placeholder="Enter your email" value="<?php echo $fetch['user_email']; ?>" required>
                            </div>
    
                            <div class="input-field">
                                <label for="edit_mobile">Mobile Number</label>
                                <input type="tel" id="edit_mobile" name="edit_mobile" placeholder="Enter mobile number" value="<?php echo $fetch['user_mobile']; ?>" required>
                            </div>
                        </div>
                        <div class="editBtns">
                            <button name="update_profile" type="submit" id="saveBtn">SAVE</button>
                            <button id="cancelBtn">CANCEL</button>
                        </div>
                    </div>   
                </form>
            </div>
            
        </div>
        <script src="cordova.js"></script>
        <script src="../js/profile.js"></script>
    </body>
</html>
