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
      <h1>Sales</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Sales & Servicing</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Master Proposal Confirmation</h5>
            <!-- <p>Add lightweight datatables to your project with using the <a
                href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library.
              Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

            <!-- Table with stripped rows -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filter">
              Filter
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newsalesconfirm">
              + New
            </button>
            <table class="table datatable" id="table1">
              <thead>
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Company</th>
                  <th scope="col">Product</th>
                  <th scope="col">Amount</th>
                  <th scope="col">BGOC</th>
                  <th scope="col">CS</th>
                  <th scope="col">Duration</th>
                  <th scope="col">Remark</th>
                  <!-- <th scope="col">Status</th>
                    <th scope="col">Action</th> -->
                </tr>
              </thead>
              <tbody>

                <?php

                $query = "SELECT * FROM products ";
                $result = mysqli_query($db, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $row['date_confirm'] ?>
                    </td>
                    <td>
                      <?php echo $row['name'] ?>
                    </td>

                    <td>
                      <?php echo $row['product'] ?>
                    </td>
                    <td>RM
                      <?php echo $row['amount'] ?>
                    </td>
                    <td>
                      <?php echo $row['bgoc'] ?>
                    </td>
                    <td>
                      <?php echo $row['sc'] ?>
                    </td>
                    <td>
                      <?php if (empty($row['duration'])) { ?>
                        <b>Start : </b>

                        <?php
                  
                        $date_start= (strtotime($row['date_start']));
                        echo  date('d-m-Y', $date_start)?>
                        <br/>
                        <b>End : </b>
                        <?php
                  
                  $date_end= (strtotime($row['date_end']));
                  echo  date('d-m-Y', $date_end)?>


                      <?php } else {

                        echo $row['duration'];
                        if ($row['duration'] > 1){
                          echo " months"; 
                        }else{
                          echo " month"; 

                        }
                      } ?>

                    </td>



                    <td>
                      <?php echo $row['remarks'] ?>
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

  <?php include 'footerscript.php'  ?>


</body>

</html>