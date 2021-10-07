<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="VM Jewels Billing & Inventory Management System" name="description">
    <meta content="VM Jewels Private Limited" name="author">
    <meta name="keywords"
        content="vm jewels, eklingji jewels, VM JEWELS, EKLINGJI JEWELS, Inventory Management System, VM Jewels Billing, VM Jewels Billing & Inventory Management System," />
    <title> Barcode Scanning </title>
    <!--Favicon -->
    <link rel="icon" href="{{ asset('assets\images\company_logo\vmjewels.jpeg') }}" type="image/x-icon" />

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets\media\css\jquery.dataTables.min.css') }}">
    <script src="{{ asset('assets/media/js/jquery.dataTables.min.js') }}"></script>


</head>

<body>
    <form action="{{ route('diamond.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-3 col-lg-4">

                {{-- <div id="camera"></div> --}}
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add New Diamond Packate</div>
                    </div>

                    <div class="card-body">

                        <div class="card-title font-weight-bold">Packate info:</div>
                        <div class="row">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">BarCode Value </label>
                                        <input id="bar_code" type="text" name="bar_code" class="form-control"
                                            value="{{ old('bar_code') }}" placeholder="Enter Bar Code">
                                        @error('bar_code')
                                            <small class="errorTxt1">
                                                <div id="title-error" class="error" style="margin-left:3rem">
                                                    {{ $message }}
                                                </div>
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                @php
                                    $c_id = session()->get('c_id');
                                    $supplier = App\Models\Supplier_Details::where('c_id' , $c_id)->get();
                                @endphp
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Packate Supplier</label>
                                        <select id="s_id" name="s_id" required class="form-control select2">
                                            <optgroup label="Supplier">
                                                <option value="" disabled selected>Choose Supplier</option>
                                                @if (count($supplier) > 0)
                                                    @foreach ($supplier as $value)
                                                        <option value="{{ $value->s_id }}">{{ $value->s_name }}
                                                        </option>
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
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Packate Weight :-</label>
                                        <input placeholder="Enter Packate Wt" class="form-control" id="d_wt" type="text"
                                            name="d_wt" value="{{ old('d_wt') }}" required>
                                        @error('d_wt')
                                            <small class="errorTxt1">
                                                <div id="title-error" class="error" style="margin-left:3rem">
                                                    {{ $message }}
                                                </div>
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" name="button" class="btn  btn-primary">Submit</button>


                                @php
                                    $shape = App\Models\diamond_shape::get();
                                @endphp
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Packate Shape</label>
                                        <select id="shape_id" name="shape_id" required class="form-control select2">
                                            <optgroup label="Shapes">
                                                <option value="" disabled selected>Choose Diamond Shape</option>
                                                @if (count($shape) > 0)
                                                    @foreach ($shape as $shapevalue)
                                                        <option value="{{ $shapevalue->shape_id }}">
                                                            {{ $shapevalue->shape_name }}</option>
                                                    @endforeach
                                                @endif
                                            </optgroup>
                                        </select>
                                        @error('shape_id')
                                            <small class="errorTxt1">
                                                <div id="title-error" class="error" style="margin-left:3rem">
                                                    {{ $message }}
                                                </div>
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" name="action" class="btn  btn-primary">Submit</button>
                                <a href="#" class="btn btn-danger">Cancle</a>
                            </div>

                        </div>

                    </div>

</body>

</html>
