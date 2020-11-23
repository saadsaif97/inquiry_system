<?php include "includes/header.php" ?>
<?php include "db.php" ?>

<?php 
if(isset($_POST['delete'])){

    $delete_id=$_GET["delete_id"];
    $query = "DELETE FROM `inquiry` WHERE `id`='$delete_id'";
    $q_res = mysqli_query($con,$query);
    if(!$q_res){
    die("query could'nt be made ".mysqli_error($con));
    }else{
        header("Location:view_inquiry.php");
    }
}

?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-pink">
      <a class="navbar-brand" href="report.php">VENTURETECH</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse bg-pink navbar-dark" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="add_inquiry.php"><i class="fa fa-plus" aria-hidden="true"></i> Add Inquiry</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="view_inquiry.php"><i class="fa fa-eye" aria-hidden="true"></i> View Inquries</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="report.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> Report</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admissions.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Admissions</a>
          </li>
          <li class="nav-item">
                <a class="nav-link" href="pipeline.php"><i class="fa fa-signal" aria-hidden="true"></i>
 Pipeline</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="sms.php"><i class="fa fa-commenting-o" aria-hidden="true"></i> Sms Category</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="reject.php"><i class="fa fa-eject" aria-hidden="true"></i> Reject</a>
            </li>

          <li class="nav-item">
            <a class="nav-link" href="courses.php"><i class="fa fa-certificate" aria-hidden="true"></i> Courses</a>
          </li>
               <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
          </li>
        </ul>
      </div>
    </nav>

   <div class="container pt-5">

      <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Rating</th>
                <th>Area</th>
                <th>Qualification</th>
                <th>Course looking for</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>

        <?php 
        $delete_id=$_GET["delete_id"];
        $query = "SELECT * FROM `inquiry` WHERE `id`='$delete_id'";
        $q_res = mysqli_query($con,$query);
        if(!$q_res){
        die("query could'nt be made ".mysqli_error($con));
        }

        $row = mysqli_fetch_assoc($q_res);
        $id=$row['id'];
        $nm=$row['name'];
        $em=$row['email'];
        $mob=$row['mob'];
        $rating=$row['rating'];
        $area=$row['area'];
        $qual=$row['qual'];
        $crs_looking=$row['crs_looking'];
        $date=$row['date'];
        $crs_sugg=$row['crs_sugg'];
        $last_inst=$row['last_inst'];
        $knew=$row['knew_from'];
        $knew_other=$row['knew_other'];
        $cnslr_name=$row['cnslr_name'];
        $cmnt=$row['cmnt'];
    
        
        ?>
        
        <tr>
            <td><?php echo $nm; ?></td>
            <td><?php echo $em; ?></td>
            <td><?php echo $rating; ?></td>
            <td><?php echo $area; ?></td>
            <td><?php echo $qual; ?></td>
            <td><?php echo $crs_looking; ?></td>
            <td><?php echo $date; ?></td>
        </tr>
            
        </tbody>
    </table>

    <form action="#" method="post">
        <h3 class="mb-4">Do you really want to delete this inquiry?</h3>
        <div class="form-group">
        <a href="view_inquiry.php" class="btn btn-secondary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Go back</a>
        <input type="submit" name="delete" class="btn btn-danger" value="Yes delete">
        </div>
    </form>

    </div>




<?php include "includes/footer.php" ?>