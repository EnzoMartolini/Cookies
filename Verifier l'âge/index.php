<form action="" method="POST">
<input type="date" name="date" min="1900-01-01">
<button type="submit">Envoyer</button>
</form>

<?php
if (isset($_POST['date'])):
    setcookie('date',$_POST['date']);
    header('Location: /index.php');
endif;

    $date = $_COOKIE['date'] ?? null;

if($date !== null):
    function AGE($date){
        $date = new DateTime($date);
        $aujourdui = new DateTime();
        $difference = $aujourdui->diff($date);
        return $difference->y;
    }


    $age = AGE($date);
    echo $age;
endif;

if(isset($age)):
    if($age >= 18):
        header('Location: /valide.php');
        unset($_COOKIE['date']);
        setcookie('date', '');
    else :
        header('Location: /nonvalide.php');
        unset($_COOKIE['date']);
        setcookie('date', '');
    endif;
endif;

?>