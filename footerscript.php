<script src="assets/vendor/datatables/datatables.js"></script>

<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<!-- <script src="vendor/datatables/datatables.min.js"></script> -->

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<script>
    if ($("#example").length) {

        $('#example').DataTable({
            "scrollY": "650px",
            "sScrollX": "100%",
            "scrollCollapse": true,
            select: true,
            keys: true,
            processing: true,
            serverMethod: 'post',
            ajax: {
                type: 'POST',
                url: 'functions.php',
                dataSrc: '',
                data: {'contact2' : 'contact2'},
            },
            columns: [
                { data: 'date_insert' },
                { data: 'company_name' },
                { data: 'company_email' },
                { data: 'company_phone_office' },
                { data: 'company_phone_mobile' },
                { data: 'city' },
                { data: 'state' },
                { data: 'country' },
                { data: 'industry' },

            ],

            dom: 'BQlfrtip',
            searchBuilder: {
                columns: [1, 2, 8]
            },
            buttons: [
                'copy', {
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        modifier: {
                            selected: null
                        }
                    }
                }, {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        modifier: {
                            selected: null
                        }
                    },
                    customize: function (doc) {
                        var colCount = new Array();
                        $(tbl).find('tbody tr:first-child td').each(function () {
                            if ($(this).attr('colspan')) {
                                for (var i = 1; i <= $(this).attr('colspan'); $i++) {
                                    colCount.push('*');
                                }
                            } else { colCount.push('*'); }
                        });
                        doc.content[1].table.widths = colCount;
                    }
                }, 'print',
                {
                    text: 'Export List',
                    action: function (e, dt, button, config) {
                        var data = dt.buttons.exportData();
                        // console.log(data.body);
                        // console.log("test");
                        // $.fn.dataTable.fileSave(
                        //     new Blob( [ JSON.stringify( data ) ] ),
                        //     'Export.json'
                        // );
                        table3.ajax.reload(null, false);
                        $.post('functions.php', {
                            data: data.body,
                            exportcontact2: "exportcontact2"
                        }, function (response) {
                            console.log(response);
                        });
                    }
                }
            ]
        });
    }
    if ($("#example2").length) {

        $('#example2').DataTable({
            "scrollY": "650px",
            "sScrollX": "100%",
            select: true,
            "scrollCollapse": true,
            dom: 'BQlfrtip',
            searchBuilder: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
            },
            "processing": true,
            buttons: [
                'copy', {
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        modifier: {
                            selected: null
                        }
                    }
                }, {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        modifier: {
                            selected: null
                        }
                    }
                }, 'print',

            ]
        });
        $("#example2").width("100%");
    }
    if ($("#example3").length) {

        var table3 = $('#example3').DataTable({
            "scrollY": "650px",
            "sScrollX": "100%",
            "scrollCollapse": true,
            processing: true,
            serverMethod: 'post',
            ajax: {
                type: 'POST',
                url: 'functions.php',
                dataSrc: '',
                data: {'contact2-list-post' : 'contact2-list-post'},
            },
            columns: [
                { data: 'date' },
                { data: 'name' },
                { data: 'created_by' },
                { data: 'created_for' },
                { data: 'action' },


            ],
        })
        $("#example3").width("100%");

    }


    if ($("#example4").length) {

        $('#example4').DataTable({
            "scrollY": "650px",
            "sScrollX": "100%",
            "scrollCollapse": true,
            select: true,
            dom: 'BQlfrtip',
            searchBuilder: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
            },
            "processing": true,
            buttons: [
                'copy', {
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        modifier: {
                            selected: null
                        }
                    }
                }, 'print',

            ]
        });
        $("#example4").width("100%");
    }
</script>