<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<!-- Data Tables  -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.3.0/js/dataTables.dateTime.min.js"></script>


<!-- Data Tables  -->
<script>
    var minDate, maxDate;

    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var from = fromDate.val();
            var to = toDate.val();
            var date = new Date(data[4]);

            if (
                (from === null && to === null) ||
                (from === null && date <= to) ||
                (from <= date && to === null) ||
                (from <= date && date <= to)
            ) {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function() {
        // Create date inputs
        fromDate = new DateTime($('#search_fromdate'), {
            format: 'MMMM Do YYYY'
        });
        toDate = new DateTime($('#search_todate'), {
            format: 'MMMM Do YYYY'
        });

        // DataTables initialisation
        var table = $('#jquery-tab').DataTable();

        // Refilter the table
        $('#search_fromdate, #search_todate').on('change', function() {
            table.draw();
        });
    });
</script>

<script>
    jQuery(function($) {

        $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if (
                $(this)
                .parent()
                .hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .parent()
                    .removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .next(".sidebar-submenu")
                    .slideDown(200);
                $(this)
                    .parent()
                    .addClass("active");
            }
        });

        $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
        });




    });
</script>

<!-- <script>
    $(document).ready(function() {
        $('#jquery-tab').DataTable();
    });
</script>

<script>
    function hapus(id) {
        let konfirmasi = confirm("Apakah Anda yakin ingin menghapus user ini?");

        if (konfirmasi == true) {
            window.location.href = "hapus.php?id=" + id;
        }
    }
</script> -->