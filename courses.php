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
    
    if(isset($_POST['add'])){
        $course=$_POST['course'];
        $course_code=$_POST['course_code'];
        $query="INSERT INTO `course`(`course_code`, `course`) VALUES ('$course_code','$course')";
        $q_res=mysqli_query($con,$query);
        if(!$q_res){
            die("Query unsuccessful ".mysqli_error($con));
        }
    }

    $queryGetCourses="SELECT * FROM `course`";
    $q_resCourses=mysqli_query($con,$queryGetCourses);
    if(!$q_resCourses){
        die("Query unsuccessful ".mysqli_error($con));
    }
    
?>

    <div class="container pt-5">
     
     <div class="row justify-content-center">
         
         <div class="col col-12 col-md-8">
             <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">course_code</th>
                      <th scope="col">course</th>
                      <th scope="col">edit</th>
                      <th scope="col">delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($q_resCourses)){  
                            $c_id=$row['id'];
                            $course=$row['course'];
                            $courseCode=$row['course_code'];
                    ?>
                     <tr>
                      <td><?php echo $course; ?></td>
                      <td><?php echo $courseCode; ?></td>
                      <td><a href="edit_course.php?edit_id=<?php echo $c_id; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                <td><a href="delete_course.php?delete_id=<?php echo $c_id; ?>" class="text-danger"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
         </div>
         
     </div>

     <div class="row justify-content-center">
         
         <div class="col col-12 col-md-8">
                 
            <form action="#" method="post">
                <div class="form-group">
                      <label for="course">Course:</label>
                      <input type="text" name="course" class="form-control" id="course" required>
                </div>
                <div class="form-group">
                      <label for="course_code">Course number:</label>
                      <input type="text" name="course_code" class="form-control" id="course_code" required>
                </div>
                <div class="form-group">
                      <input type="submit" name="add" class="btn btn-primary" value="Add course">
                </div>
      </form>
             
         </div>
         
     </div>

    </div>


<?php include "includes/footer.php" ?>