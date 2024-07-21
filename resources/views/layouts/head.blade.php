<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/assets/img/images (1).png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/fullcalendar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/plugins/morris/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/plugins/summernote/dist/summernote-bs4.css') }}">
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/plugins/light-gallery/css/lightgallery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{url('public/assets/daterange/daterangepicker.css')}}">

    <!--[if lt IE 9]>
        <script src="{{ url('public/assets/js/html5shiv.min.js') }}"></script>
        <script src="{{ url('public/assets/js/respond.min.js') }}"></script>
    <![endif]-->

<style>
#pageMessages {
    position: fixed;
    bottom: 15px;
    right: 15px;
/*    top: 0;
    left: 0;*/
    width: 40%;
    background-color: #f5c6cb;
    z-index: 9999;
    display: none;
}

.alert {
    position: relative;
/*    background-color: white;*/
    padding: 15px;
    margin: 15px;
    border-radius: 5px;
}

.alert .close {
    position: absolute;
    top: 5px;
    right: 5px;
    font-size: 1em;
}

.alert .fa {
    margin-right:.3em;
}


.form-control.form-control-sm {
    padding: 0.25rem 1.5rem !important;
}



/*datatable css*/
        .top-left {
            float: left;
        }

        /* Positioning the top-right section */
        .top-right {
            float: right;
        }
        
        .bottom-left {
            float: left;
        }

        /* Positioning the top-right section */
        .bottom-right {
            float: right;
        }

</style>


</head>
<body>

