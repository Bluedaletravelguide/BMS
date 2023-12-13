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
              <h5 class="card-title">Contact To Do
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                  data-bs-target="#importcontact2">
                  Import Contact 2
                </button>-->
              </h5>
              <!-- <select>
                
              </select> -->

              <!-- <p>Add lightweight datatables to your project with using the <a
                  href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library.
                Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

              <!-- Table with stripped rows -->
              <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filter">
                Filter
              </button> -->
              <div>
                Toggle column:
                <a class="toggle-vis  btn btn-info mb-1 " data-column="0">List Name</a> -
                <a class="toggle-vis  btn btn-info mb-1 " data-column="1">Industry</a> -
                <a class="toggle-vis  btn btn-info mb-1 " data-column="2">Name</a> -
                <a class="toggle-vis  btn btn-info mb-1 " data-column="3">Email</a> -
                <a class="toggle-vis  btn btn-info mb-1 " data-column="4">Office Phone</a> -
                <a class="toggle-vis  btn btn-info mb-1 " data-column="5">Mobile Phone</a> -
                <a class="toggle-vis  btn btn-info mb-1 " data-column="6">City</a> -
                <a class="toggle-vis  btn btn-info mb-1 " data-column="7">State</a> -
                <a class="toggle-vis  btn btn-info mb-1 " data-column="8">Country</a>
                <!-- <a class="toggle-vis" data-column="9">Date</a> -->
              </div>
              <table class="table table-striped" id="example2">
                <thead>
                  <tr>
                    <th scope="col">List Name</th>
                    <th scope="col">Industry</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Office Phone</th>
                    <th scope="col">Mobile Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Country</th>
                    <!-- <th scope="col">Date</th> -->
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $emailuser = $_SESSION['email'];
                  $query = "SELECT * FROM contacts2todo  WHERE list_created_for='$emailuser' ";
                  $result = mysqli_query($db, $query);
                  while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td class="text-break">
                        <?php echo $row['list_name'] ?>
                      </td>
                      <td class="text-break">
                        <?php echo $row['industry'] ?>
                      </td>


                      <td class="text-break">
                        <?php echo $row['company_name'] ?>
                      </td>
                      <td class="text-break">
                        <?php echo $row['company_email'] ?>
                      </td>
                      <td class="text-break">
                        <?php echo $row['company_phone_office'] ?>
                      </td>
                      <td class="text-break">
                        <?php echo $row['company_phone_mobile'] ?>
                      </td>
                      <td class="text-break">
                        <?php echo $row['city'] ?>
                      </td>
                      <td class="text-break">
                        <?php echo $row['state'] ?>
                      </td>
                      <td class="text-break">
                        <?php echo $row['country'] ?>
                      </td>
                      <!-- <td scope="row">
                        <?php
                        $date = strtotime($row['date_insert']);
                        $formatteddate = date('d-m-Y', $date);
                        echo $formatteddate;

                        ?>
                      </td> -->
                      <form method="post" action="">

                        <td scope="row">
                          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                          <input type="hidden" name="email" value="<?php echo  $_SESSION['email'] ?>">

                          <?php
                          $datecheck = date('m-Y');

                          $crmcheck = 0;
                          $phonecheck = 0;
                          $emailcheck = 0;


                          $idforthis = $row['id'];
                          $query2 = "SELECT * FROM contacts2todo_dates  WHERE contacts2todo_id='$idforthis' ";

                          $result2 = mysqli_query($db, $query2);
                          if (mysqli_num_rows($result2) >= 1) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                              if ($row2['type'] == "crm") {
                                $crmcheck = 1;
                              }
                              if ($row2['type'] == "phone") {
                                $phonecheck = 1;
                              }
                              if ($row2['type'] == "email") {
                                $emailcheck = 1;
                              }
                            }
                          }

                          if ($crmcheck == 1) { ?>
                            <button type="submit" class="btn btn-primary m-1" name="contacttodo_crm">CRM</button>

                          <?php } else { ?>
                            <button type="submit" class="btn btn-danger m-1" name="contacttodo_crm">CRM</button>

                          <?php }
                          if ($phonecheck == 1) { ?>
                            <button type="submit" class="btn btn-primary m-1" name="contacttodo_phone">Phone</button>

                          <?php } else { ?>
                            <button type="submit" class="btn btn-danger m-1" name="contacttodo_phone">Phone</button>

                          <?php }
                          if ($emailcheck == 1) { ?>
                            <button type="submit" class="btn btn-primary m-1" name="contacttodo_email">Email</button>

                          <?php } else { ?>
                            <button type="submit" class="btn btn-danger m-1" name="contacttodo_email">Email</button>

                          <?php }
                          ?>


                        </td>
                      </form>

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

  <script>

    document.querySelectorAll('a.toggle-vis').forEach((el) => {


      el.addEventListener('click', function (e) {
        e.preventDefault();

        let columnIdx = e.target.getAttribute('data-column');
        let column = $('#example2').DataTable().column(columnIdx);

        // Toggle the visibility
        column.visible(!column.visible());
        $("#example2").width("100%");

      });
    });
  </script>
</body>

</html>