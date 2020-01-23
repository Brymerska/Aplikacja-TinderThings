<?php
if (!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}

if (!in_array('user', $_SESSION['role'])) {
    die('You do not have permission to watch this page!');
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <script src="public/js/App.js" ></script>
    <title>s</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            LOGO
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div id="content">
                <h1>Ogłoszenia</h1>
                <?php
                if (isset($ads)) {
                    foreach ($ads as $ad) {
                        echo "<div id='col-9' style=' margin-top:1em'><button onclick='showAd(".$ad['idad'].")' class='btn btn-warning' style='width:100%'>".
                                $ad['name']
                            ."</button></div>";
                    }
                }
                ?>

            </div>
        </div>
        <div class="col-3">
            <?php include('Views/common/menu.php') ?>`
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>