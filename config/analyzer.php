<?php session_start(); ?>
<?php include("functions.php"); ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AccMan</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
    a,
    a:focus,
    a:hover {
      color: #fff;
    }
    .btn-secondary,
    .btn-secondary:hover,
    .btn-secondary:focus {
      color: #333;
      text-shadow: none;
      background-color: #fff;
      border: .05rem solid #fff;
    }
    html,
    body {
      height: 100%;
      background-color: #333;
    }
    body {
      display: -ms-flexbox;
      display: flex;
      color: #fff;
      text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
      box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
    }
    .cover-container {
      max-width: 42em;
    }
    .masthead {
      margin-bottom: 2rem;
    }
    .masthead-brand {
      margin-bottom: 0;
    }
    .nav-masthead .nav-link {
      padding: .25rem 0;
      font-weight: 700;
      color: rgba(255, 255, 255, .5);
      background-color: transparent;
      border-bottom: .25rem solid transparent;
    }
    .nav-masthead .nav-link:hover,
    .nav-masthead .nav-link:focus {
      border-bottom-color: rgba(255, 255, 255, .25);
    }
    .nav-masthead .nav-link+.nav-link {
      margin-left: 1rem;
    }
    .nav-masthead .active {
      color: #fff;
      border-bottom-color: #fff;
    }
    @media (min-width: 48em) {
      .masthead-brand {
        float: left;
      }
      .nav-masthead {
        float: right;
      }
    }
    .cover {
      padding: 0 1.5rem;
    }
    .cover .btn-lg {
      padding: .75rem 1.25rem;
      font-weight: 700;
    }
    .mastfoot {
      color: rgba(255, 255, 255, .5);
    }
  </style>
</head>
<body class="text-center">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand">AccMan</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link active" href="#">Config</a>
        </nav>
      </div>
    </header>

<?php
include("host.php");
if (isset($hostname) && isset($username) && isset($password)) {
  if (@mysqli_connect($hostname,$username,$password)) {
    $hostConnection = "OK";
  } else {
    $hostConnection = "NAY";
  }
} else { $hostConnection = "NAY"; }
if (isset($hostConnection)) {
if ($hostConnection === "NAY") {
  echo form1();
  if (isset($_POST['submit'])) {
    if (@mysqli_connect($_POST['hostname'],$_POST['username'],$_POST['password'])) {
      write_to_file('host.php','yes', '
      $hostname = "'.$_POST['hostname'].'";
      $username = "'.$_POST['username'].'";
      $password = "'.$_POST['password'].'";'
      );
      $_SESSION['form1output']="Success";
    } else {
      $_SESSION['form1output']="failure";
    }
    if (isset($_SESSION['form1output'])) {
      echo '<script type="text/javascript">
        var el = document.getElementById(\'form1\');
        el.remove();
      </script>';
      if ($_SESSION['form1output'] === "Success") {
        echo form1_success_output();
      } else {
        echo form1_error_output();
      }
    }
  }
}
if ($hostConnection === "OK") {
      include("dbname.php");
      if (isset($database)) {
        if (@mysqli_connect($hostname,$username,$password,$database)) {
          $databaseConnection = "OK";
        } else {
          $databaseConnection = "NAY";
        }
      } else {
        $databaseConnection = "NAY";
      }
  if ($databaseConnection === "NAY") {
    echo form2();
    if (isset($_POST['submit'])) {
      write_to_file('dbname.php','yes','
      $database="'.$_POST['database'].'";'
      );
      include("dbname.php");
      $sql = "CREATE DATABASE IF NOT EXISTS $database";
      if(mysqli_query(mysqli_connect($hostname,$username,$password), $sql)){
        $_SESSION['form2output']="Success";
      } else {
        $_SESSION['form2output']="failure";
      }
      if (isset($_SESSION['form2output'])) {
        echo '<script type="text/javascript">
                var el = document.getElementById(\'form2\');
                el.remove();
              </script>';
        if ($_SESSION['form2output'] === "Success") {
          echo form2_success_output($database);
        } else {
          echo form2_error_output($database);
        }
      }
    }
  }
}
}
if(isset($databaseConnection)) {
if ($databaseConnection === "OK") {
  $con = mysqli_connect($hostname,$username,$password,$database);
  if (table_exist($con,'accs') && table_exist($con,'snaps') && table_exist($con,'trash')) {
    $tables_exist = "OK";
  } else {
    $tables_exist = "NAY";
  }
  if ($tables_exist === "NAY") {
    echo form3();
    if (isset($_POST['submit'])) {
      mysqli_query($con,table_query('accs'));
      mysqli_query($con,table_query('snaps'));
      mysqli_query($con,table_query('trash'));
      if (table_exist($con,'accs') && table_exist($con,'snaps') && table_exist($con,'trash')) {
        $_SESSION['form3output']="Success";
      } else {
        $_SESSION['form3output']="failure";
      }
      if (isset($_SESSION['form3output'])) {
        echo '<script type="text/javascript">
                var el = document.getElementById(\'form3\');
                el.remove();
              </script>';
        if ($_SESSION['form3output'] === "Success") {
          echo form3_success_output();
        } else {
          echo form3_error_output();
        }
      }
    }
  }
  if ($tables_exist === "OK") {
    $_SESSION['welcome']="YAY";
    header("location: ../index.php");
  }
}
}
// UP IS OKAY !




?>


    <footer class="mastfoot mt-auto">
      <div class="inner">
        <p>Accounts Manager <a href="https://github.com/electrodragon/accman.git">AccMan</a>, by <a href="https://github.com/electrodragon">@electrodragon</a>.</p>
      </div>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
