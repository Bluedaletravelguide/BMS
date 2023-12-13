<?php include('functions.php');

$joborderid = $_GET['joborder'];
$query = "SELECT * FROM job_order WHERE id='$joborderid'";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)) {

  $datecreated = $row["datetime_created"];
  $dateupdated = $row["datetime_updated"];
  $sc = $row["sc"];
  $remark = $row["remark"];
  $note = $row["note"];
  $approval = $row["approval"];
  $company_name = $row["company_name"];


  debug_to_console($datecreated);
  debug_to_console($dateupdated);
  debug_to_console($sc);
  debug_to_console($remark);
  debug_to_console($note);
  debug_to_console($approval);
  debug_to_console($company_name);

}

$joborderid = $_GET['joborder'];
$query = "SELECT * FROM contacts WHERE name='$company_name'";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)) {

  $industry = $row["industry"];
  // $industry = $row["industry"];



  debug_to_console($industry);


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
      <h1>Job Order</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item ">Job Order</li>
          <li class="breadcrumb-item ">Billboard & Tempboard</li>
          <li class="breadcrumb-item active">Details </li>
        </ol>
      </nav>


    </div><!-- End Page Title -->

    <section class="section">

      <div class="row mb-4">
        <div class="col-4">
          <div class="card  h-100 ">

            <div class="card-body profile-card pt-4 d-flex flex-row align-self-center ">
              <div class="d-flex flex-column align-items-center align-self-center">
                <?php 
                if ($company_name){?>
                <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">

                <?php
                }
                ?>
                <h2><b>
                    <?php echo $company_name ?>
                  </b>
                </h2>
                <h3>
                  <?php echo ucfirst($industry) ?>
                </h3>


              </div>

            </div>
          </div>

        </div>
        <div class="col-8">
          <div class="card h-100">

            <div class="card-body  pt-4 d-flex flex-column ">
              <h5 class="card-title">Details</h5>

              <h2><b>Job Order Number :</b> 
                <?php echo "TB-" . date("my", strtotime($datecreated)) . "-" . $joborderid + 35 ?>
              </h2>
              <h2><b>Date Created :</b>
                <?php echo $datecreated ?>
              </h2>
              <h2><b>Date Updated :</b>
                <?php if ($dateupdated == "") {
                  echo "None";
                } else {
                  echo $dateupdated;

                }
                ?>
              </h2>
              <h2><b>SC :</b>
                <?php echo $sc ?>
              </h2>



            </div>
          </div>

        </div>

      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Sites</h5>

          <!-- <p>Add lightweight datatables to your project with using the <a
                href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library.
              Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

          <!-- Table with stripped rows -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newjoborder_bbtb">
            <i class="bi bi-plus"></i> Add New
          </button>

          <table class="table datatable" id="table1">
            <thead>
              <tr>
                <th scope="col">Site Location</th>
                <th scope="col">Size</th>
                <th scope="col">Duration</th>
                <!-- <th scope="col">BGOC</th> -->
                <th scope="col">In Charge Date</th>
                <!-- <th scope="col"></th> -->
                <!-- <th scope="col">Duration</th>
                  <th scope="col">Remark</th> -->
                <!-- <th scope="col">Status</th>
                    <th scope="col">Action</th> -->
              </tr>
            </thead>
            <tbody>

              <?php
              $query = "SELECT * FROM job_order_bbtb WHERE job_order_id='$joborderid' ";
              $result = mysqli_query($db, $query);
              while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>


                  <td>
                    <?php echo $row['site_location'] ?>
                  </td>
                  <td>
                    <?php echo $row['size'] ?>
                  </td>
                  <td>

                    <?php

                    $start = $row['date_start'];
                    $end = $row['date_end'];
                    $origin = new Datetime($start);
                    $target = new Datetime($end);
                    $target2 = date_modify($target, '+1 day');
                    $interval = $origin->diff($target2);
                    // date_modify($interval , '+1 day');
                    echo $interval->format('%y years, %m month, %d days');


                    ?>

                  </td>
                  <td class="text-center">
                    <?php echo date("d-m-Y", strtotime($row['date_start'])) ?><br>
                    <b >to</b><br>
                    <?php echo date("d-m-Y", strtotime($row['date_end'])) ?>
                  </td>

                  </td>
                </tr>
                <?php
              }
              ?>

            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

      </div>


      <div class="row">

        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Special Note</h5>
              <div class="row">

                <div class="card-body  pt-4 d-flex flex-column ">

                  <p>
                    <?php echo $note ?>
                  </p>

                </div>

              </div>

            </div>
          </div>

        </div>

        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Remark</h5>
              <div class="row">

                <div class="card-body  pt-4 d-flex flex-column ">

                  <p>
                    <?php echo $remark ?>
                  </p>


                </div>

              </div>

            </div>
          </div>

        </div>
      </div>
    </section>
    <?php include 'modal.php' ?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'footer.php' ?>
  <a href="#" class="back-to-top2 d-flex align-items-center justify-content-center" data-bs-toggle="modal"
    data-bs-target="#confirmjoborderbbtb"><i class="bi bi-plus"></i></a>


  <!-- Vendor JS Files -->
  <?php include 'footerscript.php'  ?>



</body>

</html>