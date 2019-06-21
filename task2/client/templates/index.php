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
                <li class="active"><a href="#autos">Autos</a></li>
            </ul>
        </div>
    </div>
</div>

<div id="autos" class="gen">
    <div class="container">
        <div class="row centered">
            <h3>Autos</h3>
            <div class="col-lg-12">
                <?php foreach ($cars as $car) {
                    ?>
                    <a href="?auto_id=<?= $car[0] ?>">
                        <button name="<?= $car[0] ?>" class="btn btn-secondary">
                            <h5><?= $car[2] . " " . $car[1] ?></h5>
                        </button>

                    </a>
                    <?php
                }

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