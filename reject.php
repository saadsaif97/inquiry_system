<?php include "includes/header.php" ?>
<?php include "db.php" ?>

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
                <a class="nav-link active" href="reject.php"><i class="fa fa-eject" aria-hidden="true"></i> Reject</a>
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
          $query = "SELECT * FROM `inquiry` WHERE `admission`=4";
          $q_res = mysqli_query($con,$query);
          if(!$q_res){
            die("query could'nt be made ".mysqli_error($con));
          }

          while ($row = mysqli_fetch_assoc($q_res)) {
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
            $admission=$row['admission'];
              
            $queryC = "SELECT * FROM `comment` WHERE `inquiry_id`='$id'";
          $q_resC = mysqli_query($con,$queryC);
          if(!$q_resC){
            die("query could'nt be made ".mysqli_error($con));
          } 
    
        
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
                <td><?php echo ($knew=="other" ? $knew_other : $knew) ?></td>
                <td><?php echo $cnslr_name; ?></td>
                <td><br>
                <div class="commentBox">
                   		<div style="font-weight:bolder;">Date</div>
                   		<div style="font-weight:bolder;">Comment</div>
                <?php
                while ($row = mysqli_fetch_assoc($q_resC)){
                    $c=$row['comment'];
                    $date=$row['date'];
                ?>		
                  		<div><?php echo $date; ?></div>
                   		<div><?php echo $c; ?></div>
                   		<?php
								}?>
                   </div>
                    <form action="add_comment.php?inquiry_id=<?php echo $id; ?>" method="post">
                        <div class="form-group">
                            <label for="cmnt">Comment:</label>
                            <input type="text" name="cmnt" class="form-control" id="cmnt" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" name="add" value="Add new">
                        </div>
                    </form>
                </td> 
                <td><?php echo ($admission == 1) ? ("Yes") : ("No"); ?></td>
                <td><a href="edit_inquiry.php?edit_id=<?php echo $id; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                <td><a href="delete_inquiry.php?delete_id=<?php echo $id; ?>" class="text-danger"><i class="fa fa-times" aria-hidden="true"></i></a></td>
            </tr>

        <?php 
        }
        ?>
            
        </tbody>
    </table>

    </div>



  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
  <script src="ttps://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
  <script>
      $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>

<?php include "includes/footer.php" ?>