<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>Sign In</title>
</head>
<body class="d-flex flex-column h-100">
    <?php include_once('classes/dbhClass.php'); ?>
    <?php include_once('classes/signinClass.php'); ?>
    <?php include_once('assets/components/header.php'); ?>

    <?php 
        if (isset($_GET['uid']) && !empty($_GET['uid'])) {
            $userUniqueId = $_GET['uid'];
        }
    ?>


    <input type="hidden" id="userUniqueId" value="<?php echo $userUniqueId; ?>">

    <?php include_once('assets/components/footer.php'); ?>

    <script>
        //TODO If Account Already Sign In
        $(document).ready(function() { 

        var userUniqueId = $("#userUniqueId").val();

        console.log(userUniqueId)

            function verifyAccount() {
                $.ajax({
                    url: 'classes/verifyAccountClass.php',
                    data: {userUniqueId:userUniqueId},
                    type: 'post',
                    dataType:'json',
                    success: function(data) { 
                        if (data.result == "Already") { 
                            swal('Verified Already!', 'Your account has already verified. You can already Sign In your account!', 'success').then(function() {
                                window.location.assign('index.php?route=signin');
                            });
                        } else if (data.result == "Success") {
                            swal('Verified Success!', 'You can now Sign In your account!', 'success').then(function() {
                                window.location.assign('index.php?route=signin');
                            });
                        } else {
                            swal('Verification Failed!', 'Please check your email for verification!', 'warning').then(function() {
                                window.location.assign('index.php?route=home');
                            });
                        }
                    },
                });
            }

            setInterval(function() {
                verifyAccount();
            }, 1000);

        });
    </script>
</body>
</html>