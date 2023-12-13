<div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remark</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <b>Artwork In Progress</b>
                <br />
                Client x function
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->


<div class="modal fade" id="filter" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title">Filter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Product</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Product</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->


<div class="modal fade" id="importcontact2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title">Import Contact 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="excel">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="importcontact2">Import</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->

<div class="modal fade" id="newsalesconfirm" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title">Sales Confirm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <!-- General Form Elements -->
                    <input type="hidden" name="sc" value="<?php echo $_SESSION['email'] ?>">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Company</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="company_name"
                                required>
                                <option selected="true" disabled="disabled">Open this select menu</option>
                                <!-- <option value="1">Royal Gold</option> -->
                                <?php

                                $query = "SELECT * FROM contacts ";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $row['name']; ?>">
                                        <?php echo $row['name']; ?>
                                    </option>

                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Product</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="product_name"
                                required>
                                <option selected="true" disabled="disabled">Open this select menu</option>

                                <?php

                                $query = "SELECT * FROM product_categories ";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $row['name']; ?>">
                                        <?php echo $row['name']; ?>
                                    </option>

                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Number</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">RM</span>
                                <input type="text" class="form-control" name="amount" required>
                            </div>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">BGOC</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="bgoc" required>
                                <option selected="true" disabled="disabled">Open this select menu</option>
                                <?php

                                $query = "SELECT * FROM bluedale_internal ";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $row['name']; ?>">
                                        <?php echo $row['name']; ?>
                                    </option>

                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radiocheck" id="duration" value="1"
                                    onclick="ShowHideDiv()" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Duration
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radiocheck" id="dates" value="2"
                                    onclick="ShowHideDiv()">
                                <label class="form-check-label" for="gridRadios2">
                                    Between Dates
                                </label>
                            </div>

                        </div>
                    </fieldset>
                    <div id="formdates" style="display:none">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date Start</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_start">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date End</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_end">
                            </div>
                        </div>
                    </div>
                    <div id="formduration">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Duration</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="durationmonth" id="inputformmonth"
                                        onchange="changemonthtext()">
                                    <span class="input-group-text" id="formmonth">Month</span>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Remark</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="height: 100px" name="remark"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="filenamesale" class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="filenamesale" name="filenamesale">
                        </div>
                    </div>





                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="newsalesconfirm">Submit Form</button>

                </div>
            </form><!-- End General Form Elements -->

        </div>
    </div>
    <script type="text/javascript">
        function ShowHideDiv() {
            var radio1 = document.getElementById("duration");
            var radio2 = document.getElementById("dates");
            var divdates = document.getElementById("formdates");
            var divduration = document.getElementById("formduration");
            console.log(radio1.checked);
            console.log(radio2.checked);
            if (radio1.checked) {
                divdates.style.display = "none";
                divduration.style.display = "block";

            }
            if (radio2.checked) {
                divdates.style.display = "block";
                divduration.style.display = "none";

            }

        }
        function changemonthtext() {
            var texttochange = document.getElementById("formmonth");
            var inputvalue = document.getElementById("inputformmonth");

            if (inputvalue.value > 1) {
                texttochange.innerHTML = "Months"
            }
            else {
                texttochange.innerHTML = "Month"

            }
            console.log(inputvalue.value)
        }
    </script>
</div><!-- End Vertically centered Modal-->



