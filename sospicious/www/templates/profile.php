<!DOCTYPE html>
<?php
    require_once "../php/connect.php";
    session_start();
    serialize($conn);
    $user_id = 1;
    

?>
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
        <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com;
        script-src 'self' 'unsafe-eval' 'unsafe-inline' https://maps.googleapis.com; object-src 'self'; script-src-elem 'self' 'unsafe-inline' 'unsafe-eval' 
        https://maps.googleapis.com; media-src *; img-src 'self' data: content:; ">

        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
        <meta name="color-scheme" content="light dark">
        <link rel="stylesheet" href="../css/profile.css">

        <title>SOSpicious</title>
    </head>
    <body>
        <div class="app">
            <?php
                $select = mysqli_query($conn, "SELECT * FROM `user_infor` WHERE user_id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select) > 0){
                $fetch = mysqli_fetch_assoc($select);
                }
            ?>
            <div id="profile_contents">
                <div class="profile_header">
                    <div class="profile-pic-div">
                        <img src="../img/profile_temp.png" alt="user-profile-pic" id="profile_pic">
                    </div>
                    <div class="profile-name-div">
                        <h1>Hi, </h1>
                        <h1 id="profile_firstname"><?php echo $fetch['user_fname']; ?> </h1>
                        <h1 id="profile_lastname"><?php echo $fetch['user_lname']; ?></h1>
                    </div>
                </div>
    
                <div class="profile_navs">
                    <!--Profile Information-->
                    <a href="profile_edit.php">
                        <div class="profile_navs_item">
                            <img src="../img/icon-profile.svg" alt="icon-profile">
                            <div class="profile_navs_title">
                                <h3>Profile Information</h3>
                                <span>Change your account information</span>
                            </div>
                            <img src="../img/chevron-right.svg" alt="icon-more">
                        </div>
                    </a>

                    <!--Health Record-->
                    <a href="profile_health.html">
                        <div class="profile_navs_item">
                            <img src="../img/icon-heart.svg" alt="icon-health">
                            <div class="profile_navs_title">
                                <h3>Clinical Record</h3>
                                <span>Edit your basic health information</span>
                            </div>
                            <img src="../img/chevron-right.svg" alt="icon-more">
                        </div>
                    </a>
                    <!-- Notifications -->
                    <div class="profile_navs_item">
                        <img src="../img/icon-bell.svg" alt="icon-notifs">
                        <div class="profile_navs_title">
                            <h3>Notifications</h3>
                            <span>Manage your notifications</span>
                        </div>
                        <img src="../img/chevron-right.svg" alt="icon-more">
                    </div>
                    <!--Logout-->

                    <div class="profile_navs_item prof_logout" onclick="openLogoutModal()" style="margin-bottom: 20px;">
                            <img src="../img/icon-logout.svg" alt="icon-logout">
                            <div class="profile_navs_title">
                                <h3>Logout</h3>
                                <span>Logout of your account</span>
                            </div>
                            <img src="../img/chevron-right.svg" alt="icon-more">
                        </div>       
                    <!--About-->
                    <div class="profile_navs_item">
                        <img src="../img/icon-info.svg" alt="icon-info">
                        <div class="profile_navs_title">
                            <h3>About</h3>
                            <span>Learn about the app and developers</span>
                        </div>
                        <img src="../img/chevron-right.svg" alt="icon-more">
                    </div>
                             
                </div>
            </div>
                <div class="logout_popup" id="logout_popup">
                    <img src="../img/profile_warning.png">
                    <h1>Log Out</h1>
                    <p>Are you sure you want to log out?</p>
                    <button class="logoutBtn confirmLogout" type="button" onclick="logout()">Confirm</button>
                    <button class="logoutBtn cancelLogout" type="button" onclick="closeLogoutModal()">Cancel</button>
                </div>
            
                
   
        </div>
        <footer>
    <nav class="nav_bar">
        <ul class ="nvb_items" style="position: relative;">
            <li>
                <a href="home.html">
                    <!--ACTIVE puts the upper red border on navbar items-->
                    <!--tagline_active puts the red font color on text-->
                    <div class="items">
                        <img src="../img/HomeIcon.svg" class="item_img">
                        <p class="tagline">Home</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="commute.html">
                    <div class="items">
                        <img src="../img/CommuteIcon.svg" class="item_img">
                        <p class="tagline">Commute</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="contacts.php">
                    <div class="items">
                        <img src="../img/ContactsIcon.svg" class="item_img">
                        <p class="tagline">Contacts</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="profile.php">
                    <div class="items ACTIVE">
                        <img src="../img/ProfileActive.svg    " class="item_img">
                        <p class="tagline_active">Profile</p>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</footer>
        
        <script src="cordova.js"></script>
        <script src="../js/profile.js"></script>

        
    </body>


<!--Footer-->
        
</html>
