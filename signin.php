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

    <?php $classSignIn->signIn(); ?>

    <main class="form-signin flex-shrink-0 bg-light bg-opacity-50 mb-3">
        <div class="container">
            <div class="card shadow p-5 bg-light bg-opacity-75">
                <form method="post">
                    <h4 class="text-center fw-bold">Welcome to</h4>
                    <div class="d-flex justify-content-center">
                        <img class="mb-4 text-center" src="<?php echo $companyLogoAlt ?? ""; ?>" alt="" width="200" height="57">
                    </div>
                    
                    <h3 class="mb-3 fw-bold mb-2">Please sign in</h3>

                    <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <span>
                                <?php 
                                    echo $_SESSION['error']; 
                                    unset($_SESSION['error']);
                                ?>
                            </span>
                        </div>
                    <?php } ?>   

                    <div class="input-group mb-3">       
                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user fa-fw fs-4"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $_SESSION['username'] ?? ""; ?>" required>
                            <label for="username">Username</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">       
                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-lock fa-fw fs-4"></i></span>
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $_SESSION['password'] ?? ""; ?>" required>
                            <label for="password">Password</label>
                        </div>
                    </div>

                    <div class="mb-2">
                        <input type="checkbox" id="show-hide" onclick="showPassword()">
                        <label for="show-hide">Show password</label>
                    </div>
                    
                    <div class="mb-3">
                        <label>
                            Haven't account yet? <a href="index.php?route=signup">Sign up here!</a>
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary d-flex align-items-center justify-content-center" type="submit" name="signIn"><i class="fa-solid fa-right-to-bracket fs-3 me-2"></i><strong>Sign in</strong></button>
                </form>
            </div>    
        </div>
    </main>

    <?php include_once('assets/components/footer.php'); ?>

</body>
</html>