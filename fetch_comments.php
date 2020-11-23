<?php include "db.php" ?>
<?php

$id = $_GET['id'];

$queryC = "SELECT * FROM `comment` WHERE `inquiry_id`='$id'";
$q_resC = mysqli_query($con, $queryC);
if (!$q_resC) {
    die("query could'nt be made " . mysqli_error($con));
}
?>

<div style="font-weight:bolder;">Date</div>
<div style="font-weight:bolder;">Comment</div>
<?php
while ($row = mysqli_fetch_assoc($q_resC)) {
    $c = $row['comment'];
    $date = $row['date'];
?>
    <div><?php echo $date; ?></div>
    <div><?php echo $c; ?></div>
<?php
} ?>