<?php session_start();
include("functionality.php");
validity(); ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>AccMan</title>
</head>
<script src="functionality.js"></script>

<body>

  <?php navbar(''); ?>

  <div class="container">

    <div class="row py-5">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-danger">Generator</span>
        </h4>
        <ul class="list-group mb-2">

          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Username</h6>
              <small class="text-danger">
                <a href="#" onclick="">Re-Gen</a> |
                <a href="#" onclick="">Set</a>
              </small>
            </div>
            <span class="text-muted">$5</span>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Password</h6>
              <small class="text-danger">
                <a href="#" onclick="gen_pswd();">Re-Gen</a> |
                <a href="#" onclick="set_pswd();">Set</a>
              </small>
            </div>
            <span class="text-success" id="generated-password">
              <script>
                gen_pswd();
              </script>
            </span>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Date of Birth</h6>
              <small class="text-danger">
                <a href="#" onclick="gen_dob();">Re-Gen</a> |
                <a href="#">Set</a>
              </small>
            </div>
            <span class="text-success" id="generated-dob">
              <script>
                gen_dob();
              </script>
            </span>
          </li>
        </ul>

        <div class="card-deck mb-3 text-center">
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal">Names</h4>
            </div>
            <div class="card-body">
              <ul class="list-unstyled mt-0 mb-2">
                <li id="name-first"></li>
                <li id="name-second"></li>
                <li id="name-third"></li>
                <li id="name-fourth"></li>
                <li class="mb-1" id="name-fifth"></li>
                <li><small>
                    <a href="#">a</a>
                    <a href="#">b</a>
                    <a href="#">c</a>
                    <a href="#">d</a>
                    <a href="#">e</a>
                    <a href="#">f</a>
                    <a href="#">g</a>
                    <a href="#">h</a>
                    <a href="#">i</a>
                    <a href="#">j</a>
                    <a href="#">k</a>
                    <a href="#">l</a>
                    <a href="#">m</a>
                    <a href="#">n</a>
                    <a href="#">o</a>
                    <a href="#">p</a>
                    <a href="#">q</a>
                    <a href="#">r</a>
                    <a href="#">s</a>
                    <a href="#">t</a>
                    <a href="#">u</a>
                    <a href="#">v</a>
                    <a href="#">w</a>
                    <a href="#">x</a>
                    <a href="#">y</a>
                    <a href="#">z</a>
                  </small></li>
              </ul>
              <script>
                gen_names();
              </script>
              <button type="button" class="btn btn-lg btn-block btn-outline-primary" onclick="gen_names();">Re-Generate</button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-8 order-md-1">
        <h4 class="mb-3 text-light">New Account</h4>
        <form method="post" class="text-light" autocomplete="off">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="">
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="">
            </div>
          </div>

          <div class="mb-3">
            <label for="username">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">@</span>
              </div>
              <input type="text" class="form-control" id="username" placeholder="Username">
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com">
          </div>

          <div class="mb-3">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" placeholder="Password" value="">
          </div>

          <div class="mb-3">
            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
          </div>

          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="country">Country</label>
              <select class="custom-select d-block w-100" id="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label for="state">State</label>
              <select class="custom-select d-block w-100" id="state" required>
                <option value="">Choose...</option>
                <option>California</option>
              </select>
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder="" required>
            </div>
          </div>

          <hr class="mb-4">

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-name">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-cvv">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>

  </div>
  <?php htmlfoot(); ?>
