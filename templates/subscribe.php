<?php

//ICI IL VA SE PASSER QUELQUE CHOSE//
if(!empty($_POST))
{
    $errors = [];

    $email = trim(strip_tags($_POST["email"]));
    $password = trim(strip_tags($_POST["password"]));

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors["email"] = "email invalide";
    }

    $uppercase = preg_match("/[A-Z]/", $password);
    $lowercase = preg_match("/[a-z]/",$password);
    $number = preg_match("/[0-9]/", $password);


    if(!$uppercase || !$lowercase || !$number || strlen($password) < 6){
        $errors["password"] = "Mot de passe qui ne respecte pas la norme: lettre majuscule + lettre minuscule + chiffre";
        
    }

    var_dump($_POST);
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    </link>
    <title>Création d'un compte</title>
</head>

<body class="create-account">
    <header>
        <img src="../public/assets/img/telefoot-color-bg-01.svg" alt="Telefoot - La chaine du foot" />
        <nav class="nav-container">
            <ul>
                <li><a href="?page=home" class="leftSide">Home</a></li>
                <li><a href="" class="leftSide">Telefoot Bar</a></li>
            </ul>
            <ul>
                <li><a href="" class="subscribe">S'abonner</a></li>
                <li><a href="" class="login">Se connecter</a></li>
            </ul>
        </nav>
    </header>

    <div class="create-container">
        <h1>Création d'un compte</h1>
        <form action="" method="post">

            <div class="email-inputs">
                <div>
                    <label for="inputEmail">Email *</label>
                    <input type="email" name="email" id="inputEmail" value="<?= $email ?? ""?>">
                    <?php 
                        if(!empty($errors["email"]))
                        {
                            ?>
                            
                            <p><?=$errors["email"]?></p>
                            <?php
                        }else{
                            ?>
                                <p>email valide</p>
                            <?php
                        }
                    ?>
                </div>
                <!-- <div>
                    <label for="confirmEmail">Confirmer l'email *</label>
                    <input type="email" name="email" id="confirmEmail">
                </div> -->
            </div>

            <div class="password-inputs">
                <div>
                    <label for="inputPassword">Mot de passe *</label>
                    <input type="password" name="password" id="inputPassword">
                    <?php
                    if(!empty($errors["password"])){
                        ?>
                            <p><?=$errors["password"]?></p>
                        <?php
                    }
                    ?>
                </div>
                <?php
                    if(!empty($errors["password"])){
                        ?>
                            <p><?=$errors["password"]?></p>
                        <?php
                    }
                    ?>
                <!-- <div>
                    <label for="confirmPassword">Confirmer le mot de passe *</label>
                    <input type="password" name="password" id="confirmPassword">
                </div> -->
            </div>

            <input type="submit" value="Envoyer">
        </form>
    </div>
</body>

</html>