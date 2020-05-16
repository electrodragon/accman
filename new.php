<?php
session_start();
include("functionality.php");
validity();

if (isset($_REQUEST['new'])) {
    if ($_REQUEST['new'] === "acc") {
        $new = $_REQUEST['new'];
    } elseif ($_REQUEST['new'] === "snap") {
        $new = $_REQUEST['new'];
    } else {
        header("location: index.php");
    }
} else {
    header("location: index.php");
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>AccMan</title>
  <script src="functionality.js"></script>
</head>

<body>

  <?php navbar(''); ?>

  <div class="container">

    <div class="row py-5">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-danger">Generator</span>
        </h4>
        <ul class="list-group mb-2">

          <li class="list-group-item d-flex justify-content-between lh-condensed bg-dark">
            <div>
              <h6 class="my-0 text-light">Username</h6>
              <small class="text-danger">
                <a class="text-light" href="#" onclick="gen_username();">Next</a> |
                <a class="text-light" href="#" onclick="username_set();">Set</a> |
                <a class="text-light" href="#" onclick="gen_usernameone();">1</a> |
                <a class="text-light" href="#" onclick="gen_usernametwo();">2</a> |
                <a class="text-light" href="#" onclick="gen_usernamethree();">3</a> |
                <a class="text-light" href="#" onclick="gen_usernameraninted();">R</a>
              </small>
            </div>
            <span class="text-success" id="username-viewer"></span>
            <script>gen_username();</script>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-condensed bg-dark">
            <div>
              <h6 class="my-0 text-light">Password</h6>
              <small class="text-danger">
                <a class="text-light" href="#" onclick="gen_pswd();">Re-Gen</a> |
                <a class="text-light" href="#" onclick="set_pswd();">Set</a>
              </small>
            </div>
            <span class="text-success" id="generated-password">
              <script>
                gen_pswd();
              </script>
            </span>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-condensed bg-dark">
            <div>
              <h6 class="my-0 text-light">Date of Birth</h6>
              <small class="text-danger">
                <a class="text-light" href="#" onclick="gen_dob();">Re-Gen</a> |
                <a class="text-light" href="#">Set</a>
              </small>
            </div>
            <span class="text-success" id="generated-dob">
              <script>gen_dob();</script>
            </span>
          </li>
        </ul>

        <div class="card-deck mb-3 text-center">
          <div class="card mb-4 shadow-sm bg-dark">
            <div class="card-header text-light">
              <h4 class="my-0 font-weight-normal">Names</h4>
            </div>
            <div class="card-body">
              <ul class="list-unstyled mt-0 mb-2 text-success">
                <li id="name-first"></li>
                <li id="name-second"></li>
                <li id="name-third"></li>
                <li id="name-fourth"></li>
                <li class="mb-1" id="name-fifth"></li>
                <li><small>
                    <a class="text-light" href="#" onclick="gen_aName();">a</a>
                    <a class="text-light" href="#" onclick="gen_bName();">b</a>
                    <a class="text-light" href="#" onclick="gen_cName();">c</a>
                    <a class="text-light" href="#" onclick="gen_dName();">d</a>
                    <a class="text-light" href="#" onclick="gen_eName();">e</a>
                    <a class="text-light" href="#" onclick="gen_fName();">f</a>
                    <a class="text-light" href="#" onclick="gen_gName();">g</a>
                    <a class="text-light" href="#" onclick="gen_hName();">h</a>
                    <a class="text-light" href="#" onclick="gen_iName();">i</a>
                    <a class="text-light" href="#" onclick="gen_jName();">j</a>
                    <a class="text-light" href="#" onclick="gen_kName();">k</a>
                    <a class="text-light" href="#" onclick="gen_lName();">l</a>
                    <a class="text-light" href="#" onclick="gen_mName();">m</a>
                    <a class="text-light" href="#" onclick="gen_nName();">n</a>
                    <a class="text-light" href="#" onclick="gen_oName();">o</a>
                    <a class="text-light" href="#" onclick="gen_pName();">p</a>
                    <a class="text-light" href="#" onclick="gen_qName();">q</a>
                    <a class="text-light" href="#" onclick="gen_rName();">r</a>
                    <a class="text-light" href="#" onclick="gen_sName();">s</a>
                    <a class="text-light" href="#" onclick="gen_tName();">t</a>
                    <a class="text-light" href="#" onclick="gen_uName();">u</a>
                    <a class="text-light" href="#" onclick="gen_vName();">v</a>
                    <a class="text-light" href="#" onclick="gen_wName();">w</a>
                    <a class="text-light" href="#" onclick="gen_xName();">x</a>
                    <a class="text-light" href="#" onclick="gen_yName();">y</a>
                    <a class="text-light" href="#" onclick="gen_zName();">z</a>
                  </small></li>
              </ul>
              <script>
                gen_names();
              </script>
              <button type="button" class="btn btn-lg btn-block btn-outline-warning" onclick="gen_names();">Re-Generate</button>
            </div>
          </div>
        </div>
      </div>

    <div class="col-md-8 order-md-1">
      <?php if ($new === "acc") {
        newAccAddForm();
      }elseif ($new === "snap") {
        newSnapAddForm();
      } ?>


    </div>
  </div>

<?php htmlfoot(); ?>
