<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Login</title>
</head>

<body>
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

    <h1>Login</h1>

    <div class="create-container">
        <h1>Connexion</h1>
        <form action="" method="post">

            <div class="email-inputs">
                <div>
                    <label for="inputEmail">Email *</label>
                    <input type="email" name="email" id="inputEmail" value="<?= $email ?? "" ?>">
                </div>
            </div>

            <div class="password-inputs">
                <div>
                    <label for="inputPassword">Mot de passe *</label>
                    <input type="password" name="password" id="inputPassword" value="<?= $password ?? "" ?>">
                </div>
            </div>

            <input type="submit" value="Envoyer">
        </form>
    </div>
</body>

</html>