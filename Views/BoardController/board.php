<?php
if (!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}

//if (!in_array('user', $_SESSION['role'])) {
//    die('You do not have permission to watch this page!');
//}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="Public/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>Tinder things</title>
</head>


<div class="container">
    <div class="row">
        <div class="col-12">

        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div id="content">
                <img width="500" height="400" src="uploads/loggo.png">
                <form action="?page=addAd" method="post" enctype="multipart/form-data">

                    <?php
                    if (isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                        <br><br/>
                    <div class="form-group">
                       <input name="name" class="form-control" type="text"<span style="color: black"placeholder="Podaj nazwe przedmiotu">
                    </div>
                    <div class="form-group">
                        <input name="description" class="form-control" type="text" placeholder="Dodaj opis przedmiotu">
                    </div>
                    <div class="form-group">
                       <span style="color: white"> <label for="exampleFormControlSelect1">Miasto:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="city">
                            <?php
                            if (isset($city)) {
                                foreach ($city as $c) {
                                    echo "<option value=" . $c['idcity'] . ">" . $c['name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <span style="color: white">  <label for="exampleFormControlSelect2">Kategoria:</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="category">
                            <?php
                            if (isset($category)) {
                                foreach ($category as $cat) {
                                    echo "<option value=" . $cat['idcategory'] . "> " . $cat['name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input name="img" class="form-control" type="file" placeholder="zalcz zdj">
                    </div>
                    <button class="btn btn-primary">Wyślij</button>
                </form>
            </div>
        </div>
        <div class="col-3">
            <?php include('Views/common/menu.php') ?>`
        </div>
    </div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf