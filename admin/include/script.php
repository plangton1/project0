    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="./c/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="./c/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./c/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="./c/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="./c/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="./c/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="./c/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="./c/dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="./c/assets/libs/flot/excanvas.js"></script>
    <script src="./c/assets/libs/flot/jquery.flot.js"></script>
    <script src="./c/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="./c/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="./c/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="./c/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="./c/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="./c/dist/js/pages/chart/chart-page-init.js"></script>

    <!-- datatable -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </script>

    <!-- cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <!-- datatable -->
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableall').DataTable({
        language: {

            "decimal": "",
            "emptyTable": "ไม่พบข้อมูล",
            "info": "แสดง _START_ to _END_ of _TOTAL_ รายการ",
            "infoEmpty": "แสดง 0 ถึง 0 จากทั้งหมด 0 รายการ",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "แสดง _MENU_ รายการ",
            "loadingRecords": "Loading...",
            "processing": "Processing...",
            "search": "ค้นหา:",
            "zeroRecords": "ไม่พบข้อมูลที่ค้นหา",
            "paginate": {
                "first": "First",
                "last": "Last",
                "next": "Next",
                "previous": "Previous"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    }
        );
        });
    </script>