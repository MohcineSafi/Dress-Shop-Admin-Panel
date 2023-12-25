<?php
    session_start();
    include_once "./config/dbconnect.php";
?>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="./assets/images/logo.png" width="80" height="80" alt="Swiss Collection">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <?php           
        if(isset($_SESSION['user_id'])){
        ?>
            <!-- If the user is logged in, show user icon -->
            <a href="#" style="text-decoration:none;">
                <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>
        <?php
        } else {
        ?>
            <!-- If the user is not logged in, show sign-in icon -->
            <a href="#" style="text-decoration:none;">
                <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>
        <?php
        } ?>
    </div>  
</nav>
