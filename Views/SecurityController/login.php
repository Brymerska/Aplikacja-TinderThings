<?php
if(isset($_SESSION['id']) and isset($_SESSION['role'])) {
    $url = "http://$_SERVER[HTTP_HOST]/projekt/";
    header("Location: {$url}?page=board");
    return;
}

?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="public/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>Tinder things</title>
</head>
<body>
<div class="container">
    <div class="logo">
        <br/><br/>
        <img width="700" height="300" src="uploads/loggo.png"
    </div>
    <form action="?page=login" method="POST">
        <div class="messages">
            <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
            ?>
        </div>
        <br/><br/>
        <span style="color: black"> <input name="email" type="text" placeholder="email@email.com">
            <br><br/>
        <span style="color: black"> <input name="password" type="password" placeholder="password">
              <br><br/>  <button type="submit">Zaloguj się </button>
        <HR>
    </form>
    <div class = "napis">
        <span style="color: white">Nie masz konta?<BR>
        <a href="?page=register">Zarejestruj się</a>
    </div>
</div>
</body>
</html>