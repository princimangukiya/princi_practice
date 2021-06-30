<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('T3_Admin_Design/assets/js/jquery.js')}}"></script>
    <link rel="stylesheet" href="{{asset('T3_Admin_Design/media/css/jquery.dataTables.min.css')}}">
    <script src="{{asset('T3_Admin_Design/media/js/jquery.dataTables.min.js')}}"></script>

    <title> Barcode Scanning </title>
</head>

<body>
    <form  action="{{ route('ready_stock.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-xl-3 col-lg-4">
                
               {{-- <div id="camera"></div>--}}
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
                                    <input id="bar_code" type="text" name="bar_code" class="form-control" value="{{ old('bar_code') }}" placeholder="Enter Bar Code">
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
                        $manager = App\Models\Manager_Details::get();
                    @endphp
                        <div class="col-md-6">
                            <div class="form-group">
                                <h4><label class="form-label">Select Manager :-</label></h4>
                                <select id="m_id"  name="m_id" required class="form-control select2">
                                    <optgroup label="Managers">
                                        <option value="" disabled selected>Choose Manager</option>
                                        @if (count($manager) > 0)
                                            @foreach ($manager as $value)
                                                <option value="{{ $value->m_id }}">{{ $value->m_name }}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                @error('m_id')
                                    <small class="errorTxt1">
                                        <div id="title-error" class="error" style="margin-left:3rem">
                                            {{ $message }}
                                        </div>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" name="button"  class="btn  btn-primary" >Submit</button>
                   
                        {{--
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Diamond Packate Name</label>
                                <input id="packatename" type="text" name="packatename" class="form-control" value="{{ old('packatename') }}" placeholder="Enter Packate Name" required>
                                @error('packatename')
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
                                <input placeholder="Enter Packate Wt" class="form-control" id="d_wt" type="text" name="d_wt"  value="{{ old('d_wt') }}"  required>
                                @error('d_wt')
                                <small class="errorTxt1">
                                    <div id="title-error" class="error" style="margin-left:3rem">
                                        {{ $message }}
                                    </div>
                                </small>
                                @enderror
                            </div>
                        </div>
                        --}}
                        {{--
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label class="form-label">Packate Col :-</label>
                                <input type="text" id="d_col" class="form-control" placeholder="Enter Packate Col "  name="d_col"  value="{{ old('d_col') }}"  required>
                                @error('d_col')
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
                                <label class="form-label">Packate Pc</label>
                                <input id="d_pc" type="text" name="d_pc" class="form-control"  value="{{ old('d_pc') }}" placeholder="Enter Packate Pc"   required>
                                @error('d_pc')
                                    <small class="errorTxt1">
                                        <div id="title-error" class="error" style="margin-left:3rem">
                                            {{ $message }}
                                        </div>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        
                        @php
                            $shape = App\Models\diamond_shape::get();
                        @endphp
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Packate Shape</label>
                                <select id="shape_id"  name="shape_id" required class="form-control select2">
                                    <optgroup label="Shapes">
                                        <option value="" disabled selected>Choose Diamond Shape</option>
                                        @if (count($shape) > 0)
                                            @foreach ($shape as $shapevalue)
                                                <option value="{{ $shapevalue->shape_id }}">{{ $shapevalue->shape_name }}</option>
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
                        {{--
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Packate Cla</label>
                                <input id="d_cla" type="text" name="d_cla" class="form-control" placeholder="Enter Packate Cla"  required>
                                @error('d_cla')
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
                                <label class="form-label">Packate Exp in Percentage</label>
                                <input id="d_exp_pr" type="text" name="d_exp_pr" class="form-control" placeholder="Enter Packate Exp in Percentage"  required>
                                @error('d_exp_pr')
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
                                <label class="form-label">Packate Exp</label>
                                <input id="d_exp" type="text" name="d_exp" class="form-control" placeholder="Enter Packate Exp"  required>
                                @error('d_exp')
                                    <small class="errorTxt1">
                                        <div id="title-error" class="error" style="margin-left:3rem">
                                            {{ $message }}
                                        </div>
                                    </small>
                                @enderror
                            </div>
                        </div>
                                           
                    </div>
                    --}}
                    {{--
                    <div class="card-title font-weight-bold mt-5">External Links:</div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Facebook</label>
                                <input type="text" class="form-control" placeholder="https://www.facebook.com/">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Google</label>
                                <input type="text" class="form-control" placeholder="https://www.google.com/">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Twitter</label>
                                <input type="text" class="form-control" placeholder="https://twitter.com/">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Pinterest</label>
                                <input type="text" class="form-control" placeholder="https://in.pinterest.com/">
                            </div>
                        </div>
                    </div>
                    <div class="card-title font-weight-bold mt-5">About:</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">About Me</label>
                                <textarea rows="5" class="form-control" placeholder="Enter About your description"></textarea>
                            </div>
                        </div>
                    </div>
                    --}}
                </div>
                <div class="card-footer text-right">
                    <button type="submit" name="action" class="btn  btn-primary" >Submit</button>
                    <a href="#" class="btn btn-danger">Cancle</a>
                </div>
                
            </div>
            
        </div>
    
</body>

</html>