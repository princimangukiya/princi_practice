 @extends('app')
 @section('page-title')
     Outward Details
 @endsection

 @section('content')
     <style>
         .dataTables_empty {
             display: none;
         }

         .hidden {
             display: none;
         }

     </style>
     <div class="page-header">
         <div class="page-leftheader">
             <h4 class="page-title mb-0">Outward Master</h4>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href=""><i class="fe fe-layout mr-2 fs-14"></i>Outward Master</a></li>
                 <li class="breadcrumb-item active" aria-current="page"><a href="">Outward List</a></li>
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
                     {{-- <div id="setting" class="selectInward">
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
                     <div class="card-title">Outward Company Generate Pdf</div>
                 </div>
                 <div class="card-body">
                     <form action="{{ route('Outward.generatePDF') }}" method="get">
                         @csrf
                         <div class="row">
                             <div class="col-md-4">
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
                             <div class="col-md-8" style="display: flex;">
                                 <div class="col-md-5" style="display: flex;">
                                     <div class="col">
                                         <h4><label class="form-label"
                                                 style="display: flex; justify-content:start;">Select
                                                 Date:- </label></h4>
                                         <input type="date" id="start_date" name="Start_date" style="padding:5px;">
                                     </div>
                                 </div>
                                 <div class="col-md-5" style="display: flex;">
                                     <div class="col">
                                         <h4><label class="form-label"
                                                 style="display: flex; justify-content:start;">Select
                                                 Date:- </label></h4>
                                         <input type="date" id="end_date" name="End_date" style="padding:5px;">
                                     </div>
                                 </div>
                                 <div class="page-rightheader col-md-2">
                                     <div class="col">
                                         <label class="form-label" for="&nbsp;">&nbsp;</label>
                                         <a class="supplier_button">
                                             <button type="submit" id="text" class="btn btn-info" style="padding: 5px;">
                                                 <i class="fa fa-download mr-1"></i>Print
                                             </button></a>
                                         <div id="annimation" class="spinner4 hidden">
                                             <div class="bounce1"></div>
                                             <div class="bounce2"></div>
                                             <div class="bounce3"></div>
                                         </div>
                                     </div>
                                 </div>
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
                             <div class="col-md-4">
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
                             <div class="col-md-8" style="display: flex;">
                                 <div class="col-md-5" style="display: flex;">
                                     <div class="col">
                                         <h4><label class="form-label"
                                                 style="display: flex; justify-content:start;">Select
                                                 Date:- </label></h4>
                                         <input type="date" id="start_date" name="Start_date" style="padding:5px;">
                                     </div>
                                 </div>
                                 <div class="col-md-5" style="display: flex;">
                                     <div class="col">
                                         <h4><label class="form-label"
                                                 style="display: flex; justify-content:start;">Select
                                                 Date:- </label></h4>
                                         <input type="date" id="End_date" name="End_date" style="padding:5px;">
                                     </div>
                                 </div>
                                 <div class="page-rightheader col-md-2">
                                     <label class="form-label" for="&nbsp;">&nbsp;</label>
                                     <a class="manager_button">
                                         <button type="submit" id="textMnager" class="btn btn-info" style="padding: 5px;">
                                             <i class="fa fa-download mr-1"></i>Print
                                         </button></a>
                                     <div id="annimationManager" class="spinner4 hidden">
                                         <div class="bounce1"></div>
                                         <div class="bounce2"></div>
                                         <div class="bounce3"></div>
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
             <!--div-->
             <div class="card" id="cal">
                 <div class="card-header">
                     <div class="card-title">Outward Company Details</div>
                 </div>
                 <div class="card-body">
                     {{-- <form action="/search_outward_data" method="post">
                        @csrf --}}

                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <h4><label class="form-label">Select Company :-</label></h4>
                                 <select id="s_id" name="supplier_id" required class="form-control select2">
                                     <optgroup label="Company">
                                         <option value="" disabled selected>Choose Company</option>
                                         @if (count($rate) > 0)
                                             <option value="">All Supplier</option>
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
                         <div class="col-md-8" style="display: flex;">
                             <div class="col-md-5">
                                 <div class="col">
                                     <h4><label class="form-label" style="display: flex; justify-content: start;">Select
                                             Start
                                             Date:- </label></h4>
                                     <input type="date" id="Start_date" name="Start_date" style="padding: 5px;">
                                 </div>
                             </div>
                             <div class="col-md-5">
                                 <div class="col">
                                     <h4><label class="form-label" style="display: flex; justify-content: start;">Select
                                             End
                                             Date:- </label></h4>
                                     <input type="date" id="End_Date_Company" name="End_date" style="padding: 5px;">
                                 </div>
                             </div>
                             <div class="col-md-2">
                                 <div class="col">
                                     <label class="form-label" for="&nbsp;">&nbsp;</label>
                                     <button type="submit" id="addData" name="addData" onClick="addData()"
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
                             <table id="companyTable" class="table table-bordered text-wrap key-buttons">
                                 <thead>
                                     <tr>
                                         <th class="border-bottom-0">#</th>
                                         <th class="border-bottom-0">Company Name</th>
                                         <th class="border-bottom-0">Barcode_Id</th>
                                         <th class="border-bottom-0">Shape</th>
                                         <th class="border-bottom-0">Old Weight</th>
                                         <th class="border-bottom-0">New Weight</th>
                                         <th class="border-bottom-0">Price</th>
                                         <th class="border-bottom-0">Dif Pcs</th>
                                         <th class="border-bottom-0">Buy Date</th>
                                         <th class="border-bottom-0">Sell Date</th>
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
                                             @if ($value->from_where == null)
                                                 <td></td>

                                             @else
                                                 <td class="text-center"><span
                                                         class="badge badge-pill badge-danger mt-2">RR</span></td>
                                             @endif
                                             <td>
                                                 {{ date('d-m-Y', strtotime($value->bill_date)) }}
                                             </td>
                                             <td>
                                                 {{ date('d-m-Y', strtotime($value->return_date)) }}
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
                         <div class="col-md-4">
                             <div class="form-group">
                                 <h4><label class="form-label">Select Manager :-</label></h4>
                                 <select id="m_id" name="m_id" required class="form-control select2">
                                     <optgroup label="Company">
                                         <option value="" disabled selected>Choose Manager</option>
                                         @if (count($manager) > 0)
                                             <option value="">All Manager</option>
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
                         <div class="col-md-8" style="display: flex;">
                             <div class="col-md-5">
                                 <div class="col">
                                     <h4><label class="form-label"
                                             style="display: flex; justify-content: start;">Select
                                             Start
                                             Date:- </label></h4>
                                     <input type="date" id="Start_date_Manager" name="Start_date" style="padding:5px;">
                                 </div>
                             </div>
                             <div class="col-md-5">
                                 <div class="col">
                                     <h4><label class="form-label"
                                             style="display: flex; justify-content: start;">Select
                                             End
                                             Date:- </label></h4>
                                     <input type="date" id="End_date_Manager" name="End_date" style="padding:5px;">
                                 </div>
                             </div>

                             <div class="col-md-2">
                                 <div class="col">
                                     <label class="form-label" for="&nbsp;">&nbsp;</label>
                                     <button type="submit" id="addData" name="addData" onClick="showManager()"
                                         class="btn  btn-primary" style="padding:5px 12px;">Serch</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                     {{-- </form> --}}
                 </div>
                 <div class="card-body">
                     <div>
                         <div class="table-responsive">
                             <table id="managerDataTabel" class="table table-bordered text-wrap key-buttons">
                                 <thead>
                                     <tr>
                                         <th class="border-bottom-0">#</th>
                                         <th class="border-bottom-0">Manager Name</th>
                                         <th class="border-bottom-0">Barcode_Id</th>
                                         <th class="border-bottom-0">Shape</th>
                                         <th class="border-bottom-0">Old Weight</th>
                                         <th class="border-bottom-0">New Weight</th>
                                         <th class="border-bottom-0">Price</th>
                                         <th class="border-bottom-0">Buy Date</th>
                                         <th class="border-bottom-0">Sell Date</th>
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
                                                 {{ date('d-m-Y', strtotime($value->bill_date)) }}
                                             </td>
                                             <td>
                                                 {{ date('d-m-Y', strtotime($value->return_date)) }}
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
         $('.supplier_button').on('click', function() {
             $(this).removeClass('supplier_button');
             document.getElementById("annimation").classList.remove('hidden');
             $("#text").hide();
             $(this).addClass('sk-child');
             setTimeout(() => {
                 $(this).removeClass('sk-child');
                 document.getElementById("annimation").classList.add('hidden');
                 $("#text").show();
                 $(this).addClass('supplier_button');
             }, 6000);
         });

         $('.manager_button').on('click', function() {
             $(this).removeClass('manager_button');
             document.getElementById("annimationManager").classList.remove('hidden');
             $("#textMnager").hide();
             setTimeout(() => {
                 document.getElementById("annimationManager").classList.add('hidden');
                 $("#textMnager").show();
                 $(this).addClass('manager_button');
             }, 4000);
         });
     </script>
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
             mytable = $('#companyTable').DataTable({
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
             var S_id = $('#s_id').val();
             var Start_date = $('#Start_date').val();
             var End_date_Manager = $('#End_Date_Company').val();
             var count = 1;
             var table = $('#companyTable').DataTable();
             var RR = "RR";
             table.clear().draw({
                 "paging": true,
                 "lengthChange": false,
                 "searching": true,
                 "ordering": true,
                 "info": true,
                 "autoWidth": false,
                 "sDom": 'lfrtip',
             });
             // alert(End_date_Manager);
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
                     'S_id': S_id,
                     'Start_date': Start_date,
                     'End_date': End_date_Manager,
                 },
                 dataType: 'json',

                 success: function(response_msg) {
                     console.log(response_msg)
                     if (response_msg.success) {

                         const length = Object.keys(response_msg.success).length;

                         response_msg.success.forEach(success => {
                             count + 1;
                             if (success.status == 0) {
                                 RR = '<span class="badge badge-pill badge-danger mt-2">' + "RR" +
                                     '</span>';
                             } else {
                                 RR = " ";
                             }
                             $("#companyTable").append(
                                 '<tr>' +
                                 '<td>' + count + '</td>' +
                                 '<td>' + success.s_name + '</td>' +
                                 '<td>' + success.d_barcode + '</td>' +
                                 '<td>' + success.shape_name + '</td>' +
                                 '<td>' + success.d_wt + '</td>' +
                                 '<td>' + success.d_n_wt + '</td>' +
                                 '<td>' + success.price + '</td>' +
                                 '<td class="text-center">' + RR + '</td>' +
                                 '<td>' + moment(success.bill_date).format('DD-MM-YYYY') +
                                 '</td>' +
                                 '<td>' + moment(success.return_date).format('DD-MM-YYYY') +
                                 '</td>' +
                                 '</tr>'
                             );
                             count = count + 1;
                         });
                     }

                 }
             });
         }

         function showManager() {
             var m_id = $('#m_id').val();
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
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $.ajax({
                 type: 'GET',
                 url: '{{ route('Outward.search_data_manager') }}',
                 data: {
                     'm_id': m_id,
                     'Start_date': Start_date_Manager,
                     'End_date': End_date_Manager,
                 },
                 dataType: 'json',
                 success: function(response_msg) {
                     if (response_msg.success) {
                         console.log(response_msg.success);
                         const length = Object.keys(response_msg.success).length;

                         response_msg.success.forEach(success => {
                             count + 1;
                             $("#managerDataTabel").append(
                                 '<tr>' +
                                 '<td>' + count + '</td>' +
                                 '<td>' + success.m_name + '</td>' +
                                 '<td>' + success.d_barcode + '</td>' +
                                 '<td>' + success.shape_name + '</td>' +
                                 '<td>' + success.d_wt + '</td>' +
                                 '<td>' + success.d_n_wt + '</td>' +
                                 '<td>' + success.price + '</td>' +
                                 '<td>' + moment(success.bill_date).format('DD-MM-YYYY') + '</td>' +
                                 '<td>' + moment(success.return_date).format('DD-MM-YYYY') +
                                 '</td>' +
                                 '</tr>'
                             );
                             count = count + 1;

                         });
                         console.log(response_msg.success.length);
                     }

                 }
             });
         }
     </script>
     <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
     {{-- <!-- <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script> --> --}}

 @endsection
