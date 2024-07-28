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
        <?php if ($application) { 
                $applicantName = $application->applicant_name;
                $academicTitle = $application->academic ? $application->academic->title : 'N/A';
                $nonAcademicTitle = $application->nonAcademic ? $application->nonAcademic->title : 'N/A';
                $expertiseTitle = $application->expertise ? $application->expertise->title : 'N/A';
                $specialityTitle = $application->speciality ? $application->speciality->title : 'N/A';
                $subjectTitle = $application->subject ? $application->subject->title : 'N/A';
            ?>
        <div class="jobform">
            <div class="row profile-header">
                <div class="col-md-4">
                @if (empty(Auth::user()->profile_pic))
                    <img class="rounded-5" src="{{ url('public/assets/img/user.jpg') }}" alt="Profile Picture">
                    @else
                    <img class="rounded-5" src="{{ url('storage/app/'. $application->profile_img) }}" alt="Profile Picture">
                @endif
                </div>
                <div class="col-md-8 text-start">
                    <h2>{{$application->applicant_name}}</h2>
                    <p class="mb-0 pt-md-4">{{$application->address}}</p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4 about-me">
                    <div class="section-title fw-bold">About Me</div>
                    <p><strong>Father Name: <span style="font-size:13px; color:gray">{{$application->father_name}}</span></strong></p>
                    <p><strong>Date of Birth: <span style="font-size:13px; color:gray">{{$application->date}}</span></strong></p>
                    <!-- <p><strong>Age In Years: {{$application->address}}</strong></p> -->
                    <p><strong>Caste: <span style="font-size:13px; color:gray">{{$application->caste}}</span></strong></p>
                    <p><strong>Marital Status: <span style="font-size:13px; color:gray">{{$application->martial_status}}</span></strong></p>
                    <p><strong>Languages Known: <span style="font-size:13px; color:gray">{{$application->language}}</span></strong></p>
                </div>
                <div class="col-md-8 qualification">
                    <div class="section-title">Qualification</div>
                    <p><strong>Post Applied For: <span style="font-size:13px; color:gray">{{$academicTitle}} {{$nonAcademicTitle}}</span></strong></p>
                    <p><strong>Specialized In: <span style="font-size:13px; color:gray">{{$specialityTitle  }}</span></strong></p>
                    <p><strong>Expertise In: <span style="font-size:13px; color:gray">{{$expertiseTitle }}</span></strong></p>
                    <p><strong>Subjects Handling: <span style="font-size:13px; color:gray">{{$subjectTitle }}</span></strong></p>
                    <p><strong>Presently Working At: <span style="font-size:13px; color:gray">{{$application->working_exp}}</span></strong></p>
                    <p><strong>Previous Experience in Months: <span style="font-size:13px; color:gray">{{$application->experience_years}}</span></strong></p>
                    <p><strong>Salary Expected: <span style="font-size:13px; color:gray">{{$application->salary_expected}}</span></strong></p>
                    <p><strong>Salary Drawn: <span style="font-size:13px; color:gray">{{$application->salary_drawn}}</span></strong></p>
                    <p><strong>Referred By: <span style="font-size:13px; color:gray">{{$application->referredBy}}</span></strong></p>
                    <p><strong>Phone: <span style="font-size:13px; color:gray">{{$application->number}}</span></strong></p>
                    <p><strong>E-Mail id: <span style="font-size:13px; color:gray">{{$application->email}}</span></strong></p>
                    <p><strong>Demo Class: <span style="font-size:13px; color:gray"><a href="<?=$application->democlass?>" target="_blank">Like</a></span></strong></p>
                    <div class="border_b"></div>
                    <a href="{{ url('storage/app/'. $application->cv) }}" target="_blank" class="btn w-100 btn-sm rounded-0 btn-success fw-bold">Download CV</a>
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

        <?php 
            } else {
                echo "Application not found.";
            }
        ?>
    </div>
    <!-- Bootstrap JS -->
    <script src="{{ url('public/theme_assets/bootstrap/bootstrap.bundle.min.js')}}"></script>
</body>

</html>