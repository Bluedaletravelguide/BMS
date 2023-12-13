<?php include('functions.php'); ?>
<?php
$year = $_GET['year'];
$querystring = $_GET['query'];

if ($querystring == "All") {
  $query = "SELECT * FROM contacts2todo   ";
} else {
  $decodedq = urldecode($querystring);
  $query = "SELECT * FROM contacts2todo WHERE list_name='$decodedq'   ";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php include 'head.php' ?>
</head>

<body>

  <?php include 'header.php' ?>

  <!-- ======= Sidebar ======= -->
  <?php include 'sidebar.php' ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Contact -
        <?php echo $_GET['query'] ?> -
        <?php echo $year ?>
      </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item "><a href="contact2.php">Contact</a></li>
          <li class="breadcrumb-item active">List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">


        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Contact

                <div class="btn-group" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Year
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <?php
                    $query4 = "SELECT DATE_FORMAT(date_insert, '%Y') FROM contacts2todo_dates GROUP BY   DATE_FORMAT(date_insert, '%Y') ";


                    $result4 = mysqli_query($db, $query4);
                    while ($row4 = mysqli_fetch_assoc($result4)) {
                      ?>
                      <li><a class="dropdown-item"
                          href="contact2-list.php?query=<?php echo $querystring ?>&year=<?php echo $row4["DATE_FORMAT(date_insert, '%Y')"] ?>">
                          <?php echo $row4["DATE_FORMAT(date_insert, '%Y')"] ?>
                        </a></li>
                    <?php } ?>
                  </ul>
                </div>
              </h5>
              <p>Add lightweight datatables to your project with using the <a
                  href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library.
                Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

              <!-- Table with stripped rows -->
              <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filter">
                Filter
              </button> -->
              <div>
                Toggle column:
                <a class="toggle-vis btn btn-info mb-1 " data-column="0">User</a> -
                <a class="toggle-vis btn btn-info mb-1 " data-column="1">List Name</a> -
                <a class="toggle-vis btn btn-info mb-1 " data-column="2">Name</a> -
                <a class="toggle-vis btn btn-info mb-1 " data-column="3">Email</a> -
                <a class="toggle-vis btn btn-info mb-1 " data-column="4">Office Phone</a> -
                <a class="toggle-vis btn btn-info mb-1 " data-column="5">Mobile Phone</a> -
                <a class="toggle-vis btn btn-info mb-1 " data-column="6">City</a> -
                <a class="toggle-vis btn btn-info mb-1 " data-column="7">State</a> -
                <a class="toggle-vis btn btn-info mb-1 " data-column="8">Country</a> -
                <a class="toggle-vis btn btn-info mb-1 " data-column="9">Industry</a>
                <!-- <a class="toggle-vis" data-column="9">Date</a> -->
              </div>
              <table class="table table-striped table-bordered cell-border" id="example4" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">User</th>
                    <th scope="col">List Name</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Office Phone</th>
                    <th scope="col">Mobile Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Country</th>
                    <th scope="col">Industry</th>
                    <th scope="col">Jan</th>
                    <th scope="col">Feb</th>
                    <th scope="col">March</th>
                    <th scope="col">April</th>
                    <th scope="col">May</th>
                    <th scope="col">June</th>
                    <th scope="col">July</th>
                    <th scope="col">August</th>
                    <th scope="col">September</th>
                    <th scope="col">October</th>
                    <th scope="col">November</th>
                    <th scope="col">December</th>
                  </tr>
                </thead>
                <tbody>
                  <?php


                  $result = mysqli_query($db, $query);
                  while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>

                      <td>
                        <?php echo $row['list_created_for'] ?>
                      </td>
                      <td>
                        <?php echo $row['list_name'] ?>
                      </td>
                      <td>
                        <?php echo $row['company_name'] ?>
                      </td>
                      <td>
                        <?php echo $row['company_email'] ?>
                      </td>
                      <td>
                        <?php echo $row['company_phone_office'] ?>
                      </td>
                      <td>
                        <?php echo $row['company_phone_mobile'] ?>
                      </td>
                      <td>
                        <?php echo $row['city'] ?>
                      </td>
                      <td>
                        <?php echo $row['state'] ?>
                      </td>
                      <td>
                        <?php echo $row['country'] ?>
                      </td>
                      <td>
                        <?php echo $row['industry'] ?>
                      </td>


                      <?php
                      $idforthis = $row['id'];
                      $query2 = "SELECT * FROM contacts2todo_dates  WHERE contacts2todo_id='$idforthis' AND date_insert LIKE '%$year%' ";
                      $jan = array();
                      $feb = array();
                      $march = array();
                      $april = array();
                      $may = array();
                      $june = array();
                      $july = array();
                      $august = array();
                      $september = array();
                      $october = array();
                      $november = array();
                      $december = array();
                      $result2 = mysqli_query($db, $query2);
                      if (mysqli_num_rows($result2) >= 1) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                          if ($row2['type'] == "crm") {
                            $crmcheck = 1;
                            $input = date('d | h:i a', strtotime($row2['date_insert']));
                            // echo "<div class='btn btn-primary m-1'>crm :$input</div>";
                            // echo "<div>phone :$input</div>";
                    
                          }
                          if ($row2['type'] == "phone") {
                            $phonecheck = 1;
                            $input = date('d | h:i a', strtotime($row2['date_insert']));
                            // echo "<div>phone :$input</div>";
                          }
                          if ($row2['type'] == "email") {
                            $emailcheck = 1;
                            $input = date('d | h:i a', strtotime($row2['date_insert']));
                            // echo "<div>email :$input</div>";
                          }

                          if (date('n', strtotime($row2['date_insert'])) == 1) {
                            $jan[] = $row2['type'] . " :$input";
                          }
                          if (date('n', strtotime($row2['date_insert'])) == 2) {
                            $feb[] = $row2['type'] . " :$input";
                          }
                          if (date('n', strtotime($row2['date_insert'])) == 3) {
                            $march[] = $row2['type'] . " :$input";
                          }
                          if (date('n', strtotime($row2['date_insert'])) == 4) {
                            $april[] = $row2['type'] . " :$input";
                          }
                          if (date('n', strtotime($row2['date_insert'])) == 5) {
                            $may[] = $row2['type'] . " :$input";
                          }
                          if (date('n', strtotime($row2['date_insert'])) == 6) {
                            $june[] = $row2['type'] . " :$input";
                          }
                          if (date('n', strtotime($row2['date_insert'])) == 7) {
                            $july[] = $row2['type'] . " :$input";
                          }
                          if (date('n', strtotime($row2['date_insert'])) == 8) {
                            $august[] = $row2['type'] . " :$input";
                          }
                          if (date('n', strtotime($row2['date_insert'])) == 9) {
                            $september[] = $row2['type'] . " :$input";
                          }
                          if (date('n', strtotime($row2['date_insert'])) == 10) {
                            $october[] = $row2['type'] . " :$input";
                          }
                          if (date('n', strtotime($row2['date_insert'])) == 11) {
                            $november[] = $row2['type'] . " :$input";
                          }
                          if (date('n', strtotime($row2['date_insert'])) == 12) {
                            $december[] = $row2['type'] . " :$input";
                          }
                        }

                      }
                      // debug_to_console($jan);
                      ?>
                      <td>
                        <?php
                        foreach ($jan as $value) {
                          echo "<div class='btn btn-primary m-1'>" . $value . "</div>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        foreach ($feb as $value) {
                          echo "<div class='btn btn-primary m-1'>" . $value . "</div>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        foreach ($march as $value) {
                          echo "<div class='btn btn-primary m-1'>" . $value . "</div>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        foreach ($april as $value) {
                          echo "<div class='btn btn-primary m-1'>" . $value . "</div>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        foreach ($may as $value) {
                          echo "<div class='btn btn-primary m-1'>" . $value . "</div>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        foreach ($june as $value) {
                          echo "<div class='btn btn-primary m-1'>" . $value . "</div>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        foreach ($july as $value) {
                          echo "<div class='btn btn-primary m-1'>" . $value . "</div>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        foreach ($august as $value) {
                          echo "<div class='btn btn-primary m-1'>" . $value . "</div>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        foreach ($september as $value) {
                          echo "<div class='btn btn-primary m-1'>" . $value . "</div>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        foreach ($october as $value) {
                          echo "<div class='btn btn-primary m-1'>" . $value . "</div>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        foreach ($november as $value) {
                          echo "<div class='btn btn-primary m-1'>" . $value . "</div>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        foreach ($december as $value) {
                          echo "<div class='btn btn-primary m-1'>" . $value . "</div>";
                        }
                        ?>
                      </td>
                    </tr>



                  <?php }

                  ?>

                  <!-- <tr>
                    <th scope="row">1</th>
                    <td>Royal Gold</td>
                    <td>
                      <div class="btn btn-success rounded-pill">Complete</div>
                    </td>
                    <td>17/10/23</td>
                    <td> <a type="button" class="btn btn-primary">Update</a>
                    </td>
                  </tr> -->

                  <!-- 
                  <tr>
                    <th scope="row">2</th>
                    <td>Royal Gold</td>
                    <td> <button type="button" class="btn btn-warning rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#verticalycentered">
                        In Progress
                      </button></td>
                    <td>17/11/23</td>

                    <td> <a type="button" class="btn btn-primary">Update</a>
                    </td>
                  </tr> -->


                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
    <?php include 'modal.php' ?>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'footer.php' ?>

  <!-- <a href="#" class="back-to-top2 d-flex align-items-center justify-content-center" data-bs-toggle="modal"
    data-bs-target="#addcontact2"><i class="bi bi-plus"></i></a> -->
  <!-- Vendor JS Files -->
  <?php include 'footerscript.php' ?>
  <!-- <script>
    function openModalEditList(x, y, a, b) {
      console.log(x);
      var myModal = new bootstrap.Modal(document.getElementById('editcontactlist'), {

      })
      $('#editlistcreatedby').val(x);
      $('#editlistcreateddate').val(y);
      $('#list_name').val(a);
      $('#list_created_for').val(b);
      myModal.show();

    }

  </script> -->
  <script>

    document.querySelectorAll('a.toggle-vis').forEach((el) => {


      el.addEventListener('click', function (e) {
        e.preventDefault();

        let columnIdx = e.target.getAttribute('data-column');
        let column = $('#example4').DataTable().column(columnIdx);

        // Toggle the visibility
        column.visible(!column.visible());
        $("#example4").width("100%");

      });
    });
  </script>
</body>

</html>