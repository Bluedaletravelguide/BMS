<?php include('functions.php'); ?>
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
          <li class="breadcrumb-item active">Job Order</li>
        </ol>
      </nav>


    </div><!-- End Page Title -->

    <section class="section">

      <div class="row">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Job Order Billboard / Tempboard</h5>
            <!-- <p>Add lightweight datatables to your project with using the <a
                href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library.
              Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

            <!-- Table with stripped rows -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filter">
              Filter
            </button>

            <table class="table datatable" id="table1">
              <thead>
                <tr>
                  <th scope="col">Job Order Date</th>
                  <th scope="col">SC</th>
                  <th scope="col">Company</th>
                  <!-- <th scope="col">BGOC</th> -->
                  <th scope="col">Status</th>
                  <!-- <th scope="col"></th> -->
                  <!-- <th scope="col">Duration</th>
                  <th scope="col">Remark</th> -->
                  <!-- <th scope="col">Status</th>
                    <th scope="col">Action</th> -->
                </tr>
              </thead>
              <tbody>

                <?php
                $rownumber = 1;
                $query = "SELECT * FROM job_order WHERE type='billboard'";
                $result = mysqli_query($db, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>
                    <!-- <td>
                      <?php echo $rownumber ?>
                    </td> -->
                    <td>
                      <?php echo date('d-m-Y', strtotime($row['datetime_created'])) ?>
                    </td>
                    <td>
                      <?php echo $row['sc'] ?>
                    </td>
                    <td>
                      <?php echo $row['company_name'] ?>
                    </td>
                    <td>
                      <?php
                      if (is_null($row['approval'])) {
                        ?>
                        <a class="btn btn-warning rounded-pill" href="joborder-bbtb.php?joborder=<?php echo $row['id']?>">In Progress</a>

                        <?php
                      } else { ?>
                        <div class="btn btn-success rounded-pill">Approved</div>

                        <?php

                      }
                      $rownumber++;
                      ?>

                    </td>
                    <!-- <td> <button type="button" class="btn btn-warning rounded-pill" data-bs-toggle="modal"
        data-bs-target="#verticalycentered">
        In Progress
      </button></td>

    <td> <a type="button" class="btn btn-primary">Update</a> -->
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
    </section>
    <?php include 'modal.php' ?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'footer.php' ?>
  <a href="#" class="back-to-top2 d-flex align-items-center justify-content-center" data-bs-toggle="modal"
    data-bs-target="#newjoborder"><i class="bi bi-plus"></i></a>


  <!-- Vendor JS Files -->
  <?php include 'footerscript.php'  ?>



</body>

</html>