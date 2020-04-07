<?php
session_start();
// Include config file
// require_once "config.php";

$dsn = "mysql:host=localhost; dbname=pakrashan_rashan";
$db_user = "pakrashan_admin";
$db_password = "Fretab@23";


// For connecting to database currently i am using pdo approach...
try {
  $conn = new PDO($dsn, $db_user, $db_password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  if (isset($_REQUEST['Submit'])) {
    // checking for empty field
    if (($_REQUEST['org_req_name'] == "") || ($_REQUEST['org_req_number'] == "") || ($_REQUEST['org_req_email'] == "") || ($_REQUEST['org_req_reason'] == "")) {
      echo "<small>Fill all the fields</small>";
    } else {
      if ($_REQUEST['org_req_password'] == $_REQUEST['confirm_password']) {
        $password = $_REQUEST['org_req__reg_password'];
        $org_req_name = $_REQUEST['org_req_name'];
        $org_req_number = $_REQUEST['org_req_number'];
        $org_req_email = $_REQUEST['org_req_email'];
        $org_req_reason = $_REQUEST['org_req_reason'];
        $org_req_password = $password;
        $sql = "INSERT INTO organization_request (org_req_name, org_req_number, org_req_email, org_req_password, org_req_reason) VALUES ('$org_req_name', '$org_req_number', '$org_req_email', '$org_req_password', '$org_req_reason')";
        $conn->exec($sql);
        echo "<small>data entry done</small>";
      } else {
        echo "<small>please check password</small>";
      }
    }
  }
} catch (PDOException $e) {
  die("ERROR: Could not connect. " . $e->getMessage());
}

?>
<?php


if (isset($_POST["login"])) {
  if (empty($_POST["org_name"]) || empty($_POST["org_req_password"])) {
    $message = '<label>All fields are required</label>';
  } else {
    $query = "SELECT * FROM organizations WHERE org_name = :org_name AND org_req_password = :org_password";
    $statement = $conn->prepare($query);
    $statement->execute(
      array(
        'org_name'     =>     $_POST["org_name"],
        'org_password'     =>     $_POST["org_req_password"]
      )
    );
    $count = $statement->rowCount();
    if ($count > 0) {
      $_SESSION["org_name"] = $_POST["org_name"];
      $_SESSION["org_req_password"] = $_POST["org_req_password"];

      header("location:add-volunteer.php");
    } else {
      $message = '<label>Wrong Data</label>';
    }
  }
}


?>

<?php

if (isset($_POST["login_vol"])) {
  if (empty($_POST["org_name"]) || empty($_POST["org_req_password"])) {
    $message = '<label>All fields are required</label>';
  } else {
    $query = "SELECT * FROM volenters WHERE vol_user_name = :org_name AND vol_password = :org_password";
    $statement = $conn->prepare($query);
    $statement->execute(
      array(
        'org_name'     =>     $_POST["org_name"],
        'org_password'     =>     $_POST["org_password"]
      )
    );
    $count = $statement->rowCount();
    if ($count > 0) {
      $_SESSION["org_name"] = $_POST["org_name"];
      $_SESSION["org_password"] = $_POST["org_password"];

      header("location:add-info.php");
    } else {
      $message = '<label>Wrong Data</label>';
    }
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <title>Pak Rashaan</title>
</head>

<body>
  <header>
    <!-- Header above section starts-->
    <div class="logo">
      <img src="images/logo.png" alt="logo" />
    </div>
    <div>
      <p>Contact Info: +92 3408373311</p>
    </div>

    <!-- Header above section ends -->
    <!-- Navigation starts -->
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About Us</a></li>

      </ul>
    </nav>
    <!-- Navigation Ends -->
  </header>
  <!-- Banner Section Starts -->
  <section>
    <span>LETS JOIN HANDS TOGETHER FIGHT AGAINST COVID-19 TO SAVE OUR BELOVED COUNTRY PAKISTAN</span>
    <img src="images/banner-1.jpg" alt="banner image" />
  </section>
  <!-- Banner Section Ends -->
  <!-- Forms Section Starts -->
  <h1 id="form_heading">Login | Sign Up</h1>

  <section id="forms">

    <section class="center_line">
      <form action="" method="POST">
        <label for="org_name">User Name</label>
        <input id="org_name" name="org_name" type="text" placeholder="Enter User Name">

        <label for="org_password">Password</label>
        <input id="org_password" name="org_password" type="password" placeholder="Enter Password">


        <button name="login" value="login">Login With Organization</button>
        <button name="login_vol" value="login_vol">Login With Volunteer</button>

      </form>
    </section>
    <section>
      <form action="" method="POST">
        <label for="org_req_name">Name</label>
        <input name="org_req_name" id="org_req_name" type="text" placeholder="Enter Name">

        <label for="org_req_number">Registration No</label>
        <input name="org_req_number" id="org_req_number" type="text" placeholder="Enter Registeration No">

        <label for="org_req_email">Organization Email</label>
        <input name="org_req_email" id="org_req_email" type="text" placeholder="Enter Organization Email">

        <label for="org_req_password">Create Password</label>
        <input name="org_req_password" id="org_req_password" type="text" placeholder="Create Password">

        <label for="confirm_password">Confirm Password</label>
        <input name="confirm_password" id="confirm_password" type="text" placeholder="Confirm Password">

        <label for="org_req_reason">Reason</label>
        <input name="org_req_reason" id="org_req_reason" type="text" placeholder="Enter Reason">

        <button name="Submit" value="Submit">Sign Up</button>



      </form>

    </section>
  </section>
  <!--- Verification Section Ends -->
  <!-- Message Section Starts -->
  <section class="message-section-spacing">
    <h1>Message By Parents of Nation</h1>
    <div class="message-section">
      <div>
        <img src="images/quaid.jpeg" alt="quaid" />
        <p class="message-text">
          "Come forward as servants of Islam,organize the people
          economically,socially,educationally and politically and I am sure that
          you will be a power that will be accepted by everybody."
          <pre><b>
              -  Mohammad Ali Jinnah</b></pre>
        </p>
      </div>
      <div>
        <img src="images/fatima.jpg" alt="fatima" />
        <p class="message-text">
          "There is a magic power in your own hands. Take your vital decisions-they may be grave
          and momentous and far-reaching in their consequences. Think a hundred times before you take any decision,
          but once a decision is taken, stand by it as one man."
          <pre><b>
            -  Fatima Jinnah</b></pre>
        </p>
      </div>
    </div>
  </section>
  <!-- Message Section Ends -->
  <script>

  </script>

</body>

</html>

<?php $conn = null; ?>
