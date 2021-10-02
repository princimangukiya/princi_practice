@section('page-title')
    Rate Master
@endsection

@section('content')
    <style>
        td.dataTables_empty {
            display: none;
        }

        .hidden {
            display: none;
        }

        .setting {
            padding: 10%;
        }

        .selectInward {
            display: flex;
            padding: 1%;
        }

    </style>
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Outward Master</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Outward List</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
    <!-- Row -->
    <div class="row">
        <div class="col-12">
            <!--div-->
            <div class="card">
                <div class=" card-header">
                    <div id="setting" class="selectInward">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input setting" type="radio" name="inlineRadioOptions" id="year"
                                value="year" checked>
                            <label class="form-check-label form-label" for="Companies">Companies</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input setting" type="radio" name="inlineRadioOptions" id="month"
                                value="month">
                            <label class="form-check-label form-label" for="Manager">Manager</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" id="cal2">
                <div class="card-header">
                    <div class="card-title">Outward Company Generate Pdf</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('Outward.generatePDF') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-md-5" style="padding-right: 50px;">
                                @php
                                    $c_id = session()->get('c_id');
                                    $rate = App\Models\supplier_details::where('c_id', $c_id)->get();
                                @endphp
                                <div class="form-group">
                                    <h4><label class="form-label">Select Company :-</label></h4>
                                    <select id="supplier_id" name="s_id" required class="form-control select2">
                                        <optgroup label="Company">
                                            <option value="" disabled selected>Choose Company</option>
                                            @if (count($rate) > 0)
                                                <option value="">All Outward Report</option>
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
                            <div class="col-md-3" style="display: flex;">
                                <div class="col">
                                    <h4><label class="form-label" style="display: flex; justify-content:start;">Select
                                            Date:- </label></h4>
                                    <input type="date" id="start_date" name="Start_date">
                                </div>
                            </div>
                            <div class="page-rightheader col-md-3">
                                <label for="&nbsp;">&nbsp;</label>
                                <label for="&nbsp;">&nbsp;</label>
                                <button type="submit" style="margin-top:18px;" class="btn btn-info"><i
                                        class="fa fa-print mr-1"></i>
                                    Print Jangad </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card hidden" id="cal3">
                <div class="card-header">
                    <div class="card-title">Outward Manager Generate Pdf</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('Outward.generateManagerPDF') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-md-5" style="padding-right: 50px;">
                                @php
                                    $c_id = session()->get('c_id');
                                    $manager = App\Models\manager_details::where('c_id', $c_id)->get();
                                @endphp
                                <div class="form-group">
                                    <h4><label class="form-label">Select Manager :-</label></h4>
                                    <select id="manager_id" name="m_id" required class="form-control select2">
                                        <optgroup label="Company">
                                            <option value="" disabled selected>Choose Manager</option>
                                            @if (count($manager) > 0)
                                                <option value="">All Outward Report</option>
                                                @foreach ($manager as $value)

                                                    <option value="{{ $value->m_id }}">{{ $value->m_name }}</option>
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
                            <div class="col-md-3" style="display: flex;">
                                <div class="col">
                                    <h4><label class="form-label" style="display: flex; justify-content:start;">Select
                                            Date:- </label></h4>
                                    <input type="date" id="start_date" name="Start_date">
                                </div>
                            </div>
                            <div class="page-rightheader col-md-3">
                                <label for="&nbsp;">&nbsp;</label>
                                <label for="&nbsp;">&nbsp;</label>
                                <button type="submit" style="margin-top:18px;" class="btn btn-info"><i
                                        class="fa fa-print mr-1"></i>
                                    Print Jangad </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <!--div-->
            <div class="card" id="cal">
                <div class="card-header">
                    <div class="card-title">Outward Company Details</div>
                </div>
                <div class="card-body">
                    {{-- <form action="/search_outward_data" method="post">
                        @csrf --}}

                    <div class="row">
                        <div class="col-md-5" style="padding-right: 50px;">
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
                        <div class="col-md-5" style="display: flex;">
                            <div class="col-md-6">
                                <div class="col">
                                    <h4><label class="form-label" style="display: flex; justify-content: start;">Select
                                            Start
                                            Date:- </label></h4>
                                    <input type="date" id="Start_date" name="Start_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col">
                                    <h4><label class="form-label" style="display: flex; justify-content: start;">Select
                                            End
                                            Date:- </label></h4>
                                    <input type="date" id="End_date" name="End_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding: 15px;">
                            <button type="submit" id="addData" name="addData" onClick="addData()"
                                class="btn  btn-primary">Serch</button>
                        </div>
                    </div>
                    {{-- </form> --}}
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
                                                {{ $value->price }}
                                            </td>
                                            <td>
                                                {{ date('d-m-Y', strtotime($value->bill_date)) }}
                                            </td>
                                            <td>
                                                {{ date('d-m-Y', strtotime($value->updated_at)) }}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card hidden" id="cal1">
                <div class="card-header">
                    <div class="card-title">Outward Manager Details</div>
                </div>
                <div class="card-body">
                    {{-- <form action="/search_outward_data" method="post">
                        @csrf --}}

                    <div class="row">
                        <div class="col-md-5" style="padding-right: 50px;">
                            <div class="form-group">
                                <h4><label class="form-label">Select Manager :-</label></h4>
                                <select id="m_id" name="m_id" required class="form-control select2">
                                    <optgroup label="Company">
                                        <option value="" disabled selected>Choose Manager</option>
                                        @if (count($manager) > 0)
                                            @foreach ($manager as $value)
                                                <option value="{{ $value->m_id }}">{{ $value->m_name }}</option>
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
                        <div class="col-md-5" style="display: flex;">
                            <div class="col-md-6">
                                <div class="col">
                                    <h4><label class="form-label" style="display: flex; justify-content: start;">Select
                                            Start
                                            Date:- </label></h4>
                                    <input type="date" id="Start_date" name="Start_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col">
                                    <h4><label class="form-label" style="display: flex; justify-content: start;">Select
                                            End
                                            Date:- </label></h4>
                                    <input type="date" id="End_date" name="End_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding: 15px;">
                            <button type="submit" id="addData" name="addData" onClick="showManager()"
                                class="btn  btn-primary">Serch</button>
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
                <div class="card-body">
                    <div>
                        <div class="table-responsive">
                            <table id="managerDataTabel" class="table table-bordered text-nowrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">Manager Name</th>
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
                                    @foreach ($outward_manager as $key => $value)


                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $value->m_name }}
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
                                                {{ $value->price }}
                                            </td>
                                            <td>
                                                {{ date('d-m-Y', strtotime($value->created_at)) }}
                                            </td>
                                            <td>
                                                {{ date('d-m-Y', strtotime($value->deleted_at)) }}
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
    <script>
        var inputs = document.getElementsByClassName('setting'),
            setting;

        for (var i = 0; i < inputs.length; i++) {
            var el = inputs[i];
            el.addEventListener('change', function() {
                defineSetting(this.value);
            })
        }

        function defineSetting(setting) {
            if (setting == 'year') {
                document.getElementById("cal").classList.remove('hidden');
                document.getElementById("cal1").classList.add('hidden');
            } else {
                document.getElementById("cal").classList.add('hidden');
                document.getElementById("cal1").classList.remove('hidden');
            }
            if (setting == 'year') {
                document.getElementById("cal2").classList.remove('hidden');
                document.getElementById("cal3").classList.add('hidden');
            } else {
                document.getElementById("cal2").classList.add('hidden');
                document.getElementById("cal3").classList.remove('hidden');
            }
        }
        var id, mytable;
        $(document).ready(function() {
            mytable = $('#example').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip',
            });
        });

        $(document).ready(function() {
            managerTabel = $('#managerDataTabel').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip',
            });
        });

        function addData() {
            var s_id = $('#s_id').val();
            var Start_date = $('#Start_date').val();
            var End_date = $('#End_date').val();
            var count = 1;
            var table = $('#example').DataTable();
            table.clear().draw({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip',
            });
            // alert(barcode);
            // alert(m_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '{{ route('Outward.search_data') }}',
                data: {
                    's_id': s_id,
                    'Start_date': Start_date,
                    'End_date': End_date,
                },
                dataType: 'json',
                success: function(response_msg) {
                    // alert(response_msg.success);
                    console.log(response_msg);
                    // if (response_msg.data == null) {
                    //     alert('controller Succesfully Called !!!!!');
                    // }
                    if (response_msg.success) {

                        // $("#p_gst_id").val(bill_no);
                        const length = Object.keys(response_msg.success).length;
                        // console.log(response_msg.success.length);
                        // $('#example tbody').empty();

                        response_msg.success.forEach(success => {
                            $("#example").append(
                                '<tr>' +
                                '<td>' + count + '</td>' +
                                '<td>' + success.s_name + '</td>' +
                                '<td>' + success.d_barcode + '</td>' +
                                '<td>' + success.shape_name + '</td>' +
                                '<td>' + success.d_wt + '</td>' +
                                '<td>' + success.d_n_wt + '</td>' +
                                '<td>' + success.price + '</td>' +
                                '<td>' + moment(success.bill_date).format('DD-MM-YYYY') + '</td>' +
                                '<td>' + moment(success.updated_at).format('DD-MM-YYYY') + '</td>' +
                                '</tr>'
                            );
                            count = count + 1;
                        });
                        console.log(response_msg.success.length);
                    }

                }
            });


            // alert('hii');
        }

        function showManager() {
            var s_id = $('#m_id').val();
            var Start_date = $('#Start_date').val();
            var End_date = $('#End_date').val();
            var count = 1;
            var managerTabel = $('#managerDataTabel').DataTable();
            managerTabel.clear().draw({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip',
            });
            // alert(barcode);
            // alert(m_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '{{ route('Outward.search_data_manager') }}',
                data: {
                    's_id': s_id,
                    'Start_date': Start_date,
                    'End_date': End_date,
                },
                dataType: 'json',
                success: function(response_msg) {
                    // alert(response_msg.success);
                    console.log(response_msg);
                    // if (response_msg.data == null) {
                    //     alert('controller Succesfully Called !!!!!');
                    // }
                    if (response_msg.success) {

                        // $("#p_gst_id").val(bill_no);
                        const length = Object.keys(response_msg.success).length;
                        // console.log(response_msg.success.length);
                        // $('#managerDataTabel tbody').empty();

                        response_msg.success.forEach(success => {

                            $("#managerDataTabel").append(
                                '<tr>' +
                                '<td>' + count + '</td>' +
                                '<td>' + success.m_name + '</td>' +
                                '<td>' + success.d_barcode + '</td>' +
                                '<td>' + success.shape_name + '</td>' +
                                '<td>' + success.d_wt + '</td>' +
                                '<td>' + success.d_n_wt + '</td>' +
                                '<td>' + success.price + '</td>' +
                                '<td>' + moment(success.created_at).format('DD-MM-YYYY') + '</td>' +
                                '<td>' + moment(success.updated_at).format('DD-MM-YYYY') + '</td>' +
                                '</tr>'
                            );
                            count = count + 1;

                        });
                        console.log(response_msg.success.length);
                    }

                }
            });


            // alert('hii');
        }
    </script>
    <script src="{{ asset('assets/vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script>

@endsection
@include('app')
