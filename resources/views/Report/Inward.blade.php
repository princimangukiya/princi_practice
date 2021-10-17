@include('header_css')
@extends('app')
@section('page-title')
    Inward Details
@endsection
@section('content')
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

        .btn {
            align-items: center;
            background: 400;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            display: inline-flex;
            height: 36px;
            justify-content: center;
            min-width: 90px;
        }

        .btn.btn--loading {
            font-size: 0;
        }

        .btn.btn--loading span {
            display: flex;
        }

        .btn.btn--loading span b {
            animation-direction: alternate;
            animation-duration: 0.5s;
            animation-fill-mode: none;
            animation-iteration-count: infinite;
            animation-name: stretch;
            animation-play-state: running;
            animation-timing-function: ease-out;
            border-radius: 100%;
            display: block;
            height: 10px;
            margin: 0 1px;
            width: 10px;
            animation-delay: 0.1s;
            margin: 0 5px;
        }

        .btn.btn--loading span b:first-child {
            animation-delay: 0s;
            margin: 0;
        }

        .btn.btn--loading span b:last-child {
            animation-delay: 0.2s;
            margin: 0;
        }

        .btn b {
            font-weight: normal;
        }

        .btn span {
            display: none;
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
    <div class="row" id="loader">
        <div class="col-12">
            <!--div-->
            <div class="card">
                <div class=" card-header">
                    <div class="col-xl-4 mt-4 mt-xl-0">
                        <div class="form-group">
                            <div id="setting" class="custom-controls-stacked"
                                style="display: flex; justify-content:space-around;">
                                <label class="custom-control custom-radio custom-control-md">
                                    <input type="radio" class="custom-control-input form-check-input setting"
                                        name="companyTabel-radios1" value="year" id="year" checked>
                                    <span class="custom-control-label custom-control-label-md">Companies</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-md">
                                    <input type="radio" id="month" class="custom-control-input form-check-input setting"
                                        name="companyTabel-radios1" value="month">
                                    <span class="custom-control-label custom-control-label-md">Manager</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="selectInward">
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
                </div> --}}
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
                                    $rate = App\Models\supplier_details::where([['c_id', $c_id], ['status', 1]])->get();
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
                                        <button type="submit" class="btn btn-info" style="padding: 5px;"><a
                                                class="btn">
                                                <span>
                                                    <b></b>
                                                    <b></b>
                                                    <b></b>
                                                </span>
                                                <i class="fa fa-download mr-1"></i>
                                                Downloade PDF</a> </button>

                                        <script>
                                            $('.btn').on('click', function() {
                                                $(this).addClass('btn--loading');
                                                setTimeout(() => {
                                                    $(this).removeClass('btn--loading');
                                                }, 14000);
                                            });
                                        </script>
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
                                        <button type="submit" class="btn btn-info" style="padding: 5px;"
                                            onclick="loading()"><i class="fa fa-download mr-1"></i>
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
                                            <option value="">All Company</option>
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
                            <table id="companyTabel" class="table table-bordered text-nowrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">Company Name</th>
                                        <th class="border-bottom-0">Barcode_Id</th>
                                        <th class="border-bottom-0">Shape</th>
                                        <th class="border-bottom-0">Old_Weight</th>
                                        {{-- <th class="border-bottom-0">New_Weight</th> --}}
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
                                            {{-- <td>
                                                {{ $value->d_n_wt }}
                                            </td> --}}
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
                                <select id="m_Id" name="m_id" required class="form-control select2">
                                    <optgroup label="Manager">
                                        <option value="" disabled selected>Choose Manager</option>
                                        @if (count($manager) > 0)
                                            <option value="">All Manager</option>
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
                                    <input type="date" id="Start_date_Manager" name="Start_date" style="padding: 5px;">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="col">
                                    <h4><label class="form-label" style="display: flex; justify-content:start;">Select
                                            End
                                            Date:- </label></h4>
                                    <input type="date" id="End_date_Manager" name="End_date" style="padding: 5px;">
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
                                        {{-- <th class="border-bottom-0">New_Weight</th> --}}
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
                                            {{-- <td>
                                                {{ $value->d_n_wt }}
                                            </td> --}}
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


    <div id="global-loader">
        <img src="{{ asset('assets/images/svgs/loader.svg') }}" alt="loader">
    </div>
    <!-- /Row -->
    </div>
    </div>
    <!-- end app-content-->
    </div>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script> --}}
    <script>
        var preloader_button = document.getElementById('activate-preloader'),
            preloader = document.getElementById('preloader'),
            activated = false;

        preloader_button.addEventListener('click', animate_preloader);


        function animate_preloader() {
            if (activated) {
                preloader.classList.remove('preloader-active');
                preloader.classList.add('preloader-inactive');
                this.innerHTML = 'Activate Preloader';
                activated = false;
            } else {
                preloader.classList.remove('preloader-inactive');
                preloader.classList.add('preloader-active');
                this.innerHTML = 'Deactivate Preloader';
                activated = true;
            }
        }
    </script>
    <script>
        // $(window).load(function() {
        //     $("#preloaders").fadeOut(500);
        // });
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
            mytable = $('#companyTabel').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip',

            });
        });

        /*This makes the timeout variable global so all functions can access it.*/
        var timeout;

        /*This is an example function and can be disregarded
        This function sets the loading div to a given string.*/
        function loaded() {
            $('#loading').html('The Ajax Call Data');
        }

        function startLoad() {
            /*This is the loading gif, It will popup as soon as startLoad is called*/
            $('#loading').html('<img src="{{ asset('assets/images/svgs/loader.svg') }}" alt="loader"/>');
            /*
            This is an example of the ajax get method, 
            You would retrieve the html then use the results
            to populate the container.
            
            $.get('example.php', function (results) {
                $('#loading').html(results);
            });
            */
            /*This is an example and can be disregarded
            The clearTimeout makes sure you don't overload the timeout variable
            with multiple timout sessions.*/
            clearTimeout(timeout);
            /*Set timeout delays a given function for given milliseconds*/
            timeout = setTimeout(loaded, 150000);
        }
        /*This binds a click event to the refresh button*/
        $('#start_call').click(startLoad);
        /*This starts the load on page load, so you don't have to click the button*/
        startLoad();
        // var id, mytable;

        function showCompanyData() {
            // alert("hello");
            var s_id = $('#s_id').val();
            var Start_date = $('#Start_date').val();
            var End_date = $('#End_date').val();
            var count = 1;
            var mytable = $('#companyTabel').DataTable();
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
                        // $('#companyTabel tbody').empty();

                        response_msg.success.forEach(success => {
                            count + 1;
                            $("#companyTabel").append(
                                '<tr>' +
                                '<td>' + count + '</td>' +
                                '<td>' + success.s_name + '</td>' +
                                '<td>' + success.d_barcode + '</td>' +
                                '<td>' + success.shape_name + '</td>' +
                                '<td>' + success.d_wt + '</td>' +
                                // '<td>' + success.d_n_wt + '</td>' +
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
            var m_id = $('#m_Id').val();
            var Start_date_Manager = $('#Start_date_Manager').val();
            var End_date_Manager = $('#End_date_Manager').val();
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
            // alert(m_id);
            // alert(Start_date_Manager);
            // alert(End_date_Manager);

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
                    'Start_date': Start_date_Manager,
                    'End_date': End_date_Manager,
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
                        // $('#companyTabel tbody').empty();

                        response_msg.success.forEach(success => {

                            $("#managerDataTabel").append(
                                '<tr>' +
                                '<td>' + count + '</td>' +
                                '<td>' + success.m_name + '</td>' +
                                '<td>' + success.d_barcode + '</td>' +
                                '<td>' + success.shape_name + '</td>' +
                                '<td>' + success.d_wt + '</td>' +
                                // '<td>' + success.d_n_wt + '</td>' +
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
@include('footer_js')
