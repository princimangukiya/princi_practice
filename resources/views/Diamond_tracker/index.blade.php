@section('page-title')
    Rate Master
@endsection
@section('content')
    <style>
        .timeline {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .timeline-item {
            /*   outline: 1px solid orange; */
            margin: 0;
            padding: 0 30px 20px 30px;
            position: relative;
        }

        .timeline-item p,
        .timeline-item h3 {
            padding: 0;
            margin: 0;
        }

        .timeline-item__title:before {
            content: '';
            display: block;
            position: absolute;
            width: 1px;
            top: 0;
            left: 10px;
            border-left: 1px solid black;
            height: 100%;
        }

        .timeline-item:last-child .timeline-item__title:before {
            display: none;
        }

        .timeline-item__status {
            width: 12px;
            height: 12px;
            background: white;
            overflow: hidden;
            text-indent: -9000em;
            position: absolute;
            left: 4px;
            top: 0;
            border-radius: 50%;
            border: 1px solid black
        }

        .timeline-item--complete .timeline-item__status {
            background-color: lime;
        }

        .timeline-item--error .timeline-item__status {
            background-color: red;
        }

        .timeline-item--error .timeline-item__title {
            color: red
        }

        .timeline-item--warning .timeline-item__status {
            background-color: orange;
        }

    </style>
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Diamond Tracker</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Diamond Tracker</a></li>
            </ol>
        </div>
        {{-- <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="{{ route('rate_master.create') }}" class="btn btn-info"><i class="fa fa-user-plus mr-1"></i> Add
                    Rate </a>
            </div>
        </div> --}}
    </div>
    <!--End Page header-->
    <!-- Row -->
    <div class="row">
        <div class="col-12">
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Diamond Tracker Details</div>
                </div>
                <div class="card-body" style="dispaly:flex; justify:content:center;">
                    {{-- <div class="___class_+?17___"> --}}
                    <div class="container-fluid" style="padding-bottom: 30px;">
                        <div class="d-flex">
                            <div class="mt-1">
                                <form class="form-inline" method="post" action="/Diamond_tracker_search">
                                    @csrf
                                    <div class="search-element" style="border: 1px solid #CED4DA;border-radius: 5px;">
                                        <input type="search" class="form-control header-search" name="search_value"
                                            id="search_value" placeholder="Enter Barcode value..." aria-label="Search"
                                            tabindex="1" style="border: none;">
                                        <button class="btn btn-primary-color" type="submit">
                                            <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24"
                                                height="100%" width="100%" preserveAspectRatio="xMidYMid meet"
                                                focusable="false">
                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                <path
                                                    d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <ol class="timeline">
                        <li class="timeline-item timeline-item--complete">
                            <h3 class="timeline-item__title">Order placed</h3>
                            <div class="timeline-item__status">Status completed</div>
                            <p class="timeline-item__date">Jan 22nd</p>
                            <p class="timeline-item__desc">Placed on the Company</p>
                        </li>
                        <li class="timeline-item timeline-item--warning">
                            <h3 class="timeline-item__title">Order recieved</h3>
                            <div class="timeline-item__status">Status warning</div>
                            <p class="timeline-item__date">Jan 22nd</p>
                            <p class="timeline-item__desc">By the Manager</p>
                        </li>
                        <li class="timeline-item timeline-item--error">
                            <h3 class="timeline-item__title">Order processed</h3>
                            <div class="timeline-item__status">Status error</div>
                            <p class="timeline-item__date">Jan 22nd</p>
                            <p class="timeline-item__desc">At some point</p>
                        </li>
                        <li class="timeline-item timeline-item--pending">
                            <h3 class="timeline-item__title">Order delivered</h3>
                            <div class="timeline-item__status">Status error</div>
                            <p class="timeline-item__date">Jan 22nd</p>
                            <p class="timeline-item__desc">Whenever</p>
                        </li>
                    </ol> --}}





                    {{-- </div> --}}
                </div>
            </div>
            <!--/div-->
        </div>
    </div>
    <!-- /Row -->
    </div>
    </div><!-- end app-content-->
    </div>
    <script src="{{ asset('assets/vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script>
@endsection
@include('app')
