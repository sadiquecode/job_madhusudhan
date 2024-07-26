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
</head>
 
<body>
    <div class="container my-5">
        <div class="jobform">
            <div class="py-5">
                <a href="{{url('dashboard')}}" class="btn d-inline-flex align-items-center fw-bold btn-primary gap-2"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff"
                        class="bi bi-sign-turn-left-fill" viewBox="0 0 16 16">
                        <path
                            d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM7 8.466a.25.25 0 0 1-.41.192L4.23 6.692a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V6h1.5A2.5 2.5 0 0 1 11 8.5V11h-1V8.5A1.5 1.5 0 0 0 8.5 7H7z" />
                    </svg>Back</a>
                    
            </div>

            <h2 style="text-align:center; color:red" class="mb-2">Comming Soon</h2><br><br>
            
            <div class="container">
                
                <div class="row pb-5">
                    <div class="col-4 text-center">
                        <button type="button" class="btn btn-danger position-relative fw-semibold">
                            CBSE
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                8
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                    </div>
                    <div class="col-4 text-center">
                        <button type="button" class="btn btn-danger position-relative fw-semibold">
                            ICSE
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                89
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                    </div>
                    <div class="col-4 text-center">
                        <button type="button" class="btn btn-danger position-relative fw-semibold">
                            PUC
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="headingtext text-center pb-3">
                    <h4 class="fw-bold">Non - ACADEMIC</h4>
                </div>
                <div class="row g-3 pb-4">
                    <div class="col-12 col-sm-4 text-center">
                        <div class="selectoptions position-relative fw-semibold">
                            <span class="position-absolute translate-middle badge rounded-pill bg-success">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 text-center">
                        <div class="selectoptions position-relative fw-semibold">
                            <span class="position-absolute translate-middle badge rounded-pill bg-success">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 text-center">
                        <div class="selectoptions position-relative fw-semibold">
                            <span class="position-absolute translate-middle badge rounded-pill bg-success">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="headingtext text-center pb-3">
                    <h4 class="fw-bold">ACADEMIC</h4>
                </div>
                <div class="row g-3 pb-4">
                    <div class="col-lg-3 col-6 text-center">
                        <div class="selectoptions position-relative fw-semibold">
                            <span class="position-absolute translate-middle badge rounded-pill bg-success">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 text-center">
                        <div class="selectoptions position-relative fw-semibold">
                            <span class="position-absolute translate-middle badge rounded-pill bg-success">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 text-center">
                        <div class="selectoptions position-relative fw-semibold">
                            <span class="position-absolute translate-middle badge rounded-pill bg-success">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 text-center">
                        <div class="selectoptions position-relative fw-semibold">
                            <span class="position-absolute translate-middle badge rounded-pill bg-success">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="headingtext text-center pb-3">
                    <h4 class="fw-bold">SUBJECT WISE</h4>
                </div>
                <div class="row g-3 pb-4">
                    <div class="col-6 col-sm-4 text-center">
                        <div class="selectoptions position-relative fw-semibold">
                            <span class="position-absolute translate-middle badge rounded-pill bg-success">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 text-center">
                        <div class="selectoptions position-relative fw-semibold">
                            <span class="position-absolute translate-middle badge rounded-pill bg-success">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 text-center">
                        <div class="selectoptions position-relative fw-semibold">
                            <span class="position-absolute translate-middle badge rounded-pill bg-success">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 text-center">
                        <div class="selectoptions position-relative fw-semibold">
                            <span class="position-absolute translate-middle badge rounded-pill bg-success">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 text-center">
                        <div class="selectoptions position-relative fw-semibold">
                            <span class="position-absolute translate-middle badge rounded-pill bg-success">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 text-center">
                        <div class="selectoptions position-relative fw-semibold">
                            <span class="position-absolute translate-middle badge rounded-pill bg-success">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th scope="col">SL.</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">YEAR AND EXP</th>
                                    <th scope="col">SUBJECTS</th>
                                    <th scope="col">PLACE</th>
                                    <th scope="col">WORKING NOW</th>
                                    <th scope="col">RESUME</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1.</th>
                                    <td>Parveen</td>
                                    <td>03 years</td>
                                    <td>Kannada</td>
                                    <td>Davangere</td>
                                    <td>Vidyalaya</td>
                                    <td><a href="#" class="btn w-100 btn-sm rounded-0 btn-success fw-bold">Download</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2.</th>
                                    <td>Kumar</td>
                                    <td>06 years</td>
                                    <td>Physics</td>
                                    <td>Shimonga</td>
                                    <td>APJ School</td>
                                    <td><a href="#" class="btn w-100 btn-sm rounded-0 btn-success fw-bold">Download</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3.</th>
                                    <td>Shilpa</td>
                                    <td>09 years</td>
                                    <td>Chemistry</td>
                                    <td>Chitradurga</td>
                                    <td>Karnataka School</td>
                                    <td><a href="#" class="btn w-100 btn-sm rounded-0 btn-success fw-bold">Download</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ url('public/theme_assets/bootstrap/bootstrap.bundle.min.js')}}"></script>
</body>

</html>