<?php include "includes/header.php" ?>
<?php include "db.php" ?>

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
        <a class="nav-link active" href="view_inquiry.php"><i class="fa fa-eye" aria-hidden="true"></i> View Inquiries</a>
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

  <div class="row">
    <div class="col col-12 col-md-6 col-lg-3" id="filter">
      <form action="view_inquiry.php" method="post">
        <div class="form-group">
          <label for="from">From:</label>
          <input type="date" class="form-control form-control-sm" name="from" id="from">
        </div>
        <div class="form-group">
          <label for="till">Till:</label>
          <input type="date" class="form-control form-control-sm" name="till" id="till">
        </div>
        <div class="form-group">
          <input type="submit" name="filter" class="btn btn-info btn-sm" value="Apply filter">
        </div>
      </form>
    </div>
  </div>

  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
      <tr>
        <th>Name</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Rating</th>
        <th>Area</th>
        <th>Qualification</th>
        <th>Course looking for</th>
        <th>Date</th>
        <th>Suggested course</th>
        <th>Last institute</th>
        <th>Knew from</th>
        <th>Counselor name</th>
        <th>=================</th>
        <th>Admission</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>


      <?php
      $query = "SELECT * FROM `inquiry` WHERE `admission`=0 ORDER BY `id` DESC";
      if (isset($_POST['filter'])) {
        $from = $_POST['from'];
        $till = $_POST['till'];
        echo "<p>Applied filter:</p>";
        if ($from && $till) {
          $query = "SELECT * FROM `inquiry` WHERE `admission`=0 AND `date` BETWEEN '$from' AND '$till' ORDER BY `id` DESC";
          echo "<h6>From: $from</h6>";
          echo "<h6>Till: $till</h6>";
        } else if ($from) {
          $query = "SELECT * FROM `inquiry` WHERE `admission`=0 AND `date`>='$from' ORDER BY `id` DESC";
          echo "<h6>From: $from</h6>";
        } else if ($till) {
          $query = "SELECT * FROM `inquiry` WHERE `admission`=0 AND `date`<='$till' ORDER BY `id` DESC";
          echo "<h6>Till: $till</h6>";
        } else {
          $query = "SELECT * FROM `inquiry` WHERE `admission`=0 ORDER BY `id` DESC";
          echo "<h6>No filters applied</h6>";
        }
      }
      echo "<br>";

      $q_res = mysqli_query($con, $query);
      if (!$q_res) {
        die("query could'nt be made " . mysqli_error($con));
      }


      while ($row = mysqli_fetch_assoc($q_res)) {
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
        $cmnt = $row['cmnt'];
        $admission = $row['admission'];

      ?>

        <tr>
          <td><?php echo $nm; ?></td>
          <td><?php echo $mob; ?></td>
          <td><?php echo $em; ?></td>
          <td><?php echo $rating; ?></td>
          <td><?php echo $area; ?></td>
          <td><?php echo $qual; ?></td>
          <td><?php echo $crs_looking; ?></td>
          <td><?php echo $date; ?></td>
          <td><?php echo $crs_sugg; ?></td>
          <td><?php echo $last_inst; ?></td>
          <td><?php echo ($knew == "other" ? $knew_other : $knew) ?></td>
          <td><?php echo $cnslr_name; ?></td>
          <td><br>

            <div class="commentBox" id="comments<?php echo $id; ?>">
            </div>

            <script type='text/javascript'>
              // $.get("fetch_comments.php?id=<?php echo $id; ?>", function(data) {
              //   document.getElementById("comments<?php echo $id; ?>").innerHTML = data;
              // })

              function fetchData<?php echo $id; ?>() {
                $.ajax({
                  type: 'get', // define the type of HTTP verb we want to use (POST for our form)
                  url: 'fetch_comments.php?id=<?php echo $id; ?>', // the url where we want to POST
                  data: {
                    id: <?php echo $id; ?>
                  }, // our data object
                }).done(function(data) {
                  document.getElementById("comments<?php echo $id; ?>").innerHTML = data;
                  // console.log(document.getElementById("comments<?php echo $id; ?>").innerHTML);
                })
              }
              fetchData<?php echo $id; ?>();
            </script>



            <form id="comment_form<?php echo $id; ?>" onsubmit="return form_process(event)" method="post">
              <div class="form-group">
                <label for="cmnt">Comment:</label>
                <input type="text" name="cmnt<?php echo $id; ?>" class="form-control" id="cmnt<?php echo $id; ?>" required>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-info" name="add<?php echo $id; ?>" value="Add new">
              </div>
            </form>
            <script>
              function form_process(e) {
                e.preventDefault();
                e = e || window.event;
                let target = e.target || e.srcElement;

                let formData = {
                  'inquiry_id': <?php echo $id; ?>,
                  'cmnt': target[0].value,
                };
                $.ajax({
                  type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                  url: 'add_comment.php', // the url where we want to POST
                  data: formData, // our data object
                }).done(function() {
                  target[0].value = "";
                  setTimeout(fetchData<?php echo $id; ?>(), 2000);
                })
              }
            </script>




          </td>
          <td><?php echo ($admission) ? ("Yes") : ("No"); ?></td>
          <td><a href="edit_inquiry.php?edit_id=<?php echo $id; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
          <td><a href="delete_inquiry.php?delete_id=<?php echo $id; ?>" class="text-danger"><i class="fa fa-times" aria-hidden="true"></i></a></td>
        </tr>

      <?php
      }
      ?>

    </tbody>
  </table>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
<?php include "includes/footer.php" ?>