<?php

    // Functions
    require_once "functions.inc.php";

    if($_SERVER["REQUEST_METHOD"] === "POST"){

        // STORING DATA
        $orderAmmount = htmlspecialchars($_POST["orderAmmount"]);
        
        try{

            // ERROR HANDLERS
            $errors = [];

            if(empty($orderAmmount)){
                $errors[] = "Ammount Can't Be Empty!";
            }

            if(!is_numeric($orderAmmount)){
                $errors[] = "Only Support Numbers!";
            }

            // SESSION START
            require_once "config_session.inc.php";

            if($errors){

                $_SESSION["calcErrors"] = $errors;

                header("Location: ../index.php");
                die();
            }

            // Calculation
            $_SESSION["fiverrCharge"] = fiverrCharge($orderAmmount);
            $_SESSION["sellerEarned"] = sellerEarned($orderAmmount);

            header("Location: ../index.php");
            die();

        }catch(TypeError $e){
            header("Location: ../index.php");
            die("Error!" . $e->getMessage());
        }

    }
    else{
        header("Location: ../index.php");
        die();
    }