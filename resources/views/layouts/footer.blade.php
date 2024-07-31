

<div class="sidebar-overlay" data-reff=""></div>  
    <script type="text/javascript" src="{{url('public/assets/js/jquery-3.5.1.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/js/popper.min.js')}}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript" src="{{url('public/assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/js/jquery.slimscroll.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/js/select2.min.js')}}"></script>

{{-- datatables --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.4/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>


    <script type="text/javascript" src="{{url('public/assets/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/plugins/morris/morris.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/plugins/raphael/raphael.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/plugins/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/plugins/light-gallery/js/lightgallery-all.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/js/app.js')}}"></script>

    {{-- daterange --}}
    <script type="text/javascript" src="{{url('public/assets/daterange/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/daterange/daterangepicker.min.js')}}"></script>


<script>
$(document).ready(function() {
    var dataTable = $('#teachme_table').DataTable();

    if (dataTable && $.fn.DataTable.isDataTable('#teachme_table')) {
        dataTable.destroy();
    }

    // Re-initialize DataTable
    $('#teachme_table').DataTable({
        "paging": true, // Enable pagination
        "searching": true, // Enable search bar
        "pageLength": 10,
        // "dom": '<"top-left"f><"top-right"B>rt<"bottom-left"l><"bottom-right"ip>',
        // "buttons": [ // Add export buttons
        //     'copy', // Copy to clipboard
        //     'csv', // Export to CSV
        //     'excel', // Export to Excel
        //     'pdf', // Export to PDF
        //     'print' // Print button
        // ]
    });



   $('#data_types_id').on('change', function() {
        var datatypeId = $(this).val();
        var base_url = "{{ url('/') }}";
        if (datatypeId) {
            $.ajax({
                url: base_url+'/get-specialities/' + datatypeId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#speciality_id').empty();
                    $('#speciality_id').append('<option value="" disabled selected>Select Speciality</option>');
                    $.each(data, function(key, value) {
                        $('#speciality_id').append('<option value="' + value.id + '">' + value.title + '</option>');
                    });
                }
            });
        } else {
            $('#speciality_id').empty();
            $('#speciality_id').append('<option value="" disabled selected>Select Speciality</option>');
        }
    });

});




</script>






</body>

</html>