<div class="modal fade" id="newjoborder" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title">New Job Order</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">


                    <!-- General Form Elements -->
                    <div class="tab-pane fade show active " id="joborder_bbtb">

                        <input type="hidden" name="sc" value="<?php echo $_SESSION['email'] ?>">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Company</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="company_name"
                                    onchange="checkcompanyconfirmproduct(this.value)" required>
                                    <option selected="true" disabled="disabled">Open this select menu</option>
                                    <!-- <option value="1">Royal Gold</option> -->
                                    <?php

                                    $query = "SELECT * FROM products GROUP BY name";
                                    $result = mysqli_query($db, $query);
                                    while($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['name']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>

                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Product</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="product_name"
                                    id="selectproductcheck" required>
                                    <option selected="true" disabled="disabled">Open this select menu</option>



                                </select>
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Number</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">RM</span>
                                <input type="text" class="form-control" name="amount" required>
                            </div>

                        </div>
                    </div> -->

                        <!-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">BGOC</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="bgoc" required>
                                <option selected="true" disabled="disabled">Open this select menu</option>
                                <?php

                                $query = "SELECT * FROM bluedale_internal ";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $row['name']; ?>">
                                        <?php echo $row['name']; ?>
                                    </option>

                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div> -->
                        <!-- <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radiocheck" id="duration" value="1"
                                    onclick="ShowHideDiv()" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Duration
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radiocheck" id="dates" value="2"
                                    onclick="ShowHideDiv()">
                                <label class="form-check-label" for="gridRadios2">
                                    Between Dates
                                </label>
                            </div>

                        </div>
                    </fieldset> -->
                        <!-- <div id="formdates" style="display:none">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date Start</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_start">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date End</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_end">
                            </div>
                        </div>
                    </div> -->
                        <!-- <div id="formduration">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Duration</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="durationmonth" id="inputformmonth"
                                        onchange="changemonthtext()">
                                    <span class="input-group-text" id="formmonth">Month</span>
                                </div>

                            </div>
                        </div>

                    </div> -->
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height: 100px" name="note"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Remark</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height: 100px" name="remark"></textarea>
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                        <label for="filenamesale" class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="filenamesale" name="filenamesale">
                        </div>
                    </div> -->




                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="newjoborder">Submit Form</button>

                </div>
            </form><!-- End General Form Elements -->

        </div>
    </div>
    <script type="text/javascript">
        // function ShowHideDiv() {
        //     var radio1 = document.getElementById("duration");
        //     var radio2 = document.getElementById("dates");
        //     var divdates = document.getElementById("formdates");
        //     var divduration = document.getElementById("formduration");
        //     console.log(radio1.checked);
        //     console.log(radio2.checked);
        //     if (radio1.checked) {
        //         divdates.style.display = "none";
        //         divduration.style.display = "block";

        //     }
        //     if (radio2.checked) {
        //         divdates.style.display = "block";
        //         divduration.style.display = "none";

        //     }

        // }
        // function changemonthtext() {
        //     var texttochange = document.getElementById("formmonth");
        //     var inputvalue = document.getElementById("inputformmonth");

        //     if (inputvalue.value > 1) {
        //         texttochange.innerHTML = "Months"
        //     }
        //     else {
        //         texttochange.innerHTML = "Month"

        //     }
        //     console.log(inputvalue.value)
        // }
        // console.log("start check");

        function checkcompanyconfirmproduct(value) {
            // console.log("start check");
            // console.log(value);
            var selectoption = document.getElementById("selectproductcheck");
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("POST", "functions.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("checkproduct=" + value);
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    if (this.responseText) {
                        selectoption.innerHTML = '<option selected="true" disabled="disabled">Open this select menu</option>';
                        selectoption.innerHTML += this.responseText;
                    }
                    else {

                    }

                }
            };
        }

    </script>
</div><!-- End Vertically centered Modal-->

