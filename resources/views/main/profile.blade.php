<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application Profile</title>
    <!-- Custom CSS  -->
    <link href="{{ url('public/theme_assets/css/style.css')}}" rel="stylesheet">
    <!-- Bootstrap CSS  -->
    <link href="{{ url('public/theme_assets/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        .profile-header {
            background-color: #b3e6b3;
            padding: 20px;
            text-align: center;
        }

        .profile-header img {
            border-radius: 10%;
            width: 100px;
            height: 100px;
        }

        .section-title {
            font-weight: bold;
            font-size: 30px;
            margin: 20px 0;
        }

        .about-me {
            border-right: 2px solid #000000;
        }

        .qualification .border {
            border-bottom: 2px solid #000000 !important;
        }

        .about-me,
        .qualification {
            padding: 10px;
            min-height: 100vh;
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <div class="jobform">
            <div class="row profile-header">

                <div class="col-md-2">
                    <img class="img-fluid" src="{{url('public/theme_assets/image/profile_page.webp')}}" alt="Profile Picture">
                </div>
                
                <div class="col-md-10 text-start">
                    <h2>Mr. Johen</h2>
                    <p class="mb-0 pt-4">#90, 2nd cross, Vinayaka Layout, opposite IIHMR, Bangalore, KARNATAKA-560105.
                        INDIA</p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4 about-me">
                    <div class="section-title fw-bold">About Me</div>
                    <p><strong>Father Name:</strong></p>
                    <p><strong>Date of Birth:</strong></p>
                    <p><strong>Age In Years:</strong></p>
                    <p><strong>Caste:</strong></p>
                    <p><strong>Marital Status:</strong></p>
                    <p><strong>Languages Known:</strong></p>
                </div>
                <div class="col-md-8 qualification">
                    <div class="section-title">Qualification</div>
                    <p><strong>Post Applied For:</strong></p>
                    <p><strong>Specialized In:</strong></p>
                    <p><strong>Expertise In:</strong></p>
                    <p><strong>Subjects Handling:</strong></p>
                    <p><strong>Presently Working At:</strong></p>
                    <p><strong>Previous Experience in Months:</strong></p>
                    <p><strong>Salary Expected:</strong></p>
                    <p><strong>Salary Drawn:</strong></p>
                    <p><strong>Referred By:</strong></p>
                    <p><strong>E-Mail id:</strong></p>
                    <div class="border"></div>
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

    
    <!-- Bootstrap JS -->
    <script src="{{ url('public/theme_assets/bootstrap/bootstrap.bundle.min.js')}}"></script>
</body>

</html>