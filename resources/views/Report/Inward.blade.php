@section('page-title')
    Rate Master
@endsection

@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Inward Master</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Inward List</a></li>
            </ol>
        </div>

        <div class="mt-1">
            <form class="form-inline">
                <div class="search-element">
                    <input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search"
                        tabindex="1">
                    <button class="btn btn-primary-color" type="submit">
                        <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%"
                            width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                            <path
                                d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                            </path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <div class="mt-1">
            <form class="form-inline">
                <div class="search-element">
                    <label for="Start_Date">Start_date:</label>
                    <input type="date" id="Start_date" name="Start_date">
                </div>
            </form>
        </div>
        <div class="mt-1">
            <form class="form-inline">
                <div class="search-element">
                    <label for="End_Date">End_Date:</label>
                    <input type="date" id="End_date" name="End_date">
                </div>
            </form>
        </div>


        <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="{{ route('Inward.genratePDF') }}" class="btn btn-info"><i class="fa fa-download mr-1"></i>
                    Downloade PDF </a>

            </div>
        </div>

    </div>
    <!--End Page header-->
    <!-- Row -->
    <div class="row">
        <div class="col-12">
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Inward Details</div>
                </div>
                <div class="card-body">
                    <div class="___class_+?17___">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-nowrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">Company Name</th>
                                        <th class="border-bottom-0">Rate</th>
                                        {{-- <th>Package</th> --}}
                                        {{-- <th class="border-bottom-0">0.210-0.409</th>
                                        <th class="border-bottom-0">0.410-5.000</th> --}}

                                        <th class="border-bottom-0">Price</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
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
