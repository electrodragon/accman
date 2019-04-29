<?php

function write_to_file($file,$phpinc="no",$txt) {
  $myfile = fopen($file, "w") or die("Unable to open file!");
  if ($phpinc === "yes") {
    fwrite($myfile, '<?php');
    fwrite($myfile, $txt);
    fwrite($myfile, PHP_EOL.'?>');
  } else {
    fwrite($myfile, $txt);
  }
  fclose($myfile);
}
function table_exist($con,$table) {
  if(mysqli_num_rows(mysqli_query($con,"SHOW TABLES LIKE '$table'"))) {
    return true;
  } else {
    return false;
  }
}

function table_query($table) {
  if ($table === "accs") {
    return "CREATE TABLE accs(
    id INT(150) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    site VARCHAR(150) NOT NULL,
    username VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    pass VARCHAR(150) NOT NULL,
    domain VARCHAR(150) NOT NULL,
    customerno VARCHAR(150) NOT NULL,
    firstname VARCHAR(150) NOT NULL,
    lastname VARCHAR(150) NOT NULL,
    phoneno VARCHAR(150) NOT NULL,
    dob VARCHAR(150) NOT NULL,
    gen VARCHAR(150) NOT NULL
  )";
  } elseif ($table === "snaps") {
    return "CREATE TABLE snaps(
    id INT(150) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    snippet VARCHAR(150) NOT NULL,
    pass1 VARCHAR(150) NOT NULL,
    pass2 VARCHAR(150) NOT NULL,
    pass3 VARCHAR(150) NOT NULL,
    pass4 VARCHAR(150) NOT NULL,
    pass5 VARCHAR(150) NOT NULL,
    pass6 VARCHAR(150) NOT NULL
  )";
  } elseif ($table === "trash") {
  return "CREATE TABLE trash(
    id INT(150) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    site VARCHAR(150) NOT NULL,
    username VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    pass VARCHAR(150) NOT NULL,
    domain VARCHAR(150) NOT NULL,
    customerno VARCHAR(150) NOT NULL,
    firstname VARCHAR(150) NOT NULL,
    lastname VARCHAR(150) NOT NULL,
    phoneno VARCHAR(150) NOT NULL,
    dob VARCHAR(150) NOT NULL,
    gen VARCHAR(150) NOT NULL
  )";
  }
}

function form1() {
  return '<div id="form1">
          <div class="alert alert-info" role="alert">
            Connection Details:
          </div>
          <form method="post">
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Username</span>
                </div>
                <input type="text" class="form-control" placeholder="Username" value="root" name="username">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Password</span>
                </div>
                <input type="text" class="form-control" placeholder="" value="" name="password">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Host</span>
                </div>
                <input type="text" class="form-control" placeholder="localhost" value="localhost" name="hostname">
              </div>
            </div>
            <button type="submit" class="btn btn-primary form-control" name="submit">Connect !!!</button>
          </form></div>';
}
function form1_success_output() {
  return '<br><main role="main" class="inner cover">
      <h1 class="cover-heading" style="color:limegreen;">Access Granted !</h1>
      <p class="lead">Your Details are Correct, Connection Established !.</p>
      <p class="lead">
        <a href="../index.php" class="btn btn-lg btn-primary">Continue</a>
      </p>
      </main>';
}
function form1_error_output() {
  return '<br><main role="main" class="inner cover">
  <h1 class="cover-heading" style="color:tomato;">Access Denied !</h1>
  <p class="lead">Your Details are Incorrect, Connection Failed !.</p>
  <p class="lead">
      <a href="../index.php" class="btn btn-lg btn-primary">Configure</a>
    </p>
  </main>';
}

function form2() {
  return '<div id="form2"><div class="alert alert-info" role="alert">
          DataBase Details:
        </div>
        <form method="post">
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">DataBase Name:</span>
              </div>
              <input type="text" class="form-control" placeholder="DataBase" value="accman" name="database">
            </div>
          </div>
          <button type="submit" class="btn btn-outline-warning form-control" name="submit">Create Database !!!</button>
        </form></div>';
}
function form2_success_output($database) {
    return '<main role="main" class="inner cover">
    <h1 class="cover-heading" style="color:limegreen;">DataBase Created !</h1>
    <p class="lead">Database '.$database.' has been Created, Continue !.</p>
    <p class="lead">
      <a href="index.php" class="btn btn-lg btn-primary">Continue</a>
    </p>
    </main>';
}
function form2_error_output($database) {
  return '<main role="main" class="inner cover">
  <h1 class="cover-heading" style="color:tomato;">DataBase Error !</h1>
  <p class="lead">Something Went Wrong while creating '.$database.' DB, Try Again or Create Manually !</p>
  <p class="lead">
    <a href="../index.php" class="btn btn-lg btn-primary">Go Back !</a>
  </p>
  </main>';
}

function form3() {
  return '<div id="form3"><main role="main" class="inner cover" style="text-align:left;">
    <p class="lead">AccMan Needs Following 3 Tables to Store its data !</p>
    <ol type="i">
      <li>accs</li>
      <li>snaps</li>
      <li>trash</li>
    </ol>
  </main>

  <form method="post">
    <button type="submit" class="btn btn-outline-light form-control" name="submit">Create Tables !!!</button>
  </form></div>';
}
function form3_success_output() {
  return '<main role="main" class="inner cover">
      <h1 class="cover-heading" style="color:limegreen;">Tables Created !</h1>
      <p class="lead">Tables Created, EveryThing is OK !.</p>
      <p class="lead">
        <a href="index.php" class="btn btn-lg btn-primary">Let\'s Go</a>
      </p>
      </main>';
}
function form3_error_output() {
  return '<main role="main" class="inner cover">
      <h1 class="cover-heading" style="color:tomato;">Tables Error !</h1>
      <p class="lead">Something Went Wrong, Try Again !</p>
      <p class="lead">
        <a href="index.php" class="btn btn-lg btn-primary">Go Back !</a>
      </p>
      </main>';
}

?>
