@section('content')
    <!--/app header-->
    @php

    $avatar = 'T3_Admin_Design/assets/images/users/2.jpg';

    @endphp
    <!--Page header-->

    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Edit Rate Details</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Rate List</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit Rate</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->

    <form action="{{ route('rate_master.update', $supplier->Rate_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Rate Details</div>
                    </div>

                    <div class="card-body">
                        <div class="___class_+?14___">
                            <div class="table-responsive">
                                <div class="card-title font-weight-bold">Rate info:</div>
                                <div class="row">
                                    @php
                                        $rate = App\Models\supplier_details::get();
                                    @endphp
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4><label class="form-label">Select Company :-</label></h4>
                                            <select id="c_id" name="c_id" required class="form-control select2">
                                                <optgroup label="Company">
                                                    <option value="" disabled selected>Choose Company</option>
                                                    @if (count($rate) > 0)
                                                        @foreach ($rate as $value)
                                                            <option value="{{ $value->s_id }}">{{ $value->s_name }}
                                                            </option>
                                                            {{-- <option value="ALOK IMPEX">ALOK IMPEX </option> --}}

                                                        @endforeach
                                                    @endif

                                                </optgroup>
                                            </select>
                                            @error('Rate_id')
                                                <small class="errorTxt1">
                                                    <div id="title-error" class="error" style="margin-left:3rem">
                                                        {{ $message }}
                                                    </div>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    @php
                                        $rates = App\Models\rate::get();
                                    @endphp
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4><label class="form-label">Select Rate :-</label></h4>
                                            <select id="r_id" name="r_id" required class="form-control select2">
                                                <optgroup label="Rate" value="{{ $supplier->r_id }}">
                                                    <option value="" disabled selected>Choose Rate</option>
                                                    @if (count($rates) > 0)
                                                        @foreach ($rates as $value)
                                                            <option value="{{ $value->r_id }}">{{ $value->Rates }}
                                                            </option>
                                                            {{-- <option value="ALOK IMPEX">ALOK IMPEX </option> --}}

                                                        @endforeach
                                                    @endif
                                                </optgroup>
                                            </select>
                                            @error('r_id')
                                                <small class="errorTxt1">
                                                    <div id="title-error" class="error" style="margin-left:3rem">
                                                        {{ $message }}
                                                    </div>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>



                                    {{-- <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Company Name </label>
                                    <input id="s_name" type="text" name="s_name" class="form-control"
                                        value="{{ $supplier->c_id }}" placeholder="Enter Company Name">
                                    @error('s_name')
                                        <small class="errorTxt1">
                                            <div id="title-error" class="error" style="margin-left:3rem">
                                                {{ $message }}
                                            </div>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Rate</label>
                                    <input id="r_id" type="text" name="r_id" class="form-control" placeholder="Select "
                                        required>
                                    @error('s_address')
                                        <small class="errorTxt1">
                                            <div id="title-error" class="error" style="margin-left:3rem">
                                                {{ $message }}
                                            </div>
                                        </small>
                                    @enderror
                                </div>
                            </div> --}}
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Price :-</label>
                                            <input placeholder="Enter Supplier Gst" class="form-control" id="s_gst"
                                                type="text" name="Price" value="{{ $supplier->Price }}" required>
                                            @error('s_gst')
                                                <small class="errorTxt1">
                                                    <div id="title-error" class="error" style="margin-left:3rem">
                                                        {{ $message }}
                                                    </div>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" name="action" class="btn  btn-primary">Submit</button>
                                <a href="/rate_master" class="btn btn-danger">Cancle</a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Row-->
            </div>
        </div>
    </form>
    <script src="{{ asset('T3_Admin_Design/assets/js/quagga.min.js') }}"></script>
    <script src="{{ asset('T3_Admin_Design/assets/js/jquery.js') }}"></script>

@endsection
@include('app')
