<?php

    // SESSION
    require_once "includes/config_session.inc.php";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fiverr Order Percentage Calculation</title>
        <!-- Rest CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/reset.css">
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Theme Main CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body>
        <div class="form-title">
            <h2><span></span>Fiverr Fee Calculator</h2>
        </div>
       <div class="container">
        <div class="form-box">
            <form action="includes/order-calc.inc.php" method="POST">
                <label for="order-ammount">Order Ammount</label>
                <input type="text" name="orderAmmount" placeholder="$00" id="order-ammount" class="order-ammount" >
                <button type="submit">Calculate</button>
            </form>
            <div class="form-footer">
                <!-- <p>Fiverr Charged : <span class="fiv-charge">$0</span></p>
                <p>Seller Earned : <span class="fiv-earn">$0</span></p> -->

                <?php
                
                if(isset($_SESSION["fiverrCharge"]) && isset($_SESSION["sellerEarned"])){

                    $fiverrCharge = $_SESSION['fiverrCharge'];
                    $sellerEarned = $_SESSION['sellerEarned'];

                    ?>

                    <p>Fiverr Charged : <span class="fiv-charge">$<?php echo $fiverrCharge; ?></span></p>
                    <p>Seller Earned : <span class="fiv-earn">$<?php echo $sellerEarned; ?></span></p>

                    <?php

                    // SESSION DESTORY AND UNSET
                    session_unset();
                    session_destroy();

                }
                else{
                    echo '<p>Fiverr Charged : <span class="fiv-charge">$0</span></p>';
                    echo '<p>Seller Earned : <span class="fiv-earn">$0</span></p>';
                }
                
                ?>

                <!-- Errors -->
                <?php

                    if(isset($_SESSION["calcErrors"])){
                        $calcErrors = $_SESSION["calcErrors"];
                    
                        foreach($calcErrors as $errors){
                            echo '<div class="calc-errors">'.$errors.'</div>';
                        }
                        session_unset();
                        session_destroy();
                    }
                ?>
            </div>
        </div>
       </div>

    </body>
</html>