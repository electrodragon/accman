<?php
session_start();
include("functionality.php");
validity();
htmlhead();
navbar('');

$new=null;

if (isset($_REQUEST['new'])) {
    if ($_REQUEST['new'] === "acc") {
        $new = $_REQUEST['new'];
    } elseif ($_REQUEST['new'] === "snap") {
        $new = $_REQUEST['new'];
    }
}

if ($new === "acc") {

}

htmlfoot();
?>

<div class="container">

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Product name</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$12</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Second product</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$8</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Third item</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>$20</strong>
        </li>
      </ul>
<!--  -->

  <div class="col-md-8 order-md-1 acc_form mt-3">
        <h4 class="mb-3">New Account</h4>
        <form method="post" autocomplete="off">

          <div class="row">
            <div class="col-md-6 mb-3">
              <input type="text" class="form-control" placeholder="First Name" value="">
            </div>
            <div class="col-md-6 mb-3">
              <input type="text" class="form-control" placeholder="Last Name" value="">
            </div>
          </div>

          <div class="mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">@</span>
              </div>
              <input type="text" class="form-control" placeholder="Username">
            </div>
          </div>

          <div class="mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Email</span>
              </div>
              <input type="email" class="form-control" placeholder="you@example.com">
            </div>
          </div>

          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Password">
          </div>

          <div class="mb-3">
            <input type="text" class="form-control" placeholder="twitter, facebook, insta" required>
          </div>

          <div class="row">
            <div class="col-md-5 mb-3">
              <input type="text" class="form-control" name="phoneno" value="" value="" placeholder="0300 1234567">
            </div>
            <div class="col-md-4 mb-3">
              <input type="text" class="form-control" name="" value="" placeholder="1 Jan 2019">
            </div>
            <div class="col-md-3 mb-3">
              <select class="custom-select d-block w-100">
                <option value="">Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6 mb-2">
              <input type="text" class="form-control" placeholder="Note 1">
              <small class="text-muted">Customer No if godaddy account</small>
            </div>
            <div class="col-md-6 mb-2">
              <input type="text" class="form-control" id="cc-number" placeholder="Note 2">
              <small class="text-muted">Domain Name if godaddy account</small>
            </div>
          </div>
          <hr class="mb-1">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Add New Account !</button>
        </form>
      </div>
    </div>
