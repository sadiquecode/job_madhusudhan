<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>job application form</title>
    <!-- Custom CSS  -->
    <link href="{{ url('public/theme_assets/css/style.css')}}" rel="stylesheet">
    <!-- Bootstrap CSS  -->
    <link href="{{ url('public/theme_assets/bootstrap/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Include Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Include Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- <style>
        #loader {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
        }
    </style> -->
</head>

<body>
    <div class="container my-5">
        <div class="jobform">
            <h1 class="text-center text-uppercase py-5 fw-bold">Applying For Jobs </h1>
            
            
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<style>
.custom-radio {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.custom-radio .form-check-input {
    display: none;
}

.custom-radio .form-check-label {
    position: relative;
    padding-left: 30px;
    cursor: pointer;
    user-select: none;
}

.custom-radio .form-check-label::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    border: 2px solid #007bff; /* Customize border color */
    border-radius: 50%;
    background-color: #fff;
}

.custom-radio .form-check-input:checked + .form-check-label::before {
    background-color: #007bff; /* Customize background color */
}

.custom-radio .form-check-input:checked + .form-check-label::after {
    content: '';
    position: absolute;
    left: 5px;
    top: 50%;
    transform: translateY(-50%);
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #fff;
}
</style>

            
            <form action="{{ route('submit_application') }}" method="POST"  enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
                <div class="mb-3">
                    <input name="applicant_name" type="text" class="form-control shadow-none" value="" required placeholder="Applicant Name">
                </div>
                <div class="mb-3">
                    <label for="fileInput1" class="form-label fw-bold">Upload Passport Size Photo</label>
                    <div class="d-flex align-items-center">
                        <div class="custom-file-input">
                            <label for="fileInput1" class="shadow-sm">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 9l-5 5-5-5M12 12.8V2.5" />
                                </svg>Browse
                            </label>
                            <input type="file" name="profile_img" class="shadow-none border-0" id="fileInput1" required
                                onchange="updateLabel('fileInput1', 'fileName1')">
                        </div>
                        <span id="fileName1" class="file-name text-muted">No file uploaded</span>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input name="father_name" type="text" value="" required class=" form-control shadow-none" id="fatherinput"
                                    placeholder="Father's Name">
                            </div>
                        </div>

<div class="col-md-6 col-12 px-0">
    <div class="mb-3 ms-md-1">
        <input id="datepicker_" name="date" type="text" class="form-control shadow-none" placeholder="Date of Birth" required>
    </div>
</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input name="caste" type="text" class="form-control shadow-none" value="" required placeholder="Caste">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <select name="martial_status" class="form-control shadow-none" required id="martialinput">
                                    <option value="" disabled selected>Marital Status</option>
                                    <option value="Married">Married</option>
                                    <option value="Unmarried">Unmarried</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input name="language" type="text" class="form-control shadow-none" value="" required id="languagesinput"
                                    placeholder="Languages Known">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input name="qualification" type="text" class="form-control shadow-none" value="" required id="qualificationinput"
                                    placeholder="Qualification">
                            </div>
                        </div>
                    </div>


                    

    <div class="row">
        <div class="col-12 px-0">
            <h6 class="fw-bold">Applying For School or College</h6>
        </div>
    </div>


    <div class="row">
    @foreach ($dataTypes as $type)
        <div class="col-lg-4 col-6 form-check custom-radio">
            <input class="form-check-input shadow-none" type="radio" name="data_types_id" value="{{ $type->id }}" id="type{{ $type->id }}" onclick="loadPostAppliedFor({{ $type->id }})">
            <label class="form-check-label" for="type{{ $type->id }}">
                {{ $type->title }}
            </label>
        </div>
    @endforeach
</div>
<br>

<div class="row" id="postAppliedForSection" style="display: none;">
    <div class="col-12 px-0">
        <h6 class="fw-bold">Post Applied For</h6>
    </div>
    <div id="postAppliedFor"></div>
</div>

<div class="row" id="expertiseSection" style="display: none;">
    <div class="col-12 px-0 pt-2 mt-3">
        <h6 class="fw-bold">Expertise in</h6>
    </div>
    <div id="expertise"></div>
</div>

<div class="row" id="specialitySection" style="display: none;">
    <div class="col-12 px-0 pt-2 mt-3">
        <h6 class="fw-bold">Specialized in</h6>
    </div>
    <div id="speciality"></div>
</div>

<div class="row" id="subjectsSection" style="display: none;">
    <div class="col-12 px-0 pt-2 mt-3">
        <h6 class="fw-bold">Subjects Handling</h6>
    </div>
    <div id="subjects"></div>
