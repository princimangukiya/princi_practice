@section('page-title')
    Diamond Return
@endsection

@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Diamond Return From Manager</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Diamond Return From Manager List</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
    <!-- Row -->
    <div class="card" style="padding: 20px;">
        <div class="card-header">
            <div class="card-title">Return From Manager</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <h4><label class="form-label" style="padding-top: 10px">Select Manager :-</label></h4>
                    <select id="m_id" name="m_id" required class="form-control select2">
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
            <div class="col-sm-6 col-md-6">
                <div class=" form-group">
                    <label class="form-label" style="padding-top: 10px">BarCode Value </label>
                    <input id="bar_code" type="text" name="bar_code" class="form-control inputField"
                        value="{{ old('bar_code') }}" onchange="fetchData()" placeholder="Enter Bar Code" autofocus>
                    @error('bar_code')
                        <small class="errorTxt1">
                            <div id="title-error" class="error" style="margin-left:3rem">
                                {{ $message }}
                            </div>
                        </small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="form-label">Old Weight </label>
                    <div style="display: flex;">
                        <input id="d_wt" type="text" name="d_wt" class="form-control" value=""
                            placeholder="Enter New Weight" readonly="readonly">
                        @error('bar_code')
                            <small class="errorTxt1">
                                <div id="title-error" class="error" style="margin-left:3rem">
                                    {{ $message }}
                                </div>
                            </small>
                        @enderror

                    </div>
                </div>
            </div>
            <div class="col-sm-6  col-md-6">
                <div class="form-group">
                    <label class="form-label">Price </label>
                    <div style="display: flex;">
                        <input id="price" type="text" name="price" class="form-control" value=""
                            placeholder="Enter New Weight">
                        @error('bar_code')
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

        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="form-label">Enter New Weight :- </label>
                    <div style="display: flex;">
                        <input id="d_n_wt" type="text" name="d_n_wt" class="form-control inputField" value="0."
                            placeholder="Enter New Weight">
                        @error('bar_code')
                            <small class="errorTxt1">
                                <div id="title-error" class="error" style="margin-left:3rem">
                                    {{ $message }}
                                </div>
                            </small>
                        @enderror

                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Date :- </label>
                    <div style="display: flex;">
                        <input id="date" type="text" name="date" class="form-control" value="{{ old('date') }}"
                            placeholder="Date">
                        @error('bar_code')
                            <small class="errorTxt1">
                                <div id="title-error" class="error" style="margin-left:3rem">
                                    {{ $message }}
                                </div>
                            </small>
                        @enderror

                    </div>
                </div>
            </div> --}}
        </div>
        <div class="card-footer text-right" style="padding-right: 10% ">
            <button type="submite" id="addTOManager" name="addTOManager" onClick="addTOManager('hello')"
                class="btn  btn-primary">Submit</button>
            <a href="/manager" class="btn btn-danger">Cancle</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Return Daimond Details</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tblItemShow" class="table table-bordered text-nowrap key-buttons">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">Manager Name</th>
                            <th class="border-bottom-0">Bar Code</th>
                            <th class="border-bottom-0">Old Weight</th>
                            <th class="border-bottom-0">Price</th>
                            <th class="border-bottom-0">New Weight</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    </div>
    <!--/div-->

    <!-- /Row -->
    <div class="row">



        <script src="{{ asset('T3_Admin_Design/assets/js/quagga.min.js') }}"></script>
        <script src="{{ asset('T3_Admin_Design/assets/js/jquery.js') }}"></script>

        <script>
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
                        addTOManager();
                    }
                }
            });
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
        </script>
        <script>
            function addTOManager(id) {
                // alert(id);
                var barcode = $('#bar_code').val();
                var m_id = $('#m_id').val();
                var price = $('#price').val();
                var d_wt = $('#d_wt').val();
                var d_n_wt = $('#d_n_wt').val();
                var manager_name = $('#m_id').find(":selected").text();
                // alert(barcode);
                // alert(m_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('ready_stock.store') }}',
                    data: {
                        'bar_code': barcode,
                        'm_id': m_id,
                        'd_wt': d_wt,
                        'price': price,
                        'd_n_wt': d_n_wt
                    },
                    dataType: 'json',
                    success: function(response_msg) {
                        // alert(response_msg.success);
                        if (response_msg.success == 200) {
                            alert("Please, choose the right manager!");
                            //location.reload();
                        } else if (response_msg.success == true) {
                            mytable.row.add([manager_name, barcode, d_wt, price, d_n_wt]);
                            mytable.draw();
                            $('#bar_code').val('');
                            $('#price').val('');
                            $('#d_wt').val('');
                            $('#d_n_wt').val('');
                            $('#bar_code').focus();
                        } else if (response_msg.success == 403) {
                            alert('Something Went Wrong!');
                        } else if (response_msg.success == 404) {
                            alert('Your Barcode is not valid!');
                        } else {
                            alert('Please, Fill all the fields!');
                        }

                    }
                });
            }

            function fetchData(id) {
                var data = new Array();
                var barcode = $('#bar_code').val();
                var m_id = $('#m_id').val();
                var d_n_wt = $('#d_n_wt').val();
                var manager_name = $('#m_id').find(":selected").text();
                // alert(barcode);
                // alert(m_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '{{ route('ready_stock.fetchData') }}',
                    data: {
                        'bar_code': barcode,
                    },
                    dataType: 'json',
                    success: function(response_msg) {
                        // alert(response_msg.success);
                        // console.log(response_msg);

                        if (response_msg.success) {
                            console.log(response_msg.success.d_wt);
                            console.log(response_msg.success.price);
                            $('#d_wt').val(response_msg.success.d_wt);
                            $('#price').val(response_msg.success.price);
                        } else {
                            alert("Please, Enter Valid Barcode Number");
                        }

                    }
                });
            }
        </script>

    @endsection
    @include('app')
