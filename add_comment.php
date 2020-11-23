<?php include "db.php" ?>
<?php
if (!empty($_POST['cmnt'])) {
    $inquiry_id = $_POST['inquiry_id'];
    $cmnt = $_POST['cmnt'];
    $cmnt = htmlspecialchars($cmnt);
    $date = date("Y/m/d");

    $queryCmnt = "INSERT INTO `comment`(`inquiry_id`, `comment`,`date`) VALUES ('$inquiry_id','$cmnt','$date')";
    $q_resCmnt = mysqli_query($con, $queryCmnt);
    if (!$q_resCmnt) {
        die("query could'nt be made " . mysqli_error($con));
    }
}
