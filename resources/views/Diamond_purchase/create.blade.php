@include('header_css')
@extends('app')
@section('content')

    <!--/app header-->
    @php

    $avatar = 'assets/images/users/2.jpg';

    @endphp
    <style>
        .hidden {
            display: none;
        }

    </style>
    {{-- <link href="{{ asset('assets/plugins/time-picker/jquery.timepicker.css') }}" rel="stylesheet" />
    <!-- INTERNAL Date Picker css -->
    <link href="{{ asset('assets/plugins/date-picker/date-picker.css') }}" rel="stylesheet" />

    <!-- INTERNAL Datepicker js -->
    <script src="{{ asset('assets/plugins/date-picker/date-picker.js') }}"></script>
    <script src="{{ asset('assets/plugins/date-picker/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/plugins/input-mask/jquery.maskedinput.js') }}"></script>
    <!-- INTERNAL Timepicker js -->
    <script src="{{ asset('assets/plugins/time-picker/jquery.timepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/time-picker/toggles.min.js') }}"></script> --}}

    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Add Diamond Packet</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Diamond Purchase List</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Add Diamond</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
    <!--/div-->


    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add New Diamond Packet</div>

                </div>

                <div class="card-body">
                    @php
                        $c_id = session()->get('c_id');
                        $supplier1 = App\Models\supplier_details::where([['c_id', $c_id], ['status', 1]])->get();
                    @endphp
                    <div class="card-title font-weight-bold">Packet info:</div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Enter Bill Date :-</label>
                                <input placeholder="Enter Date:-" class="form-control" id="Bill_date" type="date"
                                    name="bill_date" value="" required>
                                @error('bill_date')
                                    <small class="errorTxt1">
                                        <div id="title-error" class="error" style="margin-left:3rem">
                                            {{ $message }}
                                        </div>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Packet Supplier</label>
                                <select id="s_id" name="s_name" required class="form-control select2">
                                    <optgroup label="Supplier">
                                        <option value="" disabled selected>Choose Supplier</option>
                                        @if (count($supplier1) > 0)
                                            @foreach ($supplier1 as $value)
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
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">BarCode Value</label>
                                <input id="bar_code" type="text" name="bar_code" class="form-control inputField"
                                    value="{{ old('bar_code') }}" placeholder="Enter Bar Code" autofocus>
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
                            $shape = App\Models\Diamond_Shape::all();
                        @endphp
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Packet Shape</label>
                                <select id="shape_id" name="shape_id" required class="form-control select2">
                                    <optgroup label="Shapes">
                                        <option value="" disabled selected>Choose Diamond Shape</option>
                                        @if (count($shape) > 0)
                                            @foreach ($shape as $shapevalue)
                                                <option value="{{ $shapevalue->shape_id }}">
                                                    {{ $shapevalue->shape_name }}
                                                </option>
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
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Packet Weight :-</label>
                            <input placeholder="Enter Packet Wt" class="form-control inputField" id="d_wt" type="text"
                                name="d_wt" value="0." required>
                            @error('d_wt')
                                <small class="errorTxt1">
                                    <div id="title-error" class="error" style="margin-left:3rem">
                                        {{ $message }}
                                    </div>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" id="addData" name="addData" onClick="addData()"
                            class="btn  btn-primary">Submit</button>
                        <a href="/diamond" class="btn btn-danger">Cancle</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row-->
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Diamond Purchase Data</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tblItemShow" class="table table-bordered text-wrap key-buttons">
                            <thead>
                                <tr>
                                    {{-- <th class="border-bottom-0">#</th> --}}
                                    <th class="border-bottom-0">Party Name</th>
                                    <th class="border-bottom-0">Bar Code</th>
                                    <th class="border-bottom-0">Weight</th>
                                    {{-- <th>Package</th> --}}
                                    <th class="border-bottom-0">Shape</th>
                                    <th class="border-bottom-0">Buy Date</th>
                                    {{-- <th class="border-bottom-0">Action</th> --}}


                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button onclick="not1()" class="btn btn-primary">Default</button>
    {{-- <div id="growls-default">
        <div class="growl growl-notice growl-medium">
            <div class="growl-close">x</div>
            <div class="growl-title">Your Diamond Succefully Added</div>
            <div class="growl-message">THank You !!</div>
        </div>
    </div> --}}
    <script src="{{ asset('assets/js/quagga.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script>
        var id, mytable;
        $(document).ready(function() {
            mytable = $('#tblItemShow').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip',
                // ajax: "{{ route('diamond.store') }}",
                // "columns": [{
                //         "data": "s_name",
                //         "name": "s_name",
                //         "searchable": false
                //     },
                //     {
                //         "data": "d_barcode",
                //         "name": "bar_code",
                //         "searchable": true
                //     },
                //     {
                //         "data": "d_wt",
                //         "name": "d_wt",
                //         "searchable": true
                //     },
                //     {
                //         "data": "shape_name",
                //         "name": "shape_id",
                //         "searchable": true
                //     },
                //     {
                //         "data": "bill_date",
                //         "name": "bill_date",
                //         "searchable": true
                //     }, {

                //         "mRender": function(data, type, row) {
                //             return '<a href = "javascript:void(0)" data-toggle = "tooltip" onClick = "editFunc($id)" data-original-title = "Edit" class = "edit btn btn-success edit">Edit </a> <a href = "javascript:void(0);" id = "delete-compnay" onClick = "deleteFunc($id)" data-toggle = "tooltip" data-original-title = "Delete" class = "delete btn btn-danger"> Delete </a>'
                //         }
                //     }
                // ]
            });

            // function fnCreatedRow(nRow) {
            //     $('td:eq(0)', nRow).append(
            //         "<div class='col1d'><button class='editBut'><img >src=''></button></div>"
            //     );
            // }
            // mytable.row.add([id, 'pkt1', '10.5']);
            // mytable.draw();
        });

        var currentBoxNumber = 0;
        $(".inputField").keyup(function(event) {
            if (event.keyCode == 13) {
                textboxes = $("input.inputField");
                currentBoxNumber = textboxes.index(this);
                console.log(textboxes.index(this));
                if (textboxes[currentBoxNumber + 1] != null) {
                    nextBox = textboxes[currentBoxNumber + 1];
                    nextBox.focus();
                    nextBox.select();
                    event.preventDefault();
                    return false;
                } else {
                    addData();
                }
            }
        });

        function addData() {
            // alert(id);
            var barcode = $('#bar_code').val();
            var weight = $('#d_wt').val();
            var shape = $('#shape_id').val();
            var s_id = $('#s_id').val();
            var bill_date = $('#Bill_date').val();
            var shapevalue = $('#shape_id').find(":selected").text();
            var partyName = $('#s_id').find(":selected").text();
            // alert(barcode);
            // alert(m_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ route('diamond.store') }}',
                data: {
                    'bar_code': barcode,
                    'd_wt': weight,
                    'shape_id': shape,
                    's_id': s_id,
                    'bill_date': bill_date
                },
                dataType: 'json',

                success: function(response_msg) {
                    // alert(bill_date);
                    if (response_msg.success == 200) {
                        alert("Barcode already exist!");
                        //location.reload();
                    } else if (response_msg.success == true) {
                        mytable.row.add([partyName, barcode, weight, shapevalue, bill_date]);
                        mytable.draw();
                        // $('#s_id').val('');
                        $('#bar_code').val('');
                        $('#d_wt').val('0.');
                        // $('#shape_id').val('');
                        $('#bill_date').focus();
                        notif({
                            msg: "<b>Success:</b> Well done Diamond Added Successfully",
                            type: "success"
                        });
                        // $(this).addClass('growls-default');
                    } else {
                        // alert('Please, Fill all the fields!');
                        notif({
                            msg: "<b>Please,</b> Fill all the fields!",
                            type: "error"
                            // position: "center"   
                        });
                    }

                }
            });
        }
    </script>

@endsection
@include('footer_js')