</div>




                    </div>
            
                <div class="container pt-3">
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input name="working_exp" type="text" value="" class="form-control shadow-none" id="presentlyinput"
                                    placeholder="Presently working at / Fresher" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input name="experience_years" type="text" value="" class="form-control shadow-none" id="previousinput"
                                    placeholder="Previous experience in months / years" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input name="salary_expected" type="text" value="" class="form-control shadow-none" id="casteinput"
                                    placeholder="Salary Expected" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input name="salary_drawn" type="text" value="" class="form-control shadow-none" id="martialinput"
                                    placeholder="Salary Drawn" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <textarea name="address" type="text" value="" class="form-control shadow-none" id="languagesinput"
                                    placeholder="Address" rows="5" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input name="email" type="email" value="" class="form-control shadow-none" id="qualificationinput"
                                    placeholder="Email-ID" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                            <input name="number" type="text" value="91" class="form-control shadow-none" id="languagesinput"
       placeholder="+91" required maxlength="12" oninput="validateInput(this)" onkeydown="preventModification(event)">


                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="fileInput2" class="form-label fw-bold">Upload CV</label>
                    <div class="d-flex align-items-center">
                        <div class="custom-file-input">
                            <label for="fileInput2" class="shadow-sm">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 9l-5 5-5-5M12 12.8V2.5" />
                                </svg>Browse
                            </label>
                            <input name="cv" type="file" class="shadow-none border-0" id="fileInput2"
                                onchange="updateLabel('fileInput2', 'fileName2')" required>
                        </div>
                        <span id="fileName2" class="file-name text-muted">No file uploaded</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="democlassInput" class="form-label fw-bold">Demo Class Video Link (Optional)</label>
                    <input type="text" name="democlass" value="" class="form-control" id="democlassInput" placeholder="Demo Class Video Link">
                </div>
                
  <div class="container">
    <div class="row">
        <div class="col-12 px-0">
            <h6 class="fw-bold">Referred By</h6>
        </div>
    </div>
    <div class="row px-lg-3">
        <div class="col-lg-2 col-6 form-check custom-radio">
            <input class="form-check-input shadow-none" checked type="radio" name="referred_by" value="newspaper" id="newspaperRadio" required>
            <label class="form-check-label" for="newspaperRadio">
                Newspaper
            </label>
        </div>
        <div class="col-lg-2 col-6 form-check custom-radio">
            <input class="form-check-input shadow-none" type="radio" name="referred_by" value="socialmedia" id="socialmediaRadio" required>
            <label class="form-check-label" for="socialmediaRadio">
                Social Media
            </label>
        </div>
        <div class="col-lg-2 col-6 form-check custom-radio">
            <input class="form-check-input shadow-none" type="radio" name="referred_by" value="friends" id="friendsRadio" required>
            <label class="form-check-label" for="friendsRadio">
                Friends
            </label>
        </div>
        <div class="col-lg-2 col-6 form-check custom-radio">
            <input class="form-check-input shadow-none" type="radio" name="referred_by" value="others" id="othersRadio" required>
            <label class="form-check-label" for="othersRadio">
                Others
            </label>
        </div>
    </div>
</div>


                <div class="submitbtn py-5 text-center">
                    <button type="submit" id="submitBtn"  class="btn btn-danger fw-bold px-3 rounded-5 p-3 w-25">Submit</button>
                </div>

        <div id="loader" class="text-center" style="display: none;">
            <img src="http://localhost/job_madhusudhan/public/theme_assets/image/loader.gif" alt="Loading...">
        </div>

            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ url('public/theme_assets/js/main.js')}}"></script>
    <script src="{{ url('public/theme_assets/bootstrap/bootstrap.bundle.min.js')}}"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#datepicker_", {
            dateFormat: "d/m/Y",
            allowInput: true,
            disableMobile: "true" // Ensure the custom picker is used on mobile devices
        });
    });

</script>

    <script>
        // Form validation and loader display logic
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            showLoader();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function showLoader() {
            document.getElementById('submitBtn').style.display = 'none';
            document.getElementById('loader').style.display = 'block';
        }

        function updateLabel(inputId, labelId) {
            var input = document.getElementById(inputId);
            var label = document.getElementById(labelId);
            label.textContent = input.files[0].name;
        }
    </script>

    <script>

function validateInput(element) {
    const prefix = "91";
    const maxLength = 12;
    
    // Ensure the input always starts with "91"
    if (element.value.slice(0, 2) !== prefix) {
        element.value = prefix;
    }
    
    // Limit the total length to 12 characters
    if (element.value.length > maxLength) {
        element.value = element.value.slice(0, maxLength);
    }
}

function preventModification(event) {
    const prefix = "91";
    const inputField = event.target;

    // Prevent deleting the prefix
    if (inputField.selectionStart < prefix.length && (event.key === "Backspace" || event.key === "Delete")) {
        event.preventDefault();
    }

    // Prevent modifying the prefix
    if (inputField.selectionStart < prefix.length && event.key.length === 1 && event.key.match(/[0-9]/)) {
        event.preventDefault();
    }

    // Ensure the prefix remains at the start
    if (inputField.value.slice(0, 2) !== prefix) {
        inputField.value = prefix + inputField.value.slice(2);
    }
}


