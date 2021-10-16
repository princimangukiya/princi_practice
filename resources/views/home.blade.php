@section('content')
    <style>
        .text-color:hover {
            color: #1A1630 !important;
        }

    </style>
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Hi! Welcome To {{ Session::get('c_name') }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Admin Dashboard</a></li>
            </ol>
        </div>

    </div>
    <!--End Page header-->

    <!-- Row-1 -->
    <div class="row">
        <div class="col-xl-4  col-md-12">
            <a class="text-color" href="/manager">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-end justify-content-between">
                            <div>

                                <p class=" mb-1 fs-14"><b>Managers</b></p>
                                <h2 class="mb-0"><span class="number-font1">{{ $totalManager }}</span></h2>

                            </div>
                            <span class="text-primary fs-35 dash1-iocns bg-primary-transparent border-primary"><i
                                    class="las la-users"></i></span>
                        </div>
                        <div class="d-flex mt-4">

                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4  col-md-12">
            <a class="text-color" href="/supplier">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-end justify-content-between">
                            <div>
                                <p class=" mb-1 fs-14"><b>Suppliers</b></p>
                                <h2 class="mb-0"><span class="number-font1"></span>{{ $totalSupplier }}<span
                                        class="ml-2 text-muted fs-11"><span class="text-success"><i
                                                class="fa fa-caret-up"></i></span></span></h2>
                            </div>
                            <span class="text-secondary fs-35 dash1-iocns bg-secondary-transparent border-secondary"><i
                                    class="las la-hand-holding-usd"></i></span>
                        </div>
                        <div class="d-flex mt-4">

                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4  col-md-12">
            <a class="text-color" href="/working_stock">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-end justify-content-between">
                            <div>
                                <p class=" mb-1 fs-14"><b>Working Stock </b></p>
                                <h2 class="mb-0"><span class="number-font1"> </span>{{ $totalWorkingStock }}
                                </h2>
                            </div>
                            <span class="text-info fs-35 bg-info-transparent border-info dash1-iocns"><i
                                    class="las la-thumbs-up"></i></span>
                        </div>
                        <div class="d-flex mt-4">

                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6  col-md-12">
            <a class="text-color" href="/ready_stock">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-end justify-content-between">
                            <div>
                                <p class=" mb-1 fs-14"><b>Ready To Sell Stock</b></p>
                                <h2 class="mb-0"><span class="number-font1">{{ $totalReadyStock }}</span></h2>

                            </div>
                            <span class="text-primary fs-35 dash1-iocns bg-primary-transparent border-primary"><i
                                    class="las la-users"></i></span>
                        </div>
                        <div class="d-flex mt-4">

                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6  col-md-12">
            <a class="text-color" href="/sell_stock">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-end justify-content-between">
                            <div>
                                <p class=" mb-1 fs-14"><b>Sell Stock</b></p>
                                <h2 class="mb-0"><span class="number-font1"></span>{{ $totalSellStock }}<span
                                        class="ml-2 text-muted fs-11"><span class="text-success"><i
                                                class="fa fa-caret-up"></i></span></span></h2>
                            </div>
                            <span class="text-secondary fs-35 dash1-iocns bg-secondary-transparent border-secondary"><i
                                    class="las la-hand-holding-usd"></i></span>
                        </div>
                        <div class="d-flex mt-4">

                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
@include('app')
