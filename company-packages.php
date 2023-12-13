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
      <h1>Packages - Royal Gold</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Company</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Publication</h5>
              <p>Add lightweight datatables to your project with using the <a
                  href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library.
                Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">User</th>
                    <th scope="col">Status</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>KLTG 45</td>
                    <td>Ain</td>
                    <td>
                      <div class="btn btn-success rounded-pill">Complete</div>
                    </td>
                    <td>17/10/23</td>
                    <td> <a type="button" class="btn btn-primary">Update</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>KLTG 46</td>
                    <td>Ain</td>
                    <td>
                    <button type="button" class="btn btn-warning rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#verticalycentered">
                        In Progress
                      </button>
                    </td>
                    <td>17/11/23</td>

                    <td> <a type="button" class="btn btn-primary">Update</a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Article</h5>
              <p>Add lightweight datatables to your project with using the <a
                  href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library.
                Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">User</th>
                    <th scope="col">Status</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Top 10</td>
                    <td>AA</td>
                    <td>
                      <div class="btn btn-success rounded-pill">Complete</div>
                    </td>
                    <td>17/10/23</td>
                    <td> <a type="button" class="btn btn-primary">Update</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>The best</td>
                    <td>AA</td>
                    <td>
                      <button type="button" class="btn btn-warning rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#verticalycentered">
                        In Progress
                      </button>
                    </td>
                    <td>17/11/23</td>

                    <td> <a type="button" class="btn btn-primary">Update</a>
                    </td>
                  </tr>
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


  <?php include 'footerscript.php'  ?>



</body>

</html>