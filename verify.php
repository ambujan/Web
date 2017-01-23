<html>
<head>
    <title> Ticket Verification Module</title>
    <link rel = "stylesheet" href = "css/mainformat.css" type = "text/css">
</head>
<body>
<div id = "main">
    <div id = "top">
        <div id = "title">Intelligent Transport System</div>
    </div>
    <div id = "left">
        <h3><a href = "mindex.html">Home</a></h3>
        <h3><a href = "qgen.html">QR Generator</a></h3>
        <h3><a href = "qscan.html">QR Scanner</a></h3>
    </div>
    <div id = "right">
        <?php
        include "connect.php";
        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
            // Verify data
            $email = mysqli_escape_string($_GET['email']); // Set email variable
            $hash = mysqli_escape_string($_GET['hash']); // Set hash variable

            $search = mysqli_query("SELECT email, hash, active FROM ticketvmodule WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysqli_error());
            $match  = mysql_num_rows($search);

            if($match > 0){
                // We have a match, activate the account
                mysqli_query("UPDATE ticketvmodule SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysqli_error());
                echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
            }else{
                // No match -> invalid url or account has already been activated.
                echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
            }

        }else{
            // Invalid approach
            echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
        }
        ?>
    </div>
</div>
</body>
</html>
