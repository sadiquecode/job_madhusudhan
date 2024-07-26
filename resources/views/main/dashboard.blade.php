@include('layouts.head') 
<div class="main-wrapper">
@include('layouts.header')
@include('layouts.sidebar')
<div class="page-wrapper">


<div class="content container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4">
            <div class="dash-widget dash-widget5">
                <span class="dash-widget-icon bg-success"><i class="far fa-file" aria-hidden="true"></i></span>
                <div class="dash-widget-info">
                    <h3>100</h3>
                    <span>All Application</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4">
            <div class="dash-widget dash-widget5">
                <span class="dash-widget-icon bg-info"><i class="far fa-file"></i></span>
                <div class="dash-widget-info">
                    <h3>32</h3>
                    <span>Monthly Application</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4">
            <div class="dash-widget dash-widget5">
                <span class="dash-widget-icon bg-warning"><i class="far fa-file"></i></span>
                <div class="dash-widget-info">
                    <h3>72</h3>
                    <span>Today Application</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="submitbtn py-5 text-center">
                <a href="{{url('filter_page')}}" class="btn btn-info fw-bold px-3 rounded-5 p-3 w-25 mr-5">Filter Page</a>
                <a href="{{url('profile_page')}}" class="btn btn-danger fw-bold px-3 rounded-5 p-3 w-25">Profile Page</a>
            </div>
        </div>
    </div>
</div>



</div>
</div>
@include('layouts.footer')
