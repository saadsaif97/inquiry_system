<?php include "includes/header.php" ?>
<?php include "db.php" ?>
<?php
if (isset($_POST['update'])) {
  $edit_id = $_GET["edit_id"];

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
  $query = "UPDATE `inquiry` SET `name`='$nm',`mob`='$mob',`email`='$em',`rating`='$rating',`area`='$area',`qual`='$qual',`crs_looking`='$crs_looking',`date`='$date',`crs_sugg`='$crs_sugg',`last_inst`='$last_inst',`knew_from`='$knew',`knew_other`='$knew_other',`cnslr_name`='$cnslr_name',`admission`='$admission' WHERE `id`='$edit_id'";
  $q_res = mysqli_query($con, $query);
  if (!$q_res) {
    die("query could'nt be made " . mysqli_error($con));
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
        <a class="nav-link" href="courses.php"><i class="fa fa-certificate" aria-hidden="true"></i> Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
      </li>
    </ul>
  </div>
</nav>


<?php
if (isset($_GET["edit_id"])) {
  $edit_id = $_GET["edit_id"];
  $query = "SELECT * FROM `inquiry` WHERE `id`='$edit_id'";
  $q_res = mysqli_query($con, $query);
  if (!$q_res) {
    die("query could'nt be made " . mysqli_error($con));
  }
  $row = mysqli_fetch_assoc($q_res);
  $id = $row['id'];
  $nm = $row['name'];
  $em = $row['email'];
  $mob = $row['mob'];
  $rating = $row['rating'];
  $area = $row['area'];
  $qual = $row['qual'];
  $crs_looking = $row['crs_looking'];
  $date = $row['date'];
  $crs_sugg = $row['crs_sugg'];
  $last_inst = $row['last_inst'];
  $knew = $row['knew_from'];
  $knew_other = $row['knew_other'];
  $cnslr_name = $row['cnslr_name'];
  $admission = $row['admission'];
?>

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
              <input type="text" name="name" class="form-control" id="name" value="<?php echo $nm; ?>" required>
            </div>
            <div class="form-group">
              <label for="mob">Mobile number:</label>
              <input type="text" name="mob" class="form-control" id="mob" value="<?php echo $mob; ?>" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" name="email" class="form-control" id="email" value="<?php echo $em; ?>" required>
            </div>
            <div class="form-group">
              <label for="area">Area:</label>
              <input type="text" name="area" class="form-control" id="area" value="<?php echo $area; ?>" required>
            </div>
            <div class="form-group">
              <label for="qual">Qualification:</label>
              <select name="qual" id="qual" value="<?php echo $qual; ?>" required>
                <option value="matric" <?php if ($qual == "matric") echo 'selected="selected"'; ?>>Matric</option>
                <option value="intermediate" <?php if ($qual == "intermediate") echo 'selected="selected"'; ?>>Intermediate</option>
                <option value="graduation" <?php if ($qual == "graduation") echo 'selected="selected"'; ?>>Graduation</option>
                <option value="post_grad" <?php if ($qual == "post_grad") echo 'selected="selected"'; ?>>Post Graduation</option>
              </select>
            </div>
            <div class="form-group">
              <label for="last_inst">Last Institute:</label>
              <input type="text" name="last_inst" class="form-control" id="last_inst" value="<?php echo $last_inst; ?>" placeholder="if any...">
            </div>
            <div class="form-group">
              <label for="crs_looking">Course looking for:</label>
              <select name="crs_looking" id="crs_looking" value="<?php echo $crs_looking; ?>" required>
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
                  <option value="<?php echo $course; ?>" <?php if ($course == "$crs_looking") echo 'selected="selected"'; ?>><?php echo $course; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <hr>
            <h5 style="font-weight: bold;">How did you know about Venturetech?</h5>
            <div class="form-group">
              <label><input type="checkbox" name="knew_from" value="friend" <?php if ($knew == "friend") {
                                                                              echo 'checked';
                                                                            } ?>>Friend / Venturetech Student</label>
              <label><input type="checkbox" name="knew_from" value="web" <?php if ($knew == "web") {
                                                                            echo 'checked';
                                                                          } ?>>Website / Facebook</label>
              <label><input type="checkbox" name="knew_from" value="front board" <?php if ($knew == "front board") {
                                                                                    echo 'checked';
                                                                                  } ?>>Front board</label>
              <label><input type="checkbox" name="knew_from" value="bill board" <?php if ($knew == "bill board") {
                                                                                  echo 'checked';
                                                                                } ?>>Bill Board</label>
              <label><input type="checkbox" name="knew_from" value="flyer" <?php if ($knew == "flyer") {
                                                                              echo 'checked';
                                                                            } ?>>Flyer</label>
              <label><input type="checkbox" name="knew_from" value="newspaper" <?php if ($knew == "newspaper") {
                                                                                  echo 'checked';
                                                                                } ?>>Newspaper</label>
              <label><input type="checkbox" name="knew_from" value="tv_ad" <?php if ($knew == "tv_ad") {
                                                                              echo 'checked';
                                                                            } ?>>TV / Cable Ad</label>
              <label><input type="checkbox" name="knew_from" value="other" <?php if ($knew == "other") {
                                                                              echo 'checked';
                                                                            } ?>>Other:</label>
              <input type="text" class="form-control" name="knew_other" id="knew_other" placeholder="please specify other source (if any)" value="<?php if ($knew_other) {
                                                                                                                                                    echo $knew_other;
                                                                                                                                                  } ?>">
            </div>
            <div class="form-group">
              <label for="date">Date:</label>
              <input type="date" name="date" id="date" value="<?php echo $date; ?>" required>
            </div>
            <hr>
            <h4 class="font-weight-bold">Office use only</h4>
            <div class="form-group">
              <label for="cnslr_name">Counselor Name:</label>
              <input type="text" name="cnslr_name" class="form-control" id="cnslr_name" value="<?php echo $cnslr_name; ?>" required>
            </div>
            <div class="form-group">
              <label for="crs_sugg">Course suggusted:</label>
              <select name="crs_sugg" id="crs_sugg" value="<?php echo $crs_sugg; ?>" required>
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
                  <option value="<?php echo $course; ?>" <?php if ($course == "$crs_sugg") echo 'selected="selected"'; ?>><?php echo $course; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="rating">Rating:</label>
              <label><input type="radio" name="rating" value="1" <?php if ($rating == "1") {
                                                                    echo 'checked';
                                                                  } ?>> 1</label>
              <label><input type="radio" name="rating" value="2" <?php if ($rating == "2") {
                                                                    echo 'checked';
                                                                  } ?>> 2</label>
              <label><input type="radio" name="rating" value="3" <?php if ($rating == "3") {
                                                                    echo 'checked';
                                                                  } ?>> 3</label>
              <label><input type="radio" name="rating" value="4" <?php if ($rating == "4") {
                                                                    echo 'checked';
                                                                  } ?>> 4</label>
              <label><input type="radio" name="rating" value="5" <?php if ($rating == "5") {
                                                                    echo 'checked';
                                                                  } ?>> 5</label>
            </div>
            <div class="form-group">
              <label for="admission">Admission:</label>
              <label><input type="radio" name="admission" value=0 <?php if ($admission == 0) {
                                                                    echo 'checked';
                                                                  } ?>> No</label>
              <label><input type="radio" name="admission" value=1 <?php if ($admission == 1) {
                                                                    echo 'checked';
                                                                  } ?>> Yes</label>
              <label><input type="radio" name="admission" value=2 <?php if ($admission == 2) {
                                                                    echo 'checked';
                                                                  } ?>> Pipeline</label>
              <label><input type="radio" name="admission" value=3 <?php if ($admission == 3) {
                                                                    echo 'checked';
                                                                  } ?>> SMS Category</label>
              <label><input type="radio" name="admission" value=4 <?php if ($admission == 4) {
                                                                    echo 'checked';
                                                                  } ?>> Reject</label>

            </div>
            <div class="form-group">
              <a href="view_inquiry.php" class="btn btn-secondary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
              <input type="submit" name="update" class="btn btn-primary" value="Update Inquiry">
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

<?php
}
?>

<?php include "includes/footer.php" ?>