<?php
    require_once "../php/connect.php";
    session_start();
    $user_id = 1;

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
        <meta name="color-scheme" content="light dark">
        <link rel="stylesheet" href="../css/profile.css">
        <link rel="stylesheet" href="../css/animation.css">
        <title>SOSpicious</title>
    </head>
    <body>
        <div class="app">
                <?php
                    $select = mysqli_query($conn, "SELECT * FROM `user_healthrec`, `user_infor` WHERE user_healthrec.user_id = user_infor.user_id;") or die('query failed');
                    if(mysqli_num_rows($select) > 0){
                        $fetch = mysqli_fetch_assoc($select);
                    }
                ?>

            <div id="modal-container">
                <div class="modal-background">
                  <div class="modal">
                    <div class="health_user_details">
                        <h1>VINCI&nbsp;</h1>
                        <h1>MALIZON, </h1>
                        <h1>23</h1>
                    </div>
                    <div class="input-field wrapper">
                        <label for="weight">WEIGHT: </label>
                        <input type="text" id="weight" name="weight" value="<?php echo $fetch['user_weight']; ?>" placeholder="Weight" required>
                        <span> | kg</span>
                    </div>
                    <div class="input-field wrapper">
                        <label for="height">HEIGHT: </label>
                        <input type="text" id="height" name="height" value="<?php echo $fetch['user_height']; ?>" placeholder="Height" required>
                        <span> | cm</span>
                    </div>
                    <div class="input-field wrapper">
                        <label for="blood">Blood Type: </label>
                        <select id="blood" name="blood" value="<?php echo $fetch['user_blood']; ?>" required>
                            <option disabled selected hidden>-- SELECT Blood Type --</option>
                            <option>Type A-</option>
                            <option>Type A+</option>
                            <option>Type B-</option>
                            <option>Type B+</option>
                            <option>Type AB-</option>
                            <option>Type AB+</option>
                            <option>Type O-</option>
                            <option>Type O+</option>
                        </select>

                    </div>
                    <svg class="modal-svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" preserveAspectRatio="none">
                                              <rect x="0" y="0" fill="none" width="226" height="162" rx="3" ry="3"></rect>
                                          </svg>
                  </div>
                </div>
            </div>

            <div class=profile_health id="profile_health">
                <div class="health_header">
                    <div class="health-profile-pic">
                        <img src="../img/profile_temp.png" alt="user-profile-pic" id="profile_pic">
                    </div>
                    <div class="health_profile">
                        <div class="health_user_details">
                            <h1 id="profile_firstname"><?php echo $fetch['user_fname']; ?></h1>
                            <h1 id="profile_lastname"> &nbsp;<?php echo $fetch['user_lname']; ?></h1>
                            <!-- <h1 id="profile_age"> 23</h1> -->
                        </div>
                        <div class="health_details">
                            <p class="health_weight">Weight: <span id="user_weight"><?php echo $fetch['user_weight']; ?></span></p>
                            <p class="health_height">Height: <span id="user_height"><?php echo $fetch['user_height']; ?></span></p>
                            <p class="health_blood">Blood Type: <span id="user_blood"><?php echo $fetch['user_blood']; ?></span></p>
                        
                        </div>
                    </div>
                    <button type="button" onclick="editHRecord()" id="health_edit"><img src="../img/icon-edit.svg" alt="icon-edit"/></button>
                </div>

                <svg class="divider" width="337" height="2" viewBox="0 0 337 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.1" d="M1 1L336 1.00003" stroke="#333E63" stroke-linecap="round" stroke-dasharray="8 8"/>
                </svg>

                <div class="health_record allergies">
                    <div class="hrec_header">
                        <img src="../img/icon-shield-virus.svg" alt="icon-allergies"/>
                        <h2>ALLERGIES</h2>
                    </div>
                    <div class="hrec_content">
                        <span>Lorem Ipsum</span>
                    </div>
                </div>

                <div class="health_record diseases">
                    <div class="hrec_header">
                        <img src="../img/icon-virus.svg" alt="icon-diseases"/>
                        <h2>DISEASES</h2>
                    </div>
                    <div class="hrec_content">
                        <span>Lorem Ipsum</span>
                    </div>
                </div>

                <div class="health_record medications">
                    <div class="hrec_header">
                        <img src="../img/icon-capsule.svg" alt="icon-meds"/>
                        <h2>MEDICATIONS</h2>
                    </div>
                    <div class="hrec_content">
                        <span>Lorem Ipsum</span>
                    </div>
                </div>

                <div class="health_record immunizations">
                    <div class="hrec_header">
                        <img src="../img/icon-syringe.svg" alt="icon-immuno"/>
                        <h2>IMMUNIZATIONS</h2>
                    </div>
                    <div class="hrec_content">
                        <span>Lorem Ipsum</span>
                    </div>
                </div>
                    
            </div>
            
        </div>
        <script src="cordova.js"></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="../js/profile.js"></script>
    </body>
</html>
