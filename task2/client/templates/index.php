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
                <li class="active"><a href="#">Home</a></li>
                <li class="active"><a href="#search">Search</a></li>
                <li class="active"><a href="#autos">Autos</a></li>
            </ul>
        </div>
    </div>
</div>

<div id="search" class="gen">
    <div class="container">
        <div class="row centered">
            <h3>Search Auto for yourself</h3>
            <div class="col-lg-12">
                <form class="navbar-form navbar-center" role="search" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?= $brand?>" name="brand" placeholder="Brand">
                        <input type="text" class="form-control" value="<?= $model?>" name="model" placeholder="Model">
                        <input type="number" class="form-control" value="<?= $year?>" name="year_issue" placeholder="Year issue" required>
                        <input type="number" class="form-control" value="<?= $engine?>" name="engin_capacity" placeholder="Engine capacity">
                        <input type="number" class="form-control" value="<?= $speed?>" name="max_speed" placeholder="Max speed">
                        <input type="text" class="form-control" value="<?= $color?>" name="color" placeholder="Color">
                        <input type="number" class="form-control" value="<?= $priceFrom?>" name="price_from" placeholder="Price From">
                        <input type="number" class="form-control" value="<?= $priceTo?>" name="price_to" placeholder="Price To">
                        <button type="submit" class="btn btn-default">Search</button>
                    </div>
                </form>


                <?php

                if (isset($_POST['year_issue']) && is_array($search)) {

                    foreach ($search as $car) {
                        ?>
                        <a href="?auto_id=<?= $car[0] ?>">
                            <button name="btn_car" class="btn btn-secondary">
                                <h5><?= $car[2] . " " . $car[1] ?></h5>
                            </button>

                        </a>
                        <?php
                    }
                } else {
                    ?>
                    <p><?= $search ?></p>
                <? }
                ?>
            </div>
        </div>
    </div>
</div>

<div id="autos" class="gen">
    <div class="container">
        <div class="row centered">
            <h3>Autos</h3>

            <div class="col-lg-12">
                <?php
                if (is_array($cars)) {
                    foreach ($cars as $car) {
                        ?>
                        <a href="?auto_id=<?= $car[0] ?>">
                            <button name="btn_car" class="btn btn-secondary">
                                <h5><?= $car[2] . " " . $car[1] ?></h5>
                            </button>

                        </a>
                        <?php
                    }
                }else{?>
                    <p><?= $cars ?></p>
                <?}

                ?>

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
<script type='text/javascript'>


</script>
</body>
</html>