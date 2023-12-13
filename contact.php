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
      <h1>Contact</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Contact</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Contact</h5>
              <p>Add lightweight datatables to your project with using the <a
                  href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library.
                Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

              <!-- Table with stripped rows -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filter">
                Filter
              </button>
              <table class="table table-striped datatable ">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">CS</th>
                    <th scope="col">Company</th>
                    <th scope="col">Status</th>
                    <th scope="col">Type</th>
                    <th scope="col">Industry</th>
                    <th scope="col">Product</th>
                    <th scope="col">Remark</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $query = "SELECT * FROM contacts  ";
                  $result = mysqli_query($db, $query);
                  while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <th scope="row">
                        <?php
                        $date = strtotime($row['update_at']);
                        $formatteddate = date('d-m-Y', $date);
                        echo $formatteddate;

                        ?>
                      </th>
                      <td>
                        <?php echo $row['cs'] ?>
                      </td>
                      <td>
                        <?php echo $row['name'] ?>
                      </td>
                      <td>
                        <?php echo $row['status'] ?>
                      </td>
                      <td>
                        <?php echo $row['type'] ?>
                      </td>
                      <td>
                        <?php echo $row['industry'] ?>
                      </td>
                      <td>

                        <?php
                        $name = $row['name'];
                        $query2 = "SELECT * FROM products  WHERE name='$name' ";
                        $result2 = mysqli_query($db, $query2);
                        if (mysqli_num_rows($result2) < 1) {

                          echo '<p class="btn btn-warning">No Products</p>';

                        } else {
                          while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                            <p class="btn btn-info">
                              <?php echo $row2['product'] ?>
                            </p>

                            <?php
                          }
                        }



                        ?>
                      </td>
                      <td>
                        <?php echo $row['remark'] ?>
                      </td>
                      <td>
                        Edit
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


  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>