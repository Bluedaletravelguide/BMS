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
              <h5 class="card-title">Contact List
                <a href="contact2-list.php?query=All&year=<?php echo date('Y')?>" class="btn btn-primary">See All</a>
              </h5>
              <p>Assign The List To Someone</p>

              <!-- Table with stripped rows -->
              <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filter">
                Filter
              </button> -->

              <table class="table table-striped " id="example3">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Assigned To</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>

              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Contact <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                  data-bs-target="#importcontact2">
                  Import Contact 2
                </button></h5>
              <p>Add lightweight datatables to your project with using the <a
                  href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library.
                Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

              <!-- Table with stripped rows -->
              <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filter">
                Filter
              </button> -->

              <table class="table table-striped" id="example">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Office Phone</th>
                    <th scope="col">Mobile Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Country</th>
                    <th scope="col">Industry</th>
                  </tr>
                </thead>
                <!-- <tbody> -->
             

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


                <!-- </tbody> -->
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
  <script>
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

  </script>

</body>

</html>