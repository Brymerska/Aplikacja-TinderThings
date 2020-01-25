
<a href="?page=logout"><button class="btn btn-danger">Wyloguj się</button></a>

<a href="?page=board"><button class="btn btn-primary" style="margin-top:1em; hight:20%;width:70%;">Dodaj ogloszenie</button></a>
<a href="?page=showAd"><button class="btn btn-primary" style="margin-top:1em; width:70%;">Zobacz ogloszenia</button></a>
<?php
if (in_array('admin', $_SESSION['role'])) {
    ?>
    <a href="?page=admin"><button class="btn btn-primary" >Admin Panel</button></a>
<?php
}
?>

