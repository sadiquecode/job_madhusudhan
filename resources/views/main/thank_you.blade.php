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

    <div class="container thank-you-container">
        <div class="thank-you-message">
            <div class="checkmark">
                <img src="{{ url('public/theme_assets/image/thanku-check.png')}}" class="w-75" alt="checkmark">
            </div>
            <h1>Thank You!</h1>
            <p>Your application was successfully submitted.</p>
            <p class="text-muted">We'll contact you when a decision is made.</p>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="{{ url('public/theme_assets/bootstrap/bootstrap.bundle.min.js')}}"></script>
</body>

</html>