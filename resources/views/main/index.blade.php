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
            <form action="{{ route('submit_application') }}" method="POST"  enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                    <input name="applicant_name" type="text" class="form-control shadow-none" value="applicant_name" required placeholder="Applicant Name">
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
                                <input name="father_name" type="text" value="father_name" required class=" form-control shadow-none" id="fatherinput"
                                    placeholder="Father's Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input name="date" type="date" class="form-control shadow-none" value="03/09/2027" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input name="caste" type="text" class="form-control shadow-none" value="caste" required placeholder="Caste">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input name="martial_status" type="text" class="form-control shadow-none" value="martial_status" required id="martialinput"
                                    placeholder="Martial Staus">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input name="language" type="text" class="form-control shadow-none" value="language" required id="languagesinput"
                                    placeholder="Languages Known">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input name="qualification" type="text" class="form-control shadow-none" value="qualification" required id="qualificationinput"
                                    placeholder="Qualification">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 px-0">
                            <h6 class="fw-bold">Post Applied For</h6>
                        </div>
                    </div>

    <div class="row">

        <?php foreach ($academic as $key) { ?>
            <div class="col-lg-4 col-6 form-check">
                <input class="form-check-input shadow-none" type="checkbox" name="academic[]" checked value="<?=$key->id?>" id="academic_<?=$key->id?>" required>
                <label class="form-check-label" for="academic_<?=$key->id?>">
                <?=$key->title?>
                </label>
            </div>
        <?php } ?>
        <?php foreach ($non_academic as $key) { ?>
            <div class="col-lg-4 col-6 form-check">
                <input class="form-check-input shadow-none" type="checkbox" name="non_academic[]" checked value="<?=$key->id?>" id="non_academic_<?=$key->id?>" required>
                <label class="form-check-label" for="non_academic_<?=$key->id?>">
                <?=$key->title?>
                </label>
            </div>
        <?php } ?>

    </div>

                    

                    <div class="row">
                        <div class="col-12 px-0 pt-2 mt-3">
                            <h6 class="fw-bold">Specialized in</h6>
                        </div>
                    </div>

                    <div class="row px-lg-3">
                    <?php foreach ($speciality as $key) { ?>
                        <div class="col-lg-2 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" checked name="specialities[]" value="<?=$key->id?>" id="speciality_<?=$key->id?>" required>
                            <label class="form-check-label" for="speciality_<?=$key->id?>">
                            <?=$key->title?>
                            </label>
                        </div>
                    <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-12 px-0 pt-2 mt-3">
                            <h6 class="fw-bold">Expertise in</h6>
                        </div>
                    </div>
                    <div class="row px-lg-3">

                    <?php foreach ($expertise as $key) { ?>
                        <div class="col-lg-3 col-6 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" checked name="expertise[]" value="<?=$key->id?>" id="expertise_<?=$key->id?>" required>
                            <label class="form-check-label" for="expertise_<?=$key->id?>">
                            <?=$key->title?>
                            </label>
                        </div>
                    <?php } ?>



                    </div>
                    <div class="row">
                        <div class="col-12 px-0 pt-2 mt-3">
                            <h6 class="fw-bold">Subjects Handling</h6>
                        </div>
                    </div>

                    <div class="row px-lg-3">
                    <?php foreach ($subject as $key) { ?>
                        <div class="col-lg-2 col-12 form-check">
                            <input class="form-check-input shadow-none" type="checkbox" checked name="subject[]" value="<?=$key->id?>" id="subject_<?=$key->id?>" required>
                            <label class="form-check-label" for="subject_<?=$key->id?>">
                            <?=$key->title?>
                            </label>
                        </div>
                    <?php } ?>
                    </div>
                    
                </div>
                <div class="container pt-3">
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input name="working_exp" type="text" value="Fresher" class="form-control shadow-none" id="presentlyinput"
                                    placeholder="Presently working at / Fresher" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input name="experience_years" type="text" value="2 years" class="form-control shadow-none" id="previousinput"
                                    placeholder="Previous experience in months / years" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input name="salary_expected" type="text" value="30000" class="form-control shadow-none" id="casteinput"
                                    placeholder="Salary Expected" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input name="salary_drawn" type="text" value="20000" class="form-control shadow-none" id="martialinput"
                                    placeholder="Salary Drawn" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <textarea name="address" type="text" value="" class="form-control shadow-none" id="languagesinput"
                                    placeholder="Address" rows="5" required>India</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 me-md-1">
                                <input name="email" type="email" value="abc@gmail.com" class="form-control shadow-none" id="qualificationinput"
                                    placeholder="Email-ID" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-0">
                            <div class="mb-3 ms-md-1">
                                <input name="number" type="number" value="91898989889" class="form-control shadow-none" id="languagesinput"
                                    placeholder="+91" required>
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
                    <input type="text" name="democlass" value="democlass" class="form-control" id="democlassInput" placeholder="Demo Class Video Link" required>
                </div>
                
                <div class="container">
    <div class="row">
        <div class="col-12 px-0">
            <h6 class="fw-bold">Referred By</h6>
        </div>
    </div>
    <div class="row px-lg-3">
        <div class="col-lg-2 col-6 form-check">
            <input class="form-check-input shadow-none" checked type="radio" name="referredBy" value="newspaper" id="newspaperRadio" required>
            <label class="form-check-label" for="newspaperRadio">
                Newspaper
            </label>
        </div>
        <div class="col-lg-2 col-6 form-check">
            <input class="form-check-input shadow-none" type="radio" name="referredBy" value="socialmedia" id="socialmediaRadio" required>
            <label class="form-check-label" for="socialmediaRadio">
                Social Media
            </label>
        </div>
        <div class="col-lg-2 col-6 form-check">
            <input class="form-check-input shadow-none" type="radio" name="referredBy" value="friends" id="friendsRadio" required>
            <label class="form-check-label" for="friendsRadio">
                Friends
            </label>
        </div>
        <div class="col-lg-2 col-6 form-check">
            <input class="form-check-input shadow-none" type="radio" name="referredBy" value="others" id="othersRadio" required>
            <label class="form-check-label" for="othersRadio">
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