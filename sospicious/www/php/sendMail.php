<?php
    require_once "../php/connect.php";
    session_start();
    $user_id = 1;

// Retrieve the values of con_email from multiple rows
$query = "SELECT con_email FROM sos_contacts WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

// Create an array to store the email addresses
$emailAddresses = array();

// Loop through the result set and extract the email addresses
while ($row = mysqli_fetch_assoc($result)) {
    $emailAddresses[] = $row['con_email'];
}

// Convert the email addresses array to a JSON string
$emailAddressesJson = json_encode($emailAddresses);
?>

<!-- Output the email addresses to a JavaScript variable -->
<script src="../js/index.js">
    var username = <?php echo $user_id; ?>;
    var emailAddresses = <?php echo $emailAddressesJson; ?>;

    // Call the sendMail function with the email addresses
    sendMail(username,emailAddresses);
</script>
