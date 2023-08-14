<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

$nom= null;

if(!empty($_GET['action']) && $_GET['action'] === 'deconnecter'):
    unset($_COOKIE['utilisateur']);
    setcookie('utilisateur', '', time()-10);
endif;

if(!empty($_COOKIE['utilisateur'])):
    $nom=$_COOKIE['utilisateur'];
endif;

    if(!empty($_POST['name'])):
        setcookie('utilisateur', $_POST['name']);
        header('Location: /profil.php');
    endif;
?>

<?php
if (!isset($nom)):
    echo <<<HTML
    <form method="post">
        <label>Entrez votre nom</label>
        <input name="name"></input>
        <button>Se connecter</button>
    </form>

HTML;

else: echo <<<HTML

<h1> Hello $nom </h1>
<a href="profil.php?action=deconnecter">Se deconnecter</a> 
HTML;

endif;
?>
</body>
</html>