<div class="modal fade" id="newjoborder_bbtb" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title">New Site</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">


                    <!-- General Form Elements -->
                    <div class="tab-pane fade show active " id="joborder_bbtb">

                        <input type="hidden" name="sc" value="<?php echo $_SESSION['email'] ?>">
                        <input type="hidden" name="company_name" value="<?php echo $company_name ?>">
                        <input type="hidden" name="job_order_id" value="<?php echo $joborderid ?>">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Location</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="location">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Size</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="size"
                                    id="selectproductcheck">
                                    <option selected="true" disabled="disabled">Open this select menu</option>
                                    <option value="15x10">15x10</option>
                                    <option value="10x5">10x5</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date Start</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_start">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date End</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_end">
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Number</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">RM</span>
                                <input type="text" class="form-control" name="amount" required>
                            </div>

                        </div>
                    </div> -->

                        <!-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">BGOC</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="bgoc" required>
                                <option selected="true" disabled="disabled">Open this select menu</option>
                                <?php

                                $query = "SELECT * FROM bluedale_internal ";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $row['name']; ?>">
                                        <?php echo $row['name']; ?>
                                    </option>

                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div> -->
                        <!-- <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radiocheck" id="duration" value="1"
                                    onclick="ShowHideDiv()" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Duration
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radiocheck" id="dates" value="2"
                                    onclick="ShowHideDiv()">
                                <label class="form-check-label" for="gridRadios2">
                                    Between Dates
                                </label>
                            </div>

                        </div>
                    </fieldset> -->
                        <!-- <div id="formdates" style="display:none">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date Start</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_start">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date End</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_end">
                            </div>
                        </div>
                    </div> -->
                        <!-- <div id="formduration">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Duration</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="durationmonth" id="inputformmonth"
                                        onchange="changemonthtext()">
                                    <span class="input-group-text" id="formmonth">Month</span>
                                </div>

                            </div>
                        </div>

                    </div> -->
                        <!-- <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height: 100px" name="note"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Remark</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height: 100px" name="remark"></textarea>
                            </div>
                        </div> -->
                        <!-- <div class="row mb-3">
                        <label for="filenamesale" class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="filenamesale" name="filenamesale">
                        </div>
                    </div> -->




                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="newsite_joborder_bbtb">Insert</button>

                </div>
            </form><!-- End General Form Elements -->

        </div>
    </div>
    <script type="text/javascript">
        // function ShowHideDiv() {
        //     var radio1 = document.getElementById("duration");
        //     var radio2 = document.getElementById("dates");
        //     var divdates = document.getElementById("formdates");
        //     var divduration = document.getElementById("formduration");
        //     console.log(radio1.checked);
        //     console.log(radio2.checked);
        //     if (radio1.checked) {
        //         divdates.style.display = "none";
        //         divduration.style.display = "block";

        //     }
        //     if (radio2.checked) {
        //         divdates.style.display = "block";
        //         divduration.style.display = "none";

        //     }

        // }
        // function changemonthtext() {
        //     var texttochange = document.getElementById("formmonth");
        //     var inputvalue = document.getElementById("inputformmonth");

        //     if (inputvalue.value > 1) {
        //         texttochange.innerHTML = "Months"
        //     }
        //     else {
        //         texttochange.innerHTML = "Month"

        //     }
        //     console.log(inputvalue.value)
        // }
        // console.log("start check");

        function checkcompanyconfirmproduct(value) {
            // console.log("start check");
            // console.log(value);
            var selectoption = document.getElementById("selectproductcheck");
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("POST", "functions.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("checkproduct=" + value);
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    if (this.responseText) {
                        selectoption.innerHTML = '<option selected="true" disabled="disabled">Open this select menu</option>';
                        selectoption.innerHTML += this.responseText;
                    }
                    else {

                    }

                }
            };
        }

    </script>
</div><!-- End Vertically centered Modal-->


