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
</head>

<body>
    <div class="container my-5">
        <div class="jobform">
            <h1 class="text-center text-uppercase py-5 fw-bold">Apply for jobs <span style="color:red">(Comming Soon!)</span></h1>
            <form action="{{url('thank_you')}}" method="GET">
                <div class="mb-3">
                    <input type="name" class="form-control shadow-none" id="applicantinput"
                        placeholder="Applicant Name">
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
                            <input type="file" class="shadow-none border-0" id="fileInput1"
                                onchange="updateLabel('fileInput1', 'fileName1')">
                        </div>
                        <span id="fileName1" class="file-name text-muted">No file uploaded</span>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input type="name" class="form-control shadow-none" id="fatherinput"
                                    placeholder="Father's Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input type="date" class="form-control shadow-none" id="date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input type="name" class="form-control shadow-none" id="casteinput" placeholder="Caste">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input type="name" class="form-control shadow-none" id="martialinput"
                                    placeholder="Martial Staus">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input type="name" class="form-control shadow-none" id="languagesinput"
                                    placeholder="Languages Known">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input type="name" class="form-control shadow-none" id="qualificationinput"
                                    placeholder="Qualification">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 px-0">
                            <h6 class="fw-bold">Post Applied For</h6>
                        </div>
                    </div>
                    <div class="row px-lg-3">
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Principal
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                Vice-Principal
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="defaultCheck3">
                            <label class="form-check-label" for="defaultCheck3">
                                PU Lecture
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="defaultCheck4">
                            <label class="form-check-label" for="defaultCheck4">
                                SchoolTeacher
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="defaultCheck5">
                            <label class="form-check-label" for="defaultCheck5">
                                Coordinator
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="defaultCheck8">
                            <label class="form-check-label" for="defaultCheck8">
                                Receptionist
                            </label>
                        </div>
                    </div>
                    <div class="row px-lg-3">
                        <div class="col-lg-4 col-12 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="defaultCheck6">
                            <label class="form-check-label" for="defaultCheck6">
                                Academic Counselor-Marketing
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="defaultCheck7">
                            <label class="form-check-label" for="defaultCheck7">
                                PRO
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="defaultCheck9">
                            <label class="form-check-label" for="defaultCheck9">
                                HR Manager
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 px-0 pt-2">
                            <h6 class="fw-bold">Specialized in</h6>
                        </div>
                    </div>
                    <div class="row px-lg-3">
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="icseCheck">
                            <label class="form-check-label" for="icseCheck">
                                ICSE
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="cbseCheck">
                            <label class="form-check-label" for="cbseCheck">
                                CBSE
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="stateCheck">
                            <label class="form-check-label" for="stateCheck">
                                STATE
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 px-0 pt-2">
                            <h6 class="fw-bold">Expertise in</h6>
                        </div>
                    </div>
                    <div class="row px-lg-3">
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="preCheck">
                            <label class="form-check-label" for="preCheck">
                                Pre-School
                            </label>
                        </div>
                        <div class="col-lg-4 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="primaryCheck">
                            <label class="form-check-label" for="primaryCheck">
                                Primary-School
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="middleCheck">
                            <label class="form-check-label" for="middleCheck">
                                Middle-School
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="pucCheck">
                            <label class="form-check-label" for="pucCheck">
                                PUC
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 px-0 pt-2">
                            <h6 class="fw-bold">Subjects Handling</h6>
                        </div>
                    </div>
                    <div class="row px-lg-3">
                        <div class="col-lg-2 col-12 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="scienceCheck">
                            <label class="form-check-label" for="scienceCheck">
                                Science(School)
                            </label>
                        </div>
                        <div class="col-lg-3 col-12 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="mathematicsCheck">
                            <label class="form-check-label" for="mathematicsCheck">
                                Mathematics(School)
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="socialCheck">
                            <label class="form-check-label" for="socialCheck">
                                Social(School)
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="englishCheck">
                            <label class="form-check-label" for="englishCheck">
                                English(School)
                            </label>
                        </div>
                        <div class="col-lg-3 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="otherssc_Check">
                            <label class="form-check-label" for="otherssc_Check">
                                Others(School)
                            </label>
                        </div>
                    </div>
                    <div class="row px-lg-3">
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="physicsCheck">
                            <label class="form-check-label" for="physicsCheck">
                                Physics(PUC)
                            </label>
                        </div>
                        <div class="col-lg-3 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="chemistryCheck">
                            <label class="form-check-label" for="chemistryCheck">
                                Chemistry(PUC)
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="biologyCheck">
                            <label class="form-check-label" for="biologyCheck">
                                Biology(PUC)
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="others_Check">
                            <label class="form-check-label" for="others_Check">
                                Others(PUC)
                            </label>
                        </div>
                        <div class="col-lg-3 col-12 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value=""
                                id="communicationCheck">
                            <label class="form-check-label" for="communicationCheck">
                                Communication Skills
                            </label>
                        </div>
                    </div>
                </div>
                <div class="container pt-3">
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input type="text" class="form-control shadow-none" id="presentlyinput"
                                    placeholder="Presently working at / Fresher">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input type="text" class="form-control shadow-none" id="previousinput"
                                    placeholder="Previous experience in months / years">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input type="text" class="form-control shadow-none" id="casteinput"
                                    placeholder="Salary Expected">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input type="text" class="form-control shadow-none" id="martialinput"
                                    placeholder="Salary Drawn">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <textarea type="text" class="form-control shadow-none" id="languagesinput"
                                    placeholder="Address" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input type="email" class="form-control shadow-none" id="qualificationinput"
                                    placeholder="Email-ID">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input type="number" class="form-control shadow-none" id="languagesinput"
                                    placeholder="+91">
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
                            <input type="file" class="shadow-none border-0" id="fileInput2"
                                onchange="updateLabel('fileInput2', 'fileName2')">
                        </div>
                        <span id="fileName2" class="file-name text-muted">No file uploaded</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="democlassInput" class="form-label fw-bold">Demo Class Video Link (Optional)</label>
                    <input type="text" class="form-control" id="democlassInput" placeholder="Demo Class Video Link">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h6 class="fw-bold">Referred By</h6>
                        </div>
                    </div>
                    <div class="row px-lg-3">
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="newspaperCheck">
                            <label class="form-check-label" for="newspaperCheck">
                                Newspaper
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="socialmediaCheck">
                            <label class="form-check-label" for="socialmediaCheck">
                                Social Media
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="friendsCheck">
                            <label class="form-check-label" for="friendsCheck">
                                Friends
                            </label>
                        </div>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" value="" id="othersCheck">
                            <label class="form-check-label" for="othersCheck">
                                Others
                            </label>
                        </div>
                    </div>

                </div>

                <div class="submitbtn py-5 text-center">
                    <button class="btn btn-danger fw-bold px-3 rounded-5 p-3 w-25">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ url('public/theme_assets/js/main.js')}}"></script>
    <script src="{{ url('public/theme_assets/bootstrap/bootstrap.bundle.min.js')}}"></script>
</body>

</html>