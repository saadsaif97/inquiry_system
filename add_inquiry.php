<?php include "includes/header.php" ?>
<?php include "db.php" ?>
<?php

if (isset($_POST['add'])) {

  $nm = $_POST['name'];
  $em = $_POST['email'];
  $mob = $_POST['mob'];
  $rating = $_POST['rating'];
  $area = $_POST['area'];
  $qual = $_POST['qual'];
  $crs_looking = $_POST['crs_looking'];
  $date = $_POST['date'];
  $crs_sugg = $_POST['crs_sugg'];
  $last_inst = $_POST['last_inst'];
  $knew = $_POST['knew_from'];
  $knew_other = $_POST['knew_other'];
  $cnslr_name = $_POST['cnslr_name'];
  $admission = $_POST['admission'];

  $query = "INSERT INTO `inquiry`(`name`, `mob`, `email`, `rating`, `area`, `qual`, `crs_looking`, `date`, `crs_sugg`, `last_inst`, `knew_from`, `knew_other`, `cnslr_name`, `admission`) VALUES ('$nm','$mob','$em','$rating','$area','$qual','$crs_looking','$date','$crs_sugg','$last_inst','$knew','$knew_other','$cnslr_name','$admission')";
  $q_res = mysqli_query($con, $query);
  if (!$q_res) {
    die("query error " . mysqli_error($con));
  } else {
    header("Location: view_inquiry.php");
  }
}
?>



<nav class="navbar navbar-expand-lg navbar-dark bg-pink">
  <a class="navbar-brand" href="report.php">VENTURETECH</a>
  <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse bg-pink navbar-dark" id="collapsibleNavId">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link active" href="add_inquiry.php"><i class="fa fa-plus" aria-hidden="true"></i> Add Inquiry</a>
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
        <a class="nav-link" href="courses.php"><i class="fa fa-certificate" aria-hidden="true"></i> Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
      </li>
    </ul>
  </div>
</nav>




<div id="addInq">
  <div class="container">
    <div class="row">
      <div class="col col-md-8 offset-md-2">
        <form action="#" method="post">
          <div class="text-center mb-3">
            <img src="img/logo.png" alt="logo">
          </div>
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name" required>
          </div>
          <div class="form-group">
            <label for="mob">Mobile number:</label>
            <input type="text" name="mob" class="form-control" id="mob" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" required>
          </div>
          <div class="form-group">
            <label for="area">Area:</label>
            <input type="text" name="area" class="form-control" id="area" required>
          </div>
          <div class="form-group">
            <label for="qual">Qualification:</label>
            <select name="qual" id="qual" required>
              <option value="matric">Matric</option>
              <option value="intermediate">Intermediate</option>
              <option value="graduation">Graduation</option>
              <option value="post_grad">Post Graduation</option>
            </select>
          </div>
          <div class="form-group">
            <label for="last_inst">Last Institute:</label>
            <input type="text" name="last_inst" class="form-control" id="last_inst" placeholder="if any...">
          </div>
          <div class="form-group">
            <label for="crs_looking">Course looking for:</label>
            <select name="crs_looking" id="crs_looking" required>
              <?php
              $queryCrs = "SELECT * FROM `course`";
              $q_resCrs = mysqli_query($con, $queryCrs);
              if (!$q_resCrs) {
                die("Query unsuccessful " . mysqli_error($con));
              }
              while ($row = mysqli_fetch_assoc($q_resCrs)) {
                $course = $row['course'];
                $code = $row['course_code'];
              ?>
                <option value="<?php echo $course; ?>"><?php echo $course; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <hr>
          <h5 style="font-weight: bold;">How did you know about Venturetech?</h5>
          <div class="form-group">
            <label><input type="checkbox" name="knew_from" value="friend">Friend / Venturetech Student</label>
            <label><input type="checkbox" name="knew_from" value="web">Website / Facebook</label>
            <label><input type="checkbox" name="knew_from" value="front board">Front board</label>
            <label><input type="checkbox" name="knew_from" value="bill board">Bill Board</label>
            <label><input type="checkbox" name="knew_from" value="flyer">Flyer</label>
            <label><input type="checkbox" name="knew_from" value="newspaper">Newspaper</label>
            <label><input type="checkbox" name="knew_from" value="tv_ad">TV / Cable Ad</label>
            <label><input type="checkbox" name="knew_from" value="other">Other:</label>
            <input type="text" class="form-control" name="knew_other" id="knew_other" placeholder="please specify other source (if any)">
          </div>
          <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required>
          </div>
          <hr>
          <h4 class="font-weight-bold">Office use only</h4>
          <div class="form-group">
            <label for="cnslr_name">Counselor Name:</label>
            <input type="text" name="cnslr_name" class="form-control" id="cnslr_name" required>
          </div>
          <div class="form-group">
            <label for="crs_sugg">Course suggusted:</label>
            <select name="crs_sugg" id="crs_sugg" required>
              <?php
              $queryCrs = "SELECT * FROM `course`";
              $q_resCrs = mysqli_query($con, $queryCrs);
              if (!$q_resCrs) {
                die("Query unsuccessful " . mysqli_error($con));
              }
              while ($row = mysqli_fetch_assoc($q_resCrs)) {
                $course = $row['course'];
                $code = $row['course_code'];
              ?>
                <option value="<?php echo $course; ?>"><?php echo $course; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="rating">Rating:</label>
            <label><input type="radio" name="rating" value="1"> 1</label>
            <label><input type="radio" name="rating" value="2"> 2</label>
            <label><input type="radio" name="rating" value="3"> 3</label>
            <label><input type="radio" name="rating" value="4"> 4</label>
            <label><input type="radio" name="rating" value="5"> 5</label>
          </div>
          <div class="form-group">
            <label for="admission">Admission:</label>
            <label><input type="radio" name="admission" value="0"> No</label>
            <label><input type="radio" name="admission" value="1"> Yes</label>
          </div>
          <div class="form-group">
            <input type="submit" name="add" class="btn btn-primary" value="Add Inquiry">
          </div>
        </form>
      </div>
    </div>

  </div>
</div>



<?php include "includes/footer.php" ?>