var base_url = "{{ url('/') }}";

function loadPostAppliedFor(dataTypeId) {
    clearDependentFields();

    fetch(base_url + `/getPostAppliedFor/${dataTypeId}`)
        .then(response => response.json())
        .then(data => {
            let postAppliedForHtml = '';

            postAppliedForHtml += '<span style="color:red">Academic</span><div class="row">';
            data.academics.forEach(item => {
                postAppliedForHtml += `
                    <div class="col-lg-4 col-6 form-check custom-radio">
                        <input class="form-check-input shadow-none" type="radio" name="category" value="academic_${item.id}" id="academic_${item.id}" onclick="loadExpertise(${dataTypeId})">
                        <label class="form-check-label" for="academic_${item.id}">${item.title}</label>
                    </div>`;
            });
            postAppliedForHtml += '</div>';

            postAppliedForHtml += '<span style="color:red">Non Academic</span><div class="row">';
            data.nonAcademics.forEach(item => {
                postAppliedForHtml += `
                    <div class="col-lg-4 col-6 form-check custom-radio">
                        <input class="form-check-input shadow-none" type="radio" name="category" value="non_academic_${item.id}" id="non_academic_${item.id}" onclick="loadExpertise(${dataTypeId})">
                        <label class="form-check-label" for="non_academic_${item.id}">${item.title}</label>
                    </div>`;
            });
            postAppliedForHtml += '</div>';

            document.getElementById('postAppliedFor').innerHTML = postAppliedForHtml;
            document.getElementById('postAppliedForSection').style.display = 'block';
        });
}

function loadExpertise(dataTypeId) {
    clearFields(['expertise', 'speciality', 'subjects']);

    fetch(base_url + `/getExpertise/${dataTypeId}`)
        .then(response => response.json())
        .then(data => {
            let expertiseHtml = '<div class="row px-lg-3">';

            data.forEach(item => {
                expertiseHtml += `
                    <div class="col-lg-3 col-6 form-check custom-radio">
                        <input class="form-check-input shadow-none" type="radio" name="expertise" value="${item.id}" id="expertise_${item.id}" onclick="loadSpeciality(${dataTypeId})">
                        <label class="form-check-label" for="expertise_${item.id}">${item.title}</label>
                    </div>`;
            });

            expertiseHtml += '</div>';
            document.getElementById('expertise').innerHTML = expertiseHtml;
            document.getElementById('expertiseSection').style.display = 'block';
        });
}

function loadSpeciality(dataTypeId) {
    if (document.querySelector('input[name="category"]:checked').value.startsWith('non_academic')) {
        document.getElementById('specialitySection').style.display = 'none';
        clearFields(['speciality', 'subjects']);
    } else {
        fetch(base_url + `/getSpeciality/${dataTypeId}`)
            .then(response => response.json())
            .then(data => {
                let specialityHtml = '<div class="row px-lg-3">';

                data.forEach(item => {
                    specialityHtml += `
                        <div class="col-lg-2 col-6 form-check custom-radio">
                            <input class="form-check-input shadow-none" type="radio" name="speciality" value="${item.id}" id="speciality_${item.id}" onclick="loadSubjects(${item.id})">
                            <label class="form-check-label" for="speciality_${item.id}">${item.title}</label>
                        </div>`;
                });

                specialityHtml += '</div>';
                document.getElementById('speciality').innerHTML = specialityHtml;
                document.getElementById('specialitySection').style.display = 'block';
            });
    }
}

function loadSubjects(specialityId) {
    fetch(base_url + `/getSubjects/${specialityId}`)
        .then(response => response.json())
        .then(data => {
            let subjectsHtml = '<div class="row px-lg-3">';

            data.forEach(item => {
                subjectsHtml += `
                    <div class="col-lg-2 col-12 form-check custom-radio">
                        <input class="form-check-input shadow-none" type="radio" name="subjects" value="${item.id}" id="subject_${item.id}">
                        <label class="form-check-label" for="subject_${item.id}">${item.title}</label>
                    </div>`;
            });

            subjectsHtml += '</div>';
            document.getElementById('subjects').innerHTML = subjectsHtml;
            document.getElementById('subjectsSection').style.display = 'block';
        });
}

function clearDependentFields() {
    document.getElementById('postAppliedFor').innerHTML = '';
    document.getElementById('expertise').innerHTML = '';
    document.getElementById('speciality').innerHTML = '';
    document.getElementById('subjects').innerHTML = '';

    document.getElementById('postAppliedForSection').style.display = 'none';
    document.getElementById('expertiseSection').style.display = 'none';
    document.getElementById('specialitySection').style.display = 'none';
    document.getElementById('subjectsSection').style.display = 'none';
}

function clearFields(fields) {
    fields.forEach(field => {
        document.getElementById(field).innerHTML = '';
        document.getElementById(field + 'Section').style.display = 'none';
    });
}
</script>

</body>

</html>