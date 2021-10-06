@section('content')
    <!--/app header-->
    @php

    $avatar = 'T3_Admin_Design/assets/images/users/2.jpg';

    @endphp
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Add Diamond packet</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">User List</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Add User</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
    {{-- <div class="card">
        <div class="card-header">
            <div class="card-title">Diamond Purchase Data</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblItemShow" class="table table-bordered text-wrap key-buttons">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">Party Name</th>
                            <th class="border-bottom-0">Bar Code</th>
                            <th class="border-bottom-0">Weight</th>
                            {{-- <th>Package</th> --}
                            <th class="border-bottom-0">Shape</th>
                            <th class="border-bottom-0">Action</th>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($supplier as $key => $value)
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
                                    {{ $value->d_wt }}
                                </td>
                                <td>
                                    {{ $value->shape_name }}
                                </td>
                                <td class="align-middle"
                                    style="display: flex; align-items: center;justify-content: space-evenly;">
                                    <a href="{{ route('diamond.edit', ['id' => $value->d_id]) }}">
                                        <div class="btn-group align-top">
                                            <button class="btn btn-sm btn-success" type="button" data-toggle="modal"
                                                data-target="#user-form-modal">Edit</button>
                                            <button class="btn btn-sm btn-success" type="button"><i
                                                    class="fe fe-edit-2"></i></button>
                                        </div>
                                    </a>

                                    <form action="{{ route('diamond.destroy', $value->d_id) }}" method="post">
                                        @csrf
                                        <div class="btn-group align-top">
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                            <button class="btn btn-sm btn-danger"><i class="fe fe-trash-2"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
    <!--/div-->


    <div class="row">
        {{-- <div class="col-xl-3 col-lg-4">

            <div id="camera"></div>

        </div> --}}
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Diamond packet</div>

                </div>

                <div class="card-body">
                    @php
                        $c_id = session()->get('c_id');
                        $supplier1 = App\Models\supplier_details::where('c_id', $c_id)->get();
                    @endphp
                    <div class="card-title font-weight-bold">packet info:</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">packet Supplier</label>
                                <select id="s_id" name="s_id" required class="form-control select2 inputField">
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
                                <label class="form-label">BarCode Value </label>
                                <input id="bar_code" type="text" name="bar_code" class="form-control inputField"
                                    value="{{ $supplier->d_barcode }}" placeholder="Enter Bar Code" autofocus>
                                @error('bar_code')
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
                                <label class="form-label">packet Weight :-</label>
                                <input placeholder="Enter packet Wt" class="form-control inputField" id="d_wt" type="text"
                                    name="d_wt" value="{{ $supplier->d_wt }}" required>
                                @error('d_wt')
                                    <small class="errorTxt1">
                                        <div id="title-error" class="error" style="margin-left:3rem">
                                            {{ $message }}
                                        </div>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        @php
                            $shape = App\Models\Diamond_Shape::get();
                        @endphp
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">packet Shape</label>
                                <select id="shape_id" name="shape_id" required class="form-control select2 inputField">
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
                    <div class="card-footer text-right">
                        <button id="addData" name="addData" onClick="addData()" class="btn  btn-primary">Submit</button>
                        <a href="/diamond/create" class="btn btn-danger">Cancle</a>
                    </div>

                </div>

            </div>

        </div>
        <!-- End Row-->


        <script src="{{ asset('T3_Admin_Design/assets/js/quagga.min.js') }}"></script>
        <script src="{{ asset('T3_Admin_Design/assets/js/jquery.js') }}"></script>

        <script>
            var currentBoxNumber = 0;
            $(".inputField").keyup(function(event) {
                if (event.keyCode == 13) {
                    textboxes = $("input.inputField");
                    currentBoxNumber = textboxes.index(this);
                    console.log(textboxes.index(this));
                    if (textboxes[currentBoxNumber + 0] != null) {
                        nextBox = textboxes[currentBoxNumber + 0];
                        nextBox.focus();
                        nextBox.select();
                        event.preventDefault();
                        return false;
                    } else {
                        addData();
                    }
                }
            });
            var id, mytable;
            $(document).ready(function() {
                mytable = $('#tblItemShow').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "sDom": 'lfrtip'
                });
                // mytable.row.add([id, 'pkt1', '10.5']);
                // mytable.draw();
            });

            function addData() {
                var barcode = $('#bar_code').val();
                var weight = $('#d_wt').val();
                var shape = $('#shape_id').val();
                var s_id = $('#s_id').val();
                var shapevalue = $('#shape_id').find(":selected").text();
                var partyName = $('#s_id').find(":selected").text();
                //alert(barcode);
                //alert(weight);
                //alert(shapevalue);

                // var token = $('meta[name="csrf-token"]').attr('content');
                // alert(token);
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
                        's_id': s_id

                    },
                    dataType: 'json',
                    success: function(response_msg) {
                        // alert(response_msg.success);
                        if (response_msg.success == true) {

                            mytable.row.add([partyName, barcode, weight, shapevalue]);
                            mytable.draw();
                            $('#bar_code').val('');
                            $('#d_wt').val('');
                            // $('#shape_id').val('');
                            $('#bar_code').focus();

                        } else if (response_msg.success == 200) {
                            alert("Barcode already exist!");
                            // $('#bar_code').val('');
                            // $('#d_wt').val('');
                            // $('#shape_id').val('');
                        } else {
                            alert("Please, Fill all the fields!");
                        }
                    }
                });

            }
        </script>
    @endsection
    @include('app')
