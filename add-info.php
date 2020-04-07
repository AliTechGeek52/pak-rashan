<?php
session_start();
$dsn = "mysql:host=localhost; dbname=pakrashan_rashan";
$db_user = "pakrashan_admin";
$db_password = "Fretab@23";

// For connecting to database currently i am using pdo approach...
try {
  $conn = new PDO($dsn, $db_user, $db_password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected";
} catch (PDOException $e) {
  die("ERROR: Could not connect. " . $e->getMessage());
}


if (isset($_SESSION["org_name"])) {
  echo '<h3>Login Success, Welcome - ' . $_SESSION["org_name"] . '</h3>';
  echo '<h3>Login Success, Welcome - ' . $_SESSION["org_password"] . '</h3>';
  $o_name = strval($_SESSION['org_name']);
  $o_password = strval($_SESSION['org_password']);
  $data = $conn->query("select * from volenters where vol_user_name = '" . $o_name . "'  and vol_password = '" . $o_password . "' limit 1")->fetchAll();

  echo '<p>' . $data[0]['vol_id'] . '</p>';
  echo '<br /><br /><a href="logout.php">Logout</a>';
} else {
  header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <title>Pak Rashaan</title>
</head>

<body>
  <header>
    <!-- Header above section starts-->
    <div class="logo">
      <img src="images/logo.png" alt="logo" />
    </div>
    <!-- Header above section ends -->
    <!-- Navigation starts -->
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#add">Add Details</a></li>
        <li><a href="#verify">Verification</a></li>

      </ul>
    </nav>
    <!-- Navigation Ends -->
  </header>
  <!-- Banner Section Starts -->
  <section>
    <span>LETS JOIN HANDS TO FIGHT AGAINST COVID-19 TO SAVE OUR BELOVED COUNTRY PAKISTAN</span>
    <img src="images/banner-1.jpg" alt="banner image" />
  </section>
  <!-- Banner Section Ends -->
  <!-- Forms Section Starts -->
  <h1>Add Info | Verification</h1>

  <section id="forms">

    <section id="add">
      <form action="">
        <label for="userName">First Name</label>
        <input id="userName" type="text" placeholder="Enter First Name">

        <label for="userName">Middle Name</label>
        <input id="userName" type="text" placeholder="Enter Middle Name">

        <label for="userName">last Name</label>
        <input id="userName" type="text" placeholder="Enter Last Name">

        <label for="date">Date</label>
        <input id="date" type="date">

        <label for="cnic">CNIC No</label>
        <input id="cnic" type="number" placeholder="XXXXX-XXXXXX-X">


        <button>Submit</button>

      </form>
    </section>
    <section id="verify" class="center_line_left">
      <form>
        <label for="cnic">CNIC No</label>
        <input id="cnic" type="number" placeholder="XXXXX-XXXXXX-X">

        <button>Verify</button>
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
</body>

</html>
