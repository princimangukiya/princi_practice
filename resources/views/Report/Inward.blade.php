@section('page-title')
    Rate Master
@endsection
@section('content')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
    <style>
        div.dataTables_wrapper {
            width: 800px;
            margin: 0 auto;
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

                <div class="dataTables_wrapper">

                    <table border="0" cellspacing="5" cellpadding="5">
                        <tbody>
                            <tr>
                                <td>Minimum date:</td>
                                <td><input type="text" id="min" name="min"></td>
                            </tr>
                            <tr>
                                <td>Maximum date:</td>
                                <td><input type="text" id="max" name="max"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="companyTabel"
                        class="table table-bordered text-wrap key-buttons display nowrap display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="
                border-bottom-0">#</th>
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
                                        {{ date('Y/M/d', strtotime($value->bill_date)) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#companyTabel').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip',
            });
        });
        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                // alert("fun called...");
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[6]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });

            // DataTables initialisation
            var table = $('#companyTabel').DataTable();

            // Refilter the table
            $('#min, #max').on('change', function() {
                table.draw();
            });
        });
    </script>
    <script src="{{ asset('assets/vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script>
@endsection
@include('app')
