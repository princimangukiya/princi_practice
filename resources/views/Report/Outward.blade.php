@section('page-title')
    Rate Master
@endsection

@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Outward Master</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Outward List</a></li>
            </ol>
        </div>



        <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="{{ route('Outward.genratePDF') }}" class="btn btn-info"><i class="fa fa-download mr-1"></i>
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
                    <div class="card-title">Outward Details</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5" style="padding-right: 50px;">
                            @php
                                $rate = App\Models\supplier_details::get();
                            @endphp
                            <div class="form-group">
                                <h4><label class="form-label">Select Company :-</label></h4>
                                <select id="s_id" name="s_id" required class="form-control select2">
                                    <optgroup label="Company">
                                        <option value="" disabled selected>Choose Company</option>
                                        @if (count($rate) > 0)
                                            @foreach ($rate as $value)
                                                <option value="{{ $value->s_id }}">{{ $value->s_name }}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                @error('s_id')
                                    <small class="errorTxt1">
                                        <div id="title-error" class="error" style="margin-left:3rem">
                                            {{ $message }}
                                        </div>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6" style="display: flex;">
                            <div class="col-md-6">
                                <form class="form-inline" style="padding-right: 50px;">
                                    <div class="col">
                                        <h4><label class="form-label"
                                                style="display: flex; justify-content: end;">Select Start
                                                Date:- </label></h4>
                                        <input type="date" id="Start_date" name="Start_date">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form class="form-inline" style="padding-left: 50px;">
                                    <div class="col">
                                        <h4><label class="form-label"
                                                style="display: flex; justify-content: end;">Select End
                                                Date:- </label></h4>
                                        <input type="date" id="End_date" name="End_date">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-nowrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">Company Name</th>
                                        <th class="border-bottom-0">Barcode_Id</th>
                                        <th class="border-bottom-0">Shape</th>
                                        <th class="border-bottom-0">Old_Weight</th>
                                        <th class="border-bottom-0">New_Weight</th>
                                        <th class="border-bottom-0">Price</th>
                                        <th class="border-bottom-0">Buy_date</th>
                                        {{-- <th>Package</th> --}}
                                        {{-- <th class="border-bottom-0">0.210-0.409</th>
                                        <th class="border-bottom-0">0.410-5.000</th> --}}

                                        <th class="border-bottom-0">Sell_Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inward as $key => $value)


                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $value->s_name }}
                                            </td>
                                            <td>
                                                {{ $value->d_barcode }}
                                            </td>
                                            <td>
                                                {{ $value->shape_name }}
                                            </td>
                                            <td>
                                                {{ $value->d_wt }}
                                            </td>
                                            <td>
                                                {{ $value->d_n_wt }}
                                            </td>
                                            <td>
                                                {{ $value->d_col }}
                                            </td>
                                            <td>
                                                {{ $value->created_at }}
                                            </td>
                                            <td>
                                                {{ $value->created_at }}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
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
