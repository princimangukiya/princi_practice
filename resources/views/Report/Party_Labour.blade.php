@extends('app')
@section('page-title')
    Party Labour
@endsection

@section('content')
    <style>
        .hidden {
            display: none;
        }

    </style>
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Party Labour</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=""><i class="fe fe-layout mr-2 fs-14"></i>Party Labour</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">Party Labour List</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
    <!-- Row -->
    <div class="row">
        <div class="col-12">
            <!--div-->
            <div class="card" id="cal2">
                <div class="card-header">
                    <div class="card-title">Party Labour Generate Pdf</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('Party_Labour.generatePDF') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
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
                                                <option value="">All Report</option>
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

                                <div class="page-rightheader col-md-4">
                                    <div class="col">
                                        <label class="form-label" for="&nbsp;">&nbsp;</label>
                                        <a class="supplier_button">
                                            <button type="submit" id="text" class="btn btn-info" style="padding: 5px;">
                                                <i class="fe fe-printer mr-2"></i>Downloade PDF
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
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Party Labour Details</div>
                </div>
                <div class="card-body">
                    {{-- <form action="/search_PartyLabour_data" method="post">
                        @csrf --}}
                    <div class="row">
                        <div class="col-md-3">
                            @php
                                $c_id = session()->get('c_id');
                                $rate = App\Models\supplier_details::where('c_id', $c_id)->get();
                            @endphp
                            <div class="form-group">
                                <h4><label class="form-label">Select Company :-</label></h4>
                                <select id="S_id" name="s_id" required class="form-control select2">
                                    <optgroup label="Company">
                                        <option value="" disabled selected>Choose Company</option>
                                        @if (count($rate) > 0)
                                            <option value="">All Company</option>
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
                        <div class="col-md-9" style="display: flex;">
                            <div class="col-md-4">
                                <div class="col">
                                    <h4><label class="form-label" style="display: flex; justify-content:start;">Select
                                            Start
                                            Date:- </label></h4>
                                    <input type="date" id="Start_date" name="Start_date" style="padding: 5px;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col">
                                    <h4><label class="form-label" style="display: flex; justify-content:start;">Select
                                            End
                                            Date:- </label></h4>
                                    <input type="date" id="End_date" name="End_date" style="padding: 5px;">
                                </div>
                            </div>
                            <div class="col-md-4">
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
                {{-- @php
                    echo $Pay_Labour;
                @endphp --}}
                <div class="card-body">
                    <div>

                        <div class="table-responsive">
                            <table id="Party_Tabel" class="table table-bordered text-wrap key-buttons">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">Sizedesc</th>
                                        <th class="border-bottom-0">Pcs</th>
                                        <th class="border-bottom-0">Issue Cts.</th>
                                        <th class="border-bottom-0">Out Cts.</th>
                                        <th class="border-bottom-0">Type</th>
                                        <th class="border-bottom-0">Rate</th>
                                        <th class="border-bottom-0">Labour</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($supplier as $d)
                                        <tr>
                                            @php
                                                $s_id = $d->s_id;
                                            @endphp
                                            <td>
                                                <b>{{ $d->s_name }}</b>
                                                @php
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($rates[$s_id] as $item)
                                                    </br>{{ $item }}
                                                @endforeach
                                                <br><br><b> &nbsp;Total :-</b>

                                            </td>
                                            {{-- <td style="display: flex; justify-content:center; "> --}}
                                            <td>
                                                @php
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($counts[$s_id] as $item)
                                                    </br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>

                                            </td>
                                            <td>
                                                @php
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($issueCuts[$s_id] as $item)
                                                    </br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>
                                            </td>
                                            <td>
                                                @php
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($outCuts[$s_id] as $item)
                                                    </br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>
                                            </td>
                                            <td></td>
                                            <td>
                                                @php
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($price[$s_id] as $item)
                                                    </br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>
                                            </td>
                                            <td>
                                                @php
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($labour[$s_id] as $item)
                                                    </br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>
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
            }, 5000);
        });
        $(document).ready(function() {
            PatyLabourDataTabel = $('#Party_Tabel').DataTable({
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

            var s_id = $('#S_id').val();
            // alert(s_id);
            var Start_date = $('#Start_date').val();
            var End_date = $('#End_date').val();
            var count = 1;
            var example = $('#Party_Tabel').DataTable();
            example.clear().draw({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip',
            });
            // alert(s_id);
            // alert(Start_date);
            // alert(End_date);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('Party_Labour.search_data') }}',
                data: {
                    's_id': s_id,
                    'Start_date': Start_date,
                    'End_date': End_date,
                },
                dataType: 'json',
                success: function(response_msg) {
                    // // alert(response_msg.success);
                    // console.log(response_msg.success);
                    // console.log(response_msg.success.supplier);
                    // console.log(response_msg.success.rates);
                    console.log(response_msg.success.counts);
                    // console.log(response_msg.success.issueCuts);
                    // console.log(response_msg.success.outCuts);
                    // console.log(response_msg.success.price);
                    // console.log(response_msg.success.labour);
                    if (response_msg == null) {
                        alert('controller Succesfully Called !!!!!');
                    }
                    if (response_msg.success) {

                        // $("#p_gst_id").val(bill_no);
                        // const length = Object.keys(response_msg.success).length;
                        console.log(response_msg.success.supplier);
                        $('#Party_Tabel tbody').empty();

                        response_msg.success.supplier.forEach(success => {
                            count;
                            $("#Party_Tabel").append(
                                '<tr>' +
                                '<td>' + '<b>' + success.s_name + '</b><br>' +
                                response_msg.success.rates[success.s_id][0] + '<br>' +
                                response_msg.success.rates[success.s_id][1] + '<br>' +
                                response_msg.success.rates[success.s_id][2] + '<br>' +
                                response_msg.success.rates[success.s_id][3] + '</td>' +
                                '<td>' + '<br>' + response_msg.success.counts[success.s_id][0] +
                                '<br>' +
                                response_msg.success.counts[success.s_id][1] + '<br>' +
                                response_msg.success.counts[success.s_id][2] + '<br>' +
                                response_msg.success.counts[success.s_id][3] + '</td>' +
                                '<td>' + '<br>' + response_msg.success.issueCuts[success.s_id][0] +
                                '<br>' +
                                response_msg.success.issueCuts[success.s_id][1] + '<br>' +
                                response_msg.success.issueCuts[success.s_id][2] + '<br>' +
                                response_msg.success.issueCuts[success.s_id][3] + '</td>' +
                                '<td>' + '<br>' + response_msg.success.outCuts[success.s_id][0] +
                                '<br>' +
                                response_msg.success.outCuts[success.s_id][1] + '<br>' +
                                response_msg.success.outCuts[success.s_id][2] + '<br>' +
                                response_msg.success.outCuts[success.s_id][3] + '</td>' +
                                '<td>' + '<br>' + '</td>' +
                                '<td>' + '<br>' + response_msg.success.price[success.s_id][0] +
                                '<br>' +
                                response_msg.success.price[success.s_id][1] + '<br>' +
                                response_msg.success.price[success.s_id][2] + '<br>' +
                                response_msg.success.price[success.s_id][3] + '</td>' +
                                '<td>' + '<br>' + response_msg.success.labour[success.s_id][0] +
                                '<br>' +
                                response_msg.success.labour[success.s_id][1] + '<br>' +
                                response_msg.success.labour[success.s_id][2] + '<br>' +
                                response_msg.success.labour[success.s_id][3] + '</td>' +
                                '</tr>'
                            );
                            count = count + 1;
                        });
                        // console.log(response_msg.success.length);
                    }

                }
            });
            // alert('hii');
        }
    </script>
    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script> --}}

@endsection
{{-- @include('footerjs') --}}
