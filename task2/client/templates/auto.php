<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoShop</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/fontawesome.min.css">-->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">AUT<i class="far fa-circle" aria-hidden="true"></i>SH<i
                        class="far fa-circle"></i>P </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="http://gfl:8070/SOAP1/task2/client">Home</a></li>
            </ul>
        </div>
    </div>
</div>

<div id="autos" class="gen">
    <div class="container">
        <div class="row centered">
            <h3>Auto Information</h3>
            <div class="col-lg-12">
                <?php
                //var_dump($carInfoRes);
                if (is_array($carInfoRes)) {
                    foreach ($carInfoRes as $inf) {

                        foreach ($inf as $val) {
                            if ($val->key && $val->value && $val->key != 'id') {
                                ?>
                                <p><?= $val->key ?> - <?= $val->value ?></p>
                                <?
                            }
                        }
                        if ($inf->key && $inf->value) { ?>

                            <p><?= $inf->key ?> - <?= $inf->value ?></p>
                        <? }
                    }
                } else {
                    ?>
                    <p><?= $carInfoRes ?></p>
                <? }
                ?>

            </div>
        </div>
    </div>
</div>

<div id="search" class="gen">
    <div class="container">
        <div class="row centered">
            <h3>Here you can buy an auto!</h3>
            <p><?= $sendRequest ?></p>
            <div class="col-lg-12">
                <form class="navbar-form navbar-center" role="search" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name" /required>
                        <input type="text" class="form-control" name="surname" placeholder="Surname"/required><br><br>
                        <div class="col-lg-12">
                            <input type="radio" id="money1"
                                   name="payment" value="cash" /required>
                            <label for="money1">Cash</label>
                            <input type="radio" id="money2"
                                   name="payment" value="card" /required>
                            <label for="money2">Card</label>
                        </div>
                        <a href="?auto_id=<?= $carInfoRes[0][0]->key ?>">
                            <button type="submit" class="btn btn-default">Buy</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<footer>
    <div id="f">
        <div class="container">
            <div class="row centered">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-vk"></i></a>
            </div>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>