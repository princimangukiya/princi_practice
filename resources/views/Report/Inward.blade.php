@section('page-title') Rate Master @endsection @section('content')
<style>
    .dataTables_empty {
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
        <h4 class="page-title mb-0">Inward Master</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Inward List</a></li>
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
                <div class="card-title">Inward Company Generate Pdf</div>
            </div>
            <div class="card-body">
                <form action="{{ route('Inward.generatePDF') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-3" style="padding-right: 0px;">
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
                                            <option value="">All Inward Report</option>
                                            @foreach ($rate as $value)
                                                <option value="{{ $value->s_id }}">{{ $value->s_name }}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select> @error('s_id')
                                    <small class="errorTxt1">
                                        <div id="title-error" class="error" style="margin-left:3rem">
                                            {{ $message }}
                                        </div>
                                </small> @enderror
                            </div>
                        </div>
                        <div class="col-md-9" style="display: flex;">
                            <div class="col-md-4">
                                <div class="col">
                                    <h4><label class="form-label"
                                            style="display: flex; justify-content:start;">Select
                                            Start
                                            Date:- </label></h4>
                                    <input type="date" id="start_date" name="Start_date" style="padding: 5px;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col">
                                    <h4><label class="form-label"
                                            style="display: flex; justify-content:start;">Select
                                            End
                                            Date:- </label></h4>
                                    <input type="date" id="end_date" name="End_date" style="padding: 5px;">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="col">
                                    <label class="form-label" for="&nbsp;">&nbsp;</label>
                                    <button type="submit" class="btn btn-info" style="padding: 5px;"><i
                                            class="fa fa-download mr-1"></i>
                                        Downloade PDF </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card  hidden" id="cal3">
            <div class="card-header">
                <div class="card-title">Inward Manager Generate Pdf</div>
            </div>
            <div class="card-body">
                <form action="{{ route('Inward.generateManagerPDF') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
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
                                            <option value="">All Inward Report</option>
                                            @foreach ($manager as $value)
                                                <option value="{{ $value->m_id }}">{{ $value->m_name }}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select> @error('m_id')
                                    <small class="errorTxt1">
                                        <div id="title-error" class="error" style="margin-left:3rem">
                                            {{ $message }}
                                        </div>
                                </small> @enderror
                            </div>
                        </div>
                        <div class="col-md-9" style="display: flex;">
                            <div class="col-md-4">
                                <div class="col">
                                    <h4><label class="form-label"
                                            style="display: flex; justify-content:start;">Select
                                            Start
                                            Date:- </label></h4>
                                    <input type="date" id="start_date" name="Start_date_manager" style="padding: 5px;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col">
                                    <h4><label class="form-label"
                                            style="display: flex; justify-content:start;">Select
                                            End
                                            Date:- </label></h4>
                                    <input type="date" id="end_date" name="End_date_manager" style="padding: 5px;">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="col">
                                    <label class="form-label" for="&nbsp;">&nbsp;</label>
                                    <button type="submit" class="btn btn-info" style="padding: 5px;"><i
                                            class="fa fa-download mr-1"></i>
                                        Downloade PDF </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card" id="cal">
            <div class="card-header">
                <div class="card-title">Inward Company Details</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">

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
                            </select> @error('s_id')
                                <small class="errorTxt1">
                                    <div id="title-error" class="error" style="margin-left:3rem">
                                        {{ $message }}
                                    </div>
                            </small> @enderror
                        </div>
                    </div>
                    <div class="col-md-8" style="display: flex;">
                        <div class="col-md-5">
                            <div class="col">
                                <h4><label class="form-label" style="display: flex; justify-content:start;">Select
                                        Start Date:- </label></h4>
                                <input type="date" id="Start_date" name="Start_date" style="padding: 5px;">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="col">
                                <h4><label class="form-label" style="display: flex; justify-content:start;">Select
                                        End Date:- </label></h4>
                                <input type="date" id="End_date" name="End_date" style="padding: 5px;">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="col">
                                <label class="form-label" for="&nbsp;">&nbsp;</label>
                                <button type="submit" id="addData" name="addData" onClick="showCompanyData()"
                                    class="btn  btn-primary" style="padding: 5px 12px;">Serch</button>
                            </div>
                        </div>
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
                                    <th class="border-bottom-0">Buy_date</th>
                                </tr>
                            </thead>
                            <tbody id="showPurchaseTh">
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
                                            {{ date('d-m-Y', strtotime($value->bill_date)) }}
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
                <div class="card-title">Inward Manager Details</div>
            </div>
            <div class=" card-body">
                <div class="row" id="cal">
                    <div class="col-md-4">
                        <div class="form-group">
                            <h4><label class="form-label">Select Manager :-</label></h4>
                            <select id="m_id" name="m_id" required class="form-control select2">
                                <optgroup label="Manager">
                                    <option value="" disabled selected>Choose Manager</option>
                                    @if (count($manager) > 0)
                                        @foreach ($manager as $value)

                                            <option value="{{ $value->m_id }}">{{ $value->m_name }}</option>
                                        @endforeach
                                    @endif
                                </optgroup>
                            </select> @error('m_id')
                                <small class="errorTxt1">
                                    <div id="title-error" class="error" style="margin-left:3rem">
                                        {{ $message }}
                                    </div>
                            </small> @enderror
                        </div>
                    </div>
                    <div class="col-md-8" style="display: flex;">
                        <div class="col-md-5">
                            <div class="col">
                                <h4><label class="form-label" style="display: flex; justify-content:start;">Select
                                        Start
                                        Date:- </label></h4>
                                <input type="date" id="Start_date" name="Start_date" style="padding: 5px;">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="col">
                                <h4><label class="form-label" style="display: flex; justify-content:start;">Select
                                        End
                                        Date:- </label></h4>
                                <input type="date" id="End_date" name="End_date" style="padding: 5px;">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="col">
                                <label class="form-label" for="&nbsp;">&nbsp;</label>
                                <button type="submit" id="addData" name="addData" onClick="showManagerData()"
                                    class="btn  btn-primary" style="padding: 5px 12px;">Serch</button>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <th class="border-bottom-0">Buy_date</th>
                                </tr>
                            </thead>
                            <tbody id="showPurchaseTh">
                                @foreach ($inward_manager as $key => $value)
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
                                            {{ date('d-m-Y', strtotime($value->bill_date)) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->
</div>
</div>
<!-- end app-content-->
</div>

<script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
{{-- <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script> --}}
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
    $(document).ready(function() {
        managerTabel = $('#managerDataTabel').DataTable({
            "autoWidth": false,
            "info": true,
            "paging": true,
            "lengthChange": false,
            "sDom": 'lfrtip',
            "ordering": true,
            "searching": true,

        });
    });
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

    // var id, mytable;

    function showCompanyData() {
        // alert("hello");
        var s_id = $('#s_id').val();
        var Start_date = $('#Start_date').val();
        var End_date = $('#End_date').val();
        var count = 1;
        var mytable = $('#example').DataTable();
        mytable.clear().draw({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "sDom": 'lfrtip',
        });
        // alert(barcode);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{{ route('Inward.search_data') }}',
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
                        count + 1;
                        $("#example").append(
                            '<tr>' +
                            '<td>' + count + '</td>' +
                            '<td>' + success.s_name + '</td>' +
                            '<td>' + success.d_barcode + '</td>' +
                            '<td>' + success.shape_name + '</td>' +
                            '<td>' + success.d_wt + '</td>' +
                            '<td>' + success.d_n_wt + '</td>' +
                            '<td>' + moment(success.bill_date).format('DD-MM-YYYY') + '</td>' +
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

    function showManagerData() {
        // alert("hello");
        var m_id = $('#m_id').val();
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{{ route('Inward.search_data_manager') }}',
            data: {
                'm_id': m_id,
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

                        $("#managerDataTabel").append(
                            '<tr>' +
                            '<td>' + count + '</td>' +
                            '<td>' + success.m_name + '</td>' +
                            '<td>' + success.d_barcode + '</td>' +
                            '<td>' + success.shape_name + '</td>' +
                            '<td>' + success.d_wt + '</td>' +
                            '<td>' + success.d_n_wt + '</td>' +
                            '<td>' + moment(success.bill_date).format('DD-MM-YYYY') + '</td>' +
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
@endsection
@include('app')
