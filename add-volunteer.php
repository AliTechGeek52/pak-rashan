<?php
// Include config file
// require_once "config.php";
session_start();

$dsn = "mysql:host=localhost; dbname=pak";
$db_user = "root";
$db_password = "";


// For connecting to database currently i am using pdo approach...
try {
    $conn = new PDO($dsn, $db_user, $db_password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>
<?php

if (isset($_REQUEST['add'])) {
    // checking for empty field

    $vol_user_name = $_REQUEST['vol_user_name'];
    $vol_password = $_REQUEST['vol_password'];
    $vol_org_id = $_REQUEST['vol_org_id'];
    $sql = "INSERT INTO volenters (org_id, vol_user_name, vol_password) VALUES ('$vol_org_id', '$vol_user_name', '$vol_password')";
    $conn->exec($sql);
    echo "<small>volunteer entry done</small>";

    // echo $affected_row . " Row Inserted<br>";

}

if (isset($_SESSION["org_name"])) {
    echo '<h3>Login Success, Welcome - ' . $_SESSION["org_name"] . '</h3>';
    echo '<h3>Login Success, Welcome - ' . $_SESSION["org_password"] . '</h3>';
    $o_name = strval($_SESSION['org_name']);
    $o_password = strval($_SESSION['org_password']);
    $data = $conn->query("select * from organizations where org_name = '" . $o_name . "'  and org_password = '" . $o_password . "' limit 1")->fetchAll();

    echo '<p>' . $data[0]['org_id'] . '</p>';
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
                <label for="vol_user_name">User Name</label>
                <input id="vol_user_name" name="vol_user_name" type="text" placeholder="Enter User Name">

                <label for="vol_password">Password</label>
                <input id="vol_password" name="vol_password" type="password" placeholder="Enter Password">

                <input type="text" placeholder="Enter id" id="vol_org_id" name="vol_org_id" value="<?php echo $data[0]['org_id'] ?>">


                <button name="add" value="add">Submit</button>

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

<?php $conn = null; ?>