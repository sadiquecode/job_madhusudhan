<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filter form</title>
    <!-- Custom CSS  -->
    <link href="{{ url('public/theme_assets/css/style.css')}}" rel="stylesheet">
    <!-- Bootstrap CSS  -->
    <link href="{{ url('public/theme_assets/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css">

    <style>
.filter-btn {
    padding: 6px 10px;  /* Smaller padding */
    font-size: 12px;    /* Smaller font size */
    min-width: 40px;    /* Smaller minimum width */
    min-height: 40px;   /* Smaller minimum height */
    margin: 5px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.filter-btn .badge {
    position: absolute;
    top: -8px;
    right: -8px;
    border-radius: 50%;
    font-size: 8px;
    padding: 3px 5px;
}

@media (max-width: 576px) {
    .filter-btn {
        font-size: 10px;
        padding: 4px 8px;
        min-width: 30px;
        min-height: 30px;
    }

    .filter-btn .badge {
        font-size: 6px;
        padding: 2px 4px;
    }
}

    </style>
</head>
 
<body>
<div class="container my-5">
        <div class="jobform">
            
            

            <div class="container">

    <!-- Speciality Filter Buttons -->
    <div class="headingtext text-center py-3">
        <h6 class="fw-bold">Specialities</h6>
    </div>
    <div class="d-flex flex-wrap justify-content-center mb-4">
        @foreach ($specialities as $speciality)
            <button type="button" class="btn btn-sm btn-danger m-1 filter-btn rounded-5" data-filter="speciality-{{ $speciality->id }}">
                {{ $speciality->title }}
                <span class="badge rounded-pill bg-success">
                    {{ $applications->where('speciality_id', $speciality->id)->count() }}
                </span>
            </button>
        @endforeach
    </div>

    <!-- Non-Academic Filter Buttons -->
    <div class="headingtext text-center">
        <h6 class="fw-bold">Non - Academic</h6>
    </div>
    <div class="d-flex flex-wrap justify-content-center mb-4">
        @foreach ($nonAcademics as $nonAcademic)
            <button type="button" class="btn btn-sm btn-secondary m-1 filter-btn rounded-5" data-filter="non_academic-{{ $nonAcademic->id }}">
                {{ $nonAcademic->title }}
                <span class="badge rounded-pill bg-success">
                    {{ $applications->where('non_academic_id', $nonAcademic->id)->count() }}
                </span>
            </button>
        @endforeach
    </div>

    <!-- Academic Filter Buttons -->
    <div class="headingtext text-center">
        <h6 class="fw-bold">Academic</h6>
    </div>
    <div class="d-flex flex-wrap justify-content-center mb-4">
        @foreach ($academics as $academic)
            <button type="button" class="btn btn-sm btn-primary m-1 filter-btn rounded-5" data-filter="academic-{{ $academic->id }}">
                {{ $academic->title }}
                <span class="badge rounded-pill bg-success">
                    {{ $applications->where('academic_id', $academic->id)->count() }}
                </span>
            </button>
        @endforeach
    </div>

    <!-- Subject Wise Filter Buttons -->
    <div class="headingtext text-center">
        <h6 class="fw-bold">Subject Wise</h6>
    </div>
    <div class="d-flex flex-wrap justify-content-center mb-4">
        @foreach ($subjects as $subject)
            <button type="button" class="btn btn-sm btn-info m-1 filter-btn rounded-5" data-filter="subject-{{ $subject->id }}">
                {{ $subject->title }}
                <span class="badge rounded-pill bg-success">
                    {{ $applications->where('subject_id', $subject->id)->count() }}
                </span>
            </button>
        @endforeach
    </div>

    <!-- Applications Table -->
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered" id="teachme_table">
                <thead>
                    <tr>
                        <th scope="col">SL.</th>
                        <th scope="col">NAME</th>
                        <th scope="col">YEAR AND EXP</th>
                        <th scope="col">SUBJECTS</th>
                        <th scope="col">PLACE</th>
                        <th scope="col">Salary Expected</th>
                        <th scope="col">RESUME</th>
                    </tr>
                </thead>
                <tbody id="applications-table">
                    @foreach ($applications as $key => $application)
                        <tr data-speciality="speciality-{{ $application->speciality_id }}" data-academic="academic-{{ $application->academic_id }}" data-non-academic="non_academic-{{ $application->non_academic_id }}" data-subject="subject-{{ $application->subject_id }}">
                            <th scope="row">{{ $key + 1 }}.</th>
                            <td><a href="{{url('application-details/'.$application->id)}}" target="_blank">{{ $application->applicant_name }}</a></td>
                            <td>{{ $application->experience_years }}</td>
                            <td>{{ $application->qualification }}</td>
                            <td>{{ $application->address }}</td>
                            <td>{{ $application->salary_expected }}</td>
                            <td><a href="{{ url('storage/app/'. $application->cv) }}" target="_blank" class="btn w-100 btn-sm rounded-0 btn-success fw-bold">Download</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
    <div class="py-5">
                <a href="{{url('dashboard')}}" class="btn d-inline-flex align-items-center fw-bold btn-primary gap-2"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff"
                        class="bi bi-sign-turn-left-fill" viewBox="0 0 16 16">
                        <path
                            d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM7 8.466a.25.25 0 0 1-.41.192L4.23 6.692a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V6h1.5A2.5 2.5 0 0 1 11 8.5V11h-1V8.5A1.5 1.5 0 0 0 8.5 7H7z" />
                    </svg>Back</a>
            </div>

</div>

        </div>
    </div>

<!-- Bootstrap JS -->
<script type="text/javascript" src="{{url('public/assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="https://cdn.datatables.net/2.0.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.4/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>


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
        "pageLength": 20,
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



document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const tableRows = document.querySelectorAll('#applications-table tr');

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            const filter = this.getAttribute('data-filter');
            tableRows.forEach(row => {
                const speciality = row.getAttribute('data-speciality');
                const academic = row.getAttribute('data-academic');
                const nonAcademic = row.getAttribute('data-non-academic');
                const subject = row.getAttribute('data-subject');

                if (speciality === filter || academic === filter || nonAcademic === filter || subject === filter) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
});



</script>

</body>

</html>