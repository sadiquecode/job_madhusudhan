

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

});




document.addEventListener('DOMContentLoaded', (event) => {
    let isAllSelected = false;

    document.getElementById('toggleSelectAll').addEventListener('click', function() {
        isAllSelected = !isAllSelected;
        document.querySelectorAll('.select-checkbox').forEach((checkbox) => {
            checkbox.checked = isAllSelected;
        });

        // Update button text based on selection status
        this.textContent = isAllSelected ? 'Unselect All' : 'Select All';
    });

    // Function to handle bulk messaging
    function startBulkMessaging() {
        var selectedIds = [];
        $('.select-checkbox:checked').each(function() {
            selectedIds.push($(this).data('id'));
        });

        if (selectedIds.length === 0) {
            alert('Please select at least one entry.');
            return;
        }

        $('#progressModal').modal('show');

        $.ajax({
            url: '{{ route('send.bulk.messages') }}',
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                ids: selectedIds
            },
            success: function(response) {
                console.log('Messages sent successfully');
                $('#progressModal').modal('hide');
                alert('Bulk messages sent successfully!');
                location.reload(); // Reload the page to reflect changes
            },
            error: function(xhr) {
                console.error('Error sending messages:', xhr.responseText);
                $('#progressModal').modal('hide');
                alert('Error sending bulk messages. Check console for details.');
            }
        });

        // Simulate progress bar update for demo purposes
        let progress = 0;
        let interval = setInterval(function() {
            progress += 10;
            $('#progressBar').css('width', progress + '%').attr('aria-valuenow', progress);
            $('#progressText').text(progress + '% Completed');
            if (progress >= 100) {
                clearInterval(interval);
            }
        }, 1000);
    }

    // Function to handle bulk deletion
    function startBulkDelete() {
        var selectedIds = [];
        $('.select-checkbox:checked').each(function() {
            selectedIds.push($(this).data('id'));
        });

        if (selectedIds.length === 0) {
            alert('Please select at least one entry.');
            return;
        }

        if (!confirm('Are you sure you want to delete the selected records?')) {
            return;
        }

        $.ajax({
            url: '{{ route('delete.bulk.records') }}',
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                ids: selectedIds
            },
            success: function(response) {
                console.log('Records deleted successfully');
                location.reload(); // Reload the page to reflect changes
            },
            error: function(xhr) {
                console.error('Error deleting records:', xhr.responseText);
                alert('Error deleting records. Check console for details.');
            }
        });
    }

    // Attach the function to the bulk message button
    document.querySelector('.btn.btn-primary.btn-rounded').addEventListener('click', startBulkMessaging);

    // Attach the function to the bulk delete button
    document.querySelector('.btn.btn-danger').addEventListener('click', startBulkDelete);
});
</script>

</body>

</html>