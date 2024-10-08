@include('layouts.head')
<div class="main-wrapper">
@include('layouts.header')
@include('layouts.sidebar')
<div class="page-wrapper">
<div class="content container-fluid">
    <!-- Custom CSS  -->
    <link href="{{ url('public/theme_assets/css/style.css')}}" rel="stylesheet">
    <!-- Bootstrap CSS  -->
    <link href="{{ url('public/theme_assets/bootstrap/bootstrap.min.css')}}" rel="stylesheet">

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

.profile-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        display: block;
    }
    a {
    text-decoration: none;
}

    </style>


<div class="container my-5">
        <div class="jobform">
            
            

            <div class="container">

    <!-- Type Filter Buttons -->
    <div class="headingtext text-center py-3">
        <h6 class="fw-bold">Type</h6>
    </div>
    <div class="d-flex flex-wrap justify-content-center mb-4">
        @foreach ($types as $type)
            <a href="{{url('filter-page?typeid=').$type->id}}" class="btn btn-sm btn-danger m-1 filter-btn rounded-5" data-filter="datatype-{{ $type->id }}">
                {{ $type->title }}
                <span class="badge rounded-pill bg-success">
                    {{ $applications->where('data_types_id', $type->id)->count() }}
                </span>
            </a>
        @endforeach
    </div>

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

    <!-- expertises Filter Buttons -->
    <div class="headingtext text-center py-3">
        <h6 class="fw-bold">Expertises</h6>
    </div>
    <div class="d-flex flex-wrap justify-content-center mb-4">
        @foreach ($expertises as $experty)
            <button type="button" class="btn btn-sm btn-danger m-1 filter-btn rounded-5" data-filter="experty-{{ $experty->id }}">
                {{ $experty->title }}
                <span class="badge rounded-pill bg-success">
                    {{ $applications->where('expertise_id', $experty->id)->count() }}
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


    <div class="row">
    <div class="col-sm-12 d-flex justify-content-center">
        <button type="button" class="btn-sm btn btn-secondary btn-rounded m-r-5" id="toggleSelectAll">
            <i class="fa fa-check"></i> Select All
        </button>
        <button type="button" class="btn-sm btn btn-danger btn-rounded m-r-5 delete_btn" onclick="startBulkDelete()">
            <i class="fa fa-trash"></i> Bulk Delete
        </button>
    </div>
</div>


        <div class="table-responsive">
            <table class="table table-bordered" id="teachme_table">
                <thead>
                    <tr>
                        <th class="col">Select</th>
                        <th scope="col">SL.</th>
                        <th scope="col">NAME</th>
                        <th scope="col-3">Profile</th>
                        <th scope="col">YEAR AND EXP</th>
                        <th scope="col">SUBJECTS</th>
                        <th scope="col">PLACE</th>
                        <th scope="col">Salary Expected</th>
                        <th scope="col">RESUME</th>
                    </tr>
                </thead>
                <tbody id="applications-table">
                    @foreach ($applications as $key => $application)
                        <tr data-datatype="datatype-{{ $application->data_types_id }}" data-speciality="speciality-{{ $application->speciality_id }}" data-experty="experty-{{ $application->expertise_id }}" data-academic="academic-{{ $application->academic_id }}" data-non-academic="non_academic-{{ $application->non_academic_id }}" data-subject="subject-{{ $application->subject_id }}">
                            <td>
                                <input type="checkbox" class="select-checkbox" data-id="{{ $application->id }}" />
                            </td>    
                            <th scope="row">{{ $key + 1 }}.</th>
                            <td><a href="{{url('application-details/'.$application->id)}}" target="_blank">{{ $application->applicant_name }}</a></td>
                            

                <th scope="row">
                    @if (empty($application->profile_img))
                    <img class="rounded-5" src="{{ url('public/assets/img/user.jpg') }}" alt="Profile Picture">
                    @else
                    <img class="rounded-5 profile-img" src="{{ url('storage/app/' . $application->profile_img) }}" alt="Profile Picture">
                    @endif
                </th>

                            <td>{{ $application->experience_years }}</td>
                            <td>{{ $application->qualification }}</td>
                            <td>{{ $application->address }}</td>
                            <td>{{ $application->salary_expected }}</td>
                            <td>
                                <a href="{{ url('storage/app/'. $application->cv) }}" target="_blank" class="btn w-100 btn-sm rounded-0 btn-success fw-bold">Download</a>
                                <a href="{{ url('destroyapp/'. $application->id) }}" onclick="return confirm('Are you sure you want to delete this application?');" class="btn w-100 btn-sm rounded-0 btn-danger fw-bold">Delete</a>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    


</div>

        </div>
    </div>

    </div>
</div>
<!-- Bootstrap JS -->
<script type="text/javascript" src="{{url('public/assets/js/jquery-3.5.1.min.js')}}"></script>


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
                const datatype = row.getAttribute('data-datatype');
                const speciality = row.getAttribute('data-speciality');
                const experty = row.getAttribute('data-experty');
                const academic = row.getAttribute('data-academic');
                const nonAcademic = row.getAttribute('data-non-academic');
                const subject = row.getAttribute('data-subject');

                if (datatype === filter || speciality === filter || experty === filter || academic === filter || nonAcademic === filter || subject === filter) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
});

</script>


<script>
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

    // Attach the function to the bulk delete button
    document.querySelector('.delete_btn').addEventListener('click', startBulkDelete);
});

// Function to handle bulk deletion
function startBulkDelete() {
    var selectedIds = [];
    document.querySelectorAll('.select-checkbox:checked').forEach(function(checkbox) {
        selectedIds.push(checkbox.dataset.id);
    });

    if (selectedIds.length === 0) {
        alert('Please select at least one entry.');
        return;
    }

    if (!confirm('Are you sure you want to delete the selected records?')) {
        return;
    }

    fetch('{{ route('delete.bulk.records') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ ids: selectedIds })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Records deleted successfully');
        location.reload(); // Reload the page to reflect changes
    })
    .catch(error => {
        console.error('Error deleting records:', error);
        alert('Error deleting records. Check console for details.');
    });
}
</script>

@include('layouts.footer')