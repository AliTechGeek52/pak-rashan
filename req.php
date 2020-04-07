<?php
// Include config file
// require_once "config.php";

$final_data;

$dsn = "mysql:host=localhost; dbname=pakrashan_rashan";
$db_user = "pakrashan_admin";
$db_password = "Fretab@23";


// For connecting to database currently i am using pdo approach...
try {
    $conn = new PDO($dsn, $db_user, $db_password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected";

    $data = $conn->query("select * from organization_request")->fetchAll();
    // echo $affected_row . " Row Inserted<br>";
    $final_data = $data;
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
<?php

if (isset($_REQUEST['done'])) {
    // checking for empty field



    $ap_name = $_REQUEST['ap_name'];
    $ap_number = $_REQUEST['ap_number'];
    $ap_email = $_REQUEST['ap_email'];
    $ap_password = $_REQUEST['ap_password'];
    $sql = "INSERT INTO organizations (org_name, org_number, org_email, org_req_password) VALUES ('$ap_name', '$ap_number', '$ap_email', '$ap_password')";
    $conn->exec($sql);
    echo "<small>data entry done</small>";

    // echo $affected_row . " Row Inserted<br>";

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <!-- <?php //foreach ($final_data as $key => $row) { 
            ?>
        <div style="border: 1px solid black" id="req_<?php //echo $key 
                                                        ?>">
            <h2><?php //echo $row['org_req_id'] 
                ?></h2>
            <p><?php //echo $row['org_req_name'] 
                ?></p>
            <button>Password</button>
        </div>
    <?php // } 
    ?> -->
    <table border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Number</td>
                <td>Email</td>
                <td>Password</td>
                <td>Reason</td>
                <td>approve</td>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <form action="" method="POST">
        <input name="ap_name" id="ap_name" type="text" placeholder="Enter Name">

        <input name="ap_number" id="ap_number" type="text" placeholder="Enter Registeration No">

        <input name="ap_email" id="ap_email" type="text" placeholder="Enter Organization Email">

        <input name="ap_password" id="ap_password" type="text" placeholder="Create Password">

        <input name="org_reason" id="org_reason" type="text" placeholder="Enter Reason">

        <button name="done" value="done" id="done">Sign Up</button>
    </form>

    <script>
        $(document).ready(function() {
            var row_data = [];

            <?php foreach ($final_data as $key => $row) { ?>
                $('tbody').append(`
                <tr class="rows">
                    <td id="id_<?php echo $key ?>"><?php echo $row['org_req_id'] ?></td>
                    <td id="name_<?php echo $key ?>"><?php echo $row['org_req_name'] ?></td>
                    <td id="number_<?php echo $key ?>"><?php echo $row['org_req_number'] ?></td>
                    <td id="email_<?php echo $key ?>"><?php echo $row['org_req_email'] ?></td>
                    <td id="password_<?php echo $key ?>"><?php echo $row['org_req_password'] ?></td>
                    <td id="reason_<?php echo $key ?>"><?php echo $row['org_req_reason'] ?></td>
                    <td>
                        <button id="buton_<?php echo $key ?>" value="<?php echo $key ?>">approve</button>
                    </td>
                </tr>`)
            <?php } ?>

            $.each($('.rows'), function(index) {
                row_data.push({
                    "id": $(`#id_${index}`).text(),
                    "name": $(`#name_${index}`).text(),
                    "number": $(`#number_${index}`).text(),
                    "email": $(`#email_${index}`).text(),
                    "password": $(`#password_${index}`).text(),
                    "reason": $(`#reason_${index}`).text()
                })
            })
            $("button").click(function(e) {
                console.log(e.target.value)
                console.log(row_data[e.target.value])
                $('#ap_name').empty();
                $('#ap_number').empty();
                $('#ap_email').empty();
                $('#ap_password').empty();
                $('#org_reason').empty();
                $('#ap_name').val(row_data[e.target.value]['name']);
                $('#ap_number').val(row_data[e.target.value]['number']);
                $('#ap_email').val(row_data[e.target.value]['email']);
                $('#ap_password').val(row_data[e.target.value]['password']);
                $('#org_reason').val(row_data[e.target.value]['reason']);
                // $('#done').click();
            })


            console.log(row_data)




        })
    </script>
</body>

</html>
