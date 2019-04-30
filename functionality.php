<?php
function validity()
{
    include("config/host.php");
    include("config/dbname.php");
    include("config/functions.php");
    $_SESSION['welcome']="NAY";
    if (!isset($hostname) || !isset($username) || !isset($password) || !isset($database)) {
        header("location: config/analyzer.php");
    } else {
        $con = mysqli_connect($hostname, $username, $password, $database);
        if (!$con) {
            header("location: config/analyzer.php");
        }
        if (table_exist($con, 'accs') && table_exist($con, 'snaps') && table_exist($con, 'trash')) {
            $_SESSION['welcome'] = "YAY";
        } else {
            $_SESSION['welcome'] = "NAY";
        }
    }
    if ($_SESSION['welcome'] !== "YAY") {
        header("location: config/analyzer.php");
    }
}

function htmlhead()
{
    echo '<!doctype html>
          <html lang="en">

          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="css/style.css">
            <title>AccMan</title>
          </head>

          <body>';
}

function navbar($page)
{
    $_1=$_2=$_3=null;
    if ($page === "accman") {
        $_1=" active";
    } elseif ($page === "snapman") {
        $_2=" active";
    } elseif ($page === "trashman") {
        $_3=" active";
    }
    echo '<nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container">
            <a href="#" class="navbar-brand">AccMan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                +
                </a>
                <div class="dropdown-menu bg-danger" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="new.php?new=acc">New Account</a>
                  <a class="dropdown-item" href="new.php?new=snap">New Snap</a>
                </div>
              </li>
                <li class="nav-item">
                  <a href="accman.php" class="nav-link'.$_1.'">Home</a>
                </li>
                <li class="nav-item">
                  <a href="snapman.php" class="nav-link'.$_2.'">Snaps</a>
                </li>
                <li class="nav-item">
                  <a href="trashman.php" class="nav-link'.$_3.'">Trash</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>';
}

function htmlfoot()
{

    echo '
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body>

        </html>
        ';
}
