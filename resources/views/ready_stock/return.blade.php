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
            <div class="col-sm-6 col-md-6" style="display: flex;">
                <div class="col-sm-8 col-sm-8">
                    <div class="form-group">
                        <label class="form-label" style="padding-top: 10px">BarCode Value </label>
                        <input id="bar_code" type="text" name="bar_code" class="form-control"
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
                <div class="col-sm-4 col-md-4">
                    <div class="form-group" style="padding: 36px">
                        <button id="addTOManager" name="addTOManager" onClick="addTOManager('hello')"
                            class="btn  btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Old Weight </label>
                    <div style="display: flex;">
                        <input id="d_n_wt" type="text" name="d_n_wt" class="form-control" value="{{ old('d_n_wt') }}"
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
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Price </label>
                    <div style="display: flex;">
                        <input id="d_n_wt" type="text" name="d_n_wt" class="form-control" value="{{ old('d_n_wt') }}"
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
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Enter New Weight :- </label>
                    <div style="display: flex;">
                        <input id="d_n_wt" type="text" name="d_n_wt" class="form-control" value="{{ old('d_n_wt') }}"
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

        <div class="card-body">
            <div class="table-responsive">
                <table id="tblItemShow" class="table table-bordered text-nowrap key-buttons">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">Manager Name</th>
                            <th class="border-bottom-0">Bar Code</th>
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
                        'd_n_wt': d_n_wt
                    },
                    dataType: 'json',
                    success: function(response_msg) {
                        // alert(response_msg.success);
                        if (response_msg.success == 200) {
                            alert("Please, choose the right manager!");
                            //location.reload();
                        } else if (response_msg.success == true) {
                            mytable.row.add([manager_name, barcode]);
                            mytable.draw();
                            $('#bar_code').val('');
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
        </script>

    @endsection
    @include('app')
