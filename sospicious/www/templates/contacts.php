<?php
    require_once "../php/connect.php";
    session_start();
    $user_id = 1;
?>

<!DOCTYPE html>
<head>
    <title>SOSpicious!</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name = "description" content="Mobile application for tracking and seeking emeregncy responses">
    <meta name="keywords" content="SOS, Help, Tracking">
    
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="../js/general_contact.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <?php
        $select = mysqli_query($conn, "SELECT * FROM `sos_contacts` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
        }
    ?>
    <!--NOTE: This (and general.html) uses its own css file named "general.css";
        It has global changes to certain tags, like body, div, and button.
        Please be advised when adding new stuff-->
    <div class="general_header">
        <div>
            <img src="../img/sos-logo 2.png" alt="SOS logo" class="g_SOS_logo" >
        </div>

        <div class="em_name_container">
            <img src="../img/Search_alt_light.png">
            <form>
                <input type="text" id="em_name" placeholder="Search..." class="em_name_sb" maxlength="60">
            </form>
        </div>
        
    <div class="main_container">
        
        <div class="content_header">
            <span><b>Emergency Contact(s)</b></span>
            <a href="#">
                <span style="color: red;" id="addcontact" onclick="enterwin(this.id+'1')"><b>Add More +</b></span>
            </a>
        </div>

        <!--Containers-->
        <!--To make multiple contact containers, one would need to redo the codes from line 46 all the way to line 237
            Since that includes the add and edit function as well. 
            EDIT: Actually even if you skip the add part, I *think* walang mangyayaring masama-->
        
        <div class="contact_container" id="contact_container">
                <?php
                    $select = mysqli_query($conn, "SELECT * FROM `sos_contacts` WHERE user_id = '$user_id'") or die('query failed');
                    $rows = array();
                
                    if(mysqli_num_rows($select) > 0){
                        while ($row = mysqli_fetch_assoc($select)) {
                            $rows[] = $row; // Store each row in the array
                        }
                    }

                    foreach ($rows as $row) {
                        $conPic = $row['con_picture'];
                        $conFName = $row['con_fname'];
                        $conLName = $row['con_lname'];
                        $conRelation = $row['con_relation'];

                        echo '<div id="contact_card">';
                        echo '<span>';
                        echo '<img src="' . $conPic . '" class="contact_img" id="contact_image1">';
                        echo '</span>';
                    
                        echo '<div class="em_nr_cont">';
                        echo '<span id="contact_name1" style="text-align: left;" class="em_nr_name"><b>' . $conFName . ' ' . $conLName . '</b></span>';
                        echo '<span id="contact_relation1" style="text-align: left;" class="em_nr_rel">' . $conRelation . '</span>';
                        echo '</div>';
                    
                        echo '<button id="editcontact" onclick="enterwin(this.id + \'1\')" type="btn" class="edit_btn">';
                        echo '<img src="../img/Edit.png">';
                        echo '</button>';
                    
                        echo '</div>';
                    }
                ?>

            
        </div>

            <!--
                ID NAMES
                    Full Name: fullname
                    First Name: e_fname
                    Last Name: e_lname
                    Mobile No: e_mobno
                    Email: e_email_add
                    Birthday: e_bday
                    Relationship: e_relation
            -->

            <!--Editing Contacts-->
            <!--Editing and Adding Contacts have almost the same containers, save for their buttons. If there needs
                CSS changes, just look at the ones used here on the general.css page
                Another thing, the modals are fixed; As long as they fit in the screen it won't support scrolling-->
                <div id="editcontact1" class="edit_contact">
                 <a class="close" onclick="outwin(editcontact1.id)">&times;</a>
                  <div class="edit_contact_maincontainer">
                        <!--The first one with image-->
                        <div class="ec_container_header">
                            <img src="../img/profile_temp.png" class="contact_img" id="e_contact_image1">
                            <div class="ec_content_nr">
                                <span id="e_fullname" name="e_fullname"><b>Name</b></span>
                                <span style="color: red;" id="e_relation" name="e_relation">Relationship</span>
                            </div>
                        </div>

                        <!--First and Last name-->
                        <div class="ec_content_container">
                            <div class="two_layers">
                                <span>Name</span>
                                <form> 
                                    <input type="text" placeholder="First name" style="width: 70%;" maxlength="20" id="e_fname" name="e_fname">
                                </form>
                            </div>

                            <div class="two_layers">
                                <span>Last Name</span>
                                <form>
                                    <input type="text" placeholder="Last name" style="width: 70%;" maxlength="20" id="e_lname" name="e_lname">
                                </form>
                            </div>

                        </div>

                        <div class="ec_content_container">
                            <div class="two_layers">
                                <span>Mobile No.</span>
                                <form>
                                    <input type="number" placeholder="09123456789" class="borderless" id="e_mobno" name="e_mobno" 
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    type = "number"
                                    maxlength = "11">
                                </form>
                            </div>
                        </div>

                        <div class="ec_content_container">
                            <div class="two_layers">
                                <span>Email</span>
                                <form>
                                    <input type="email" placeholder="example@email.com" maxlength="40" id="e_email_add" name="e_email_add">
                                </form>
                            </div>
                        </div>

                        <div class="ec_content_container">
                            <div class="two_layers">
                                <span>Birthday</span>
                                <form>
                                    <input type="date" id="bday" e="e_bday">
                                </form>
                            </div>

                            <div class="two_layers">
                                <span>Relationship</span>
                                <form>
                                    <input type="text" placeholder="Friend" maxlength="20" id="e_relation" name="e_relation">
                                </form>
                            </div>
                        </div>

                        <!--Buttons for confirm and cancel-->
                        <div class="ec_content_button">
                            <button type="button" class="confirm_btn" onclick="displayname()">CONFIRM</button>
                            <button type="button" class="cancel_btn" onclick="outwin(editcontact1.id)">CANCEL</button>
                        </div>

                        <div class="ec_content_button">
                            <span id="output1"> </span>
                        </div>
                        
                    </div>
            </div>
            <!--
                ID NAMES
                    First Name: a_fname
                    Last Name: a_lname
                    Mobile No: a_mobno
                    Email: a_email_add
                    Birthday: a_bday
                    Relationship: a_relation
            -->

            <!--Adding contacts-->
            <div id="addcontact1" class="add_contact">
                <a class="close" onclick="outwin(addcontact1.id)">&times;</a>

                <div class="edit_contact_maincontainer">
                    <!--The first partition with image-->
                    <div style="align-items: center;">
                        <img src="../img/profile_temp.png" class="contact_img" id="a_contact_image1">
                    </div>
                    <!--First and Last name-->
                    <div class="ec_content_container">
                        <div class="two_layers">
                            <span>Name</span>
                            <form> 
                                <input type="text" placeholder="First name" style="width: 70%;" maxlength="20" id="a_fname" name="a_fname">
                            </form>
                        </div>
                        <div class="two_layers">
                            <span>Last Name</span>
                            <form>
                                <input type="text" placeholder="Last name" style="width: 70%;"maxlength="20" id="a_lname" name="a_lname"> 
                            </form>
                        </div>
                    </div>

                    <div class="ec_content_container">
                        <div class="two_layers">
                            <span>Mobile No.</span>
                            <form>
                                <!--Numbers ignore maxlength, so I needed to put in JS which checks for number count-->
                                <input type="number" placeholder="09123456789" class="borderless" maxlength="11" id="a_mobno" name="a_mobno"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11">
                            </form>
                        </div>
                    </div>

                    <div class="ec_content_container">
                        <div class="two_layers">
                            <span>Email</span>
                            <form>
                                <input type="email" placeholder="example@email.com" maxlength="50" id="a_email_add" name="a_email_add">
                            </form>
                        </div>
                    </div>

                    <div class="ec_content_container">
                        <div class="two_layers">
                            <span>Birthday</span>
                            <form>
                                <input type="date" id="a_bday" name="a_bday">
                            </form>
                        </div>

                        <div class="two_layers">
                            <span>Relationship</span>
                            <form>
                                <input type="text" placeholder="Friend" maxlength="20" id="a_relation" name="a_relation">
                            </form>
                        </div>
                    </div>

                    <div class="add_content_button">
                        <button type="button" class="confirm_btn">ADD NEW</button>
                        <button type="button" class="cancel_btn" onclick="outwin(addcontact1.id)">CANCEL</button>
                        
                    </div>

                   
            </div>
        </div>

        <!--IMPORTANT: TESTING BUTTON; CAN BE USED FOR THE SOS BUTTON-->
        <button class="confirm_btn" onclick="sendMail()"> Test Email Capabilities</button>
    </div>





<!--Bottom navbar; please avoid messing with the spacing unless the navbar itself is causing crashes-->
    <footer>
        <nav class="nav_bar">
            <ul class ="nvb_items" style="left: 0; position: relative;">
                <li>
                    <a href="general.html">
                        <!--This div creates a partition between the icon and text, allowing it to have an icon + tagline-->
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
                    <a href="contacts.html">
                        <!--The ACTIVE class can be used on other footers so long as the page is currently in use-->
                        <!--The tagline_active is for the text, while the ACTIVE is for the red top border-->
                        <div class="items ACTIVE">
                            <img src="../img/ContactsACTIVE.svg" class="item_img">
                            <p class="tagline_active">Contacts</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="profile.html">
                        <div class="items">
                            <img src="../img/ProfileIcon.svg" class="item_img">
                            <p class="tagline">Profile</p>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </footer>
</body>