<div class="modal fade" id="confirmjoborderbbtb" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title">Confirm Job Order</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">


                    <!-- General Form Elements -->
                    <div class="tab-pane fade show active " id="joborder_bbtb">

                        <input type="hidden" name="sc" value="<?php echo $_SESSION['email'] ?>">
                        <input type="hidden" name="company_name" value="<?php echo $company_name ?>">
                        <input type="hidden" name="job_order_id" value="<?php echo $joborderid ?>">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Artwork</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="incharge">
                                    <option selected="true" value="All">All GD</option>
                                    <?php

                                    $query = "SELECT * FROM users WHERE title='it' ";
                                    $result = mysqli_query($db, $query);
                                    while($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>">
                                            <?php echo $row['title']; ?>
                                        </option>

                                        <?php
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>


                        <!-- <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Number</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">RM</span>
                                <input type="text" class="form-control" name="amount" required>
                            </div>

                        </div>
                    </div> -->

                        <!-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">BGOC</label>
                        <div class="col-sm-10">

                        </div>
                    </div> -->
                        <!-- <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radiocheck" id="duration" value="1"
                                    onclick="ShowHideDiv()" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Duration
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radiocheck" id="dates" value="2"
                                    onclick="ShowHideDiv()">
                                <label class="form-check-label" for="gridRadios2">
                                    Between Dates
                                </label>
                            </div>

                        </div>
                    </fieldset> -->
                        <!-- <div id="formdates" style="display:none">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date Start</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_start">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date End</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_end">
                            </div>
                        </div>
                    </div> -->
                        <!-- <div id="formduration">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Duration</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="durationmonth" id="inputformmonth"
                                        onchange="changemonthtext()">
                                    <span class="input-group-text" id="formmonth">Month</span>
                                </div>

                            </div>
                        </div>

                    </div> -->
                        <!-- <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height: 100px" name="note"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Remark</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height: 100px" name="remark"></textarea>
                            </div>
                        </div> -->
                        <!-- <div class="row mb-3">
                        <label for="filenamesale" class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="filenamesale" name="filenamesale">
                        </div>
                    </div> -->




                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="approve_joborder">Confirm</button>

                </div>
            </form><!-- End General Form Elements -->

        </div>
    </div>

</div><!-- End Vertically centered Modal-->



<div class="modal fade" id="addcontact2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <form action="" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title">New Contact 2</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">


                    <!-- General Form Elements -->
                    <div class="tab-pane fade show active " id="addcontact2">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Company Name</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="company_name"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Company Email</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="company_email"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Office Phone</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="company_phone_office"
                                    placeholder="+60382332323"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Mobile Phone</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="company_phone_mobile"
                                    placeholder="+60164342322"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="city" placeholder="Rawang"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">State</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="state"
                                    placeholder="Selangor"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label ">Country</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="country"
                                    placeholder="Malaysia"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Industry</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="industry" placeholder="F&B"></textarea>
                            </div>
                        </div>
                        <!-- <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radiocheck" id="duration" value="1"
                                    onclick="ShowHideDiv()" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Duration
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radiocheck" id="dates" value="2"
                                    onclick="ShowHideDiv()">
                                <label class="form-check-label" for="gridRadios2">
                                    Between Dates
                                </label>
                            </div>

                        </div>
                    </fieldset> -->
                        <!-- <div id="formdates" style="display:none">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date Start</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_start">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date End</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_end">
                            </div>
                        </div>
                    </div> -->
                        <!-- <div id="formduration">
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Duration</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="durationmonth" id="inputformmonth"
                                        onchange="changemonthtext()">
                                    <span class="input-group-text" id="formmonth">Month</span>
                                </div>

                            </div>
                        </div>

                    </div> -->
                        <!-- <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height: 100px" name="note"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Remark</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height: 100px" name="remark"></textarea>
                            </div>
                        </div> -->
                        <!-- <div class="row mb-3">
                        <label for="filenamesale" class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="filenamesale" name="filenamesale">
                        </div>
                    </div> -->




                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="newcontact2">Insert</button>

                </div>
            </form><!-- End General Form Elements -->

        </div>
    </div>
    <script type="text/javascript">
        // function ShowHideDiv() {
        //     var radio1 = document.getElementById("duration");
        //     var radio2 = document.getElementById("dates");
        //     var divdates = document.getElementById("formdates");
        //     var divduration = document.getElementById("formduration");
        //     console.log(radio1.checked);
        //     console.log(radio2.checked);
        //     if (radio1.checked) {
        //         divdates.style.display = "none";
        //         divduration.style.display = "block";

        //     }
        //     if (radio2.checked) {
        //         divdates.style.display = "block";
        //         divduration.style.display = "none";

        //     }

        // }
        // function changemonthtext() {
        //     var texttochange = document.getElementById("formmonth");
        //     var inputvalue = document.getElementById("inputformmonth");

        //     if (inputvalue.value > 1) {
        //         texttochange.innerHTML = "Months"
        //     }
        //     else {
        //         texttochange.innerHTML = "Month"

        //     }
        //     console.log(inputvalue.value)
        // }
        // console.log("start check");

        function checkcompanyconfirmproduct(value) {
            // console.log("start check");
            // console.log(value);
            var selectoption = document.getElementById("selectproductcheck");
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("POST", "functions.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("checkproduct=" + value);
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    if (this.responseText) {
                        selectoption.innerHTML = '<option selected="true" disabled="disabled">Open this select menu</option>';
                        selectoption.innerHTML += this.responseText;
                    }
                    else {

                    }

                }
            };
        }

    </script>
</div><!-- End Vertically centered Modal-->





<div class="modal fade" id="editcontactlist" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <form action="" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Contact List</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">


                    <!-- General Form Elements -->
                    <div class="tab-pane fade show active " id="addcontact2">
                    <input type="hidden" class="form-control" name="list_created_by"  id="editlistcreatedby" value=""/>
                    <input type="hidden" class="form-control" name="list_created_date" id="editlistcreateddate" value=""/>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">List Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="list_name" id="list_name"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-2 col-form-label">Assigned To</label>
                            <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="list_created_for" id="list_created_for"
                                required>
                                <option selected="true" disabled="disabled">Open this select menu</option>
                                <!-- <option value="1">Royal Gold</option> -->
                                <?php

                                $query = "SELECT * FROM users ";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $row['email']; ?>">
                                        <?php echo $row['email']; ?>
                                    </option>

                                    <?php
                                }
                                ?>
                            </select>
                            </div>
                        </div>




                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="editcontactlist2">Insert</button>

                </div>
            </form><!-- End General Form Elements -->

        </div>
    </div>

</div><!-- End Vertically centered Modal-->