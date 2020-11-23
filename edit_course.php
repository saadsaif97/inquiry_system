<?php include "includes/header.php"; ?>
<?php include "db.php"; ?>

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
            <a class="nav-link" href="view_inquiry.php"><i class="fa fa-eye" aria-hidden="true"></i> View Inquiries</a>
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
            <a class="nav-link active" href="courses.php"><i class="fa fa-certificate" aria-hidden="true"></i> Courses</a>
          </li>
               <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    
<?php
    $edit_id=$_GET['edit_id'];
    
    if(isset($_POST['update'])){
        $course=$_POST['course'];
        $course_code=$_POST['course_code'];
        $query="UPDATE `course` SET `course_code`='$course_code',`course`='$course' WHERE `id`='$edit_id'";
        $q_res=mysqli_query($con,$query);
        if(!$q_res){
            die("Query unsuccessful ".mysqli_error($con));
        }else{
            header("Location: courses.php");
        }
    }



    $queryCourse="SELECT * FROM `course`";
    $q_resCourse=mysqli_query($con,$queryCourse);
    if(!$q_resCourse){
        die("Query unsuccessful ".mysqli_error($con));
    }
    $row = mysqli_fetch_assoc($q_resCourse);
    $courseCurrent=$row['course'];
    $courseCodeCurrent=$row['course_code'];

    
?>

<div class="container pt-5">
     
    
     <div class="row justify-content-center">
         
         <div class="col col-12 col-md-8">
                 
            <form action="#" method="post">
                <div class="form-group">
                      <label for="course">Course:</label>
                      <input type="text" name="course" class="form-control" value="<?php echo $courseCurrent; ?>" id="course" required>
                </div>
                <div class="form-group">
                      <label for="course_code">Course number:</label>
                      <input type="text" name="course_code" value="<?php echo $courseCodeCurrent; ?>" class="form-control" id="course_code" required>
                </div>
                <div class="form-group mt-4">
                     <a href="courses.php" class="btn btn-secondary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                      <input type="submit" name="update" class="btn btn-primary" value="Update">
                </div>
            </form>
             
         </div>
         
     </div>

    </div>


<?php include "includes/footer.php" ?>