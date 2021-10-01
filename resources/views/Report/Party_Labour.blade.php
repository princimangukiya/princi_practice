@section('page-title')
    Rate Master
@endsection

@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Party_Labour Master</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Party Labour List</a></li>
            </ol>
        </div>



        {{-- <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="{{ route('Party_Labour.generatePDF') }}" class="btn btn-info"><i
                        class="fa fa-download mr-1"></i>
                    Downloade PDF </a>

            </div>
        </div> --}}

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
                                                <option value="">All Inward Report</option>
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
                                        <h4><label class="form-label"
                                                style="display: flex; justify-content:start;">Select
                                                Start
                                                Date:- </label></h4>
                                        <input type="date" id="start_date" name="Start_date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col">
                                        <h4><label class="form-label"
                                                style="display: flex; justify-content:start;">Select
                                                End
                                                Date:- </label></h4>
                                        <input type="date" id="end_date" name="End_date">
                                    </div>
                                </div>
                            </div>
                            <div class="page-rightheader col-md-2">
                                <div class="btn btn-list col-md-12">
                                    <label for="&nbsp;">&nbsp;</label>
                                    <button type="submit" class="btn btn-info"><i class="fa fa-download mr-1"></i>
                                        Downloade PDF </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Party_Labour Details</div>
                </div>
                <div class="card-body">
                    <form action="/search_PartyLabour_data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-5" style="padding-right: 50px;">
                                @php
                                    $c_id = session()->get('c_id');
                                    $rate = App\Models\supplier_details::where('c_id', $c_id)->get();
                                @endphp
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
                                        <h4><label class="form-label"
                                                style="display: flex; justify-content:start;">Select
                                                Start
                                                Date:- </label></h4>
                                        <input type="date" id="Start_date" name="Start_date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col">
                                        <h4><label class="form-label"
                                                style="display: flex; justify-content:start;">Select
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
                    </form>
                </div>
                {{-- @php
                    echo $Pay_Labour;
                @endphp --}}
                <div class="card-body">
                    <div>

                        <div class="table-responsive">
                            <table id="example" class="table table-bordered text-nowrap key-buttons">
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


                                    @foreach ($Pay_labour as $d)
                                        <tr>
                                            @php
                                                
                                                $s_id = $d->s_id;
                                                $sell_stock = App\Models\sell_stock::where('s_id', $s_id)->get();
                                                $daimond = App\Models\D_Purchase::where('s_id', $s_id)->get();
                                                $json_data = App\Models\rate_master::where('rate_masters.s_id', $s_id)->get('json_price');
                                                $json_data = $json_data[0]['json_price'];
                                                $json_decoded = json_decode($json_data);
                                            @endphp
                                            <td>
                                                <b>{{ $d->s_name }}</b>
                                                @php
                                                    $rates = json_decode(showRate($json_decoded, $s_id));
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($rates as $item)
                                                    </br>{{ $item }}
                                                @endforeach
                                                <br><br><b> &nbsp;Total Party:-</b>

                                            </td>
                                            {{-- <td style="display: flex; justify-content:center; "> --}}
                                            <td>
                                                @php
                                                    $daimond_count = json_decode(daimondCount($json_decoded, $sell_stock, $daimond, $s_id));
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($daimond_count as $item)
                                                    </br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>

                                            </td>
                                            <td>
                                                @php
                                                    $issuCuts = json_decode(issuCuts($json_decoded, $sell_stock, $daimond, $s_id));
                                                    // var_dump($issuCuts);
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($issuCuts as $item)
                                                    </br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>
                                            </td>
                                            <td>
                                                @php
                                                    $outCuts = json_decode(outCuts($json_decoded, $sell_stock, $daimond, $s_id));
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($outCuts as $item)
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
                                                    $price = json_decode(showPice($json_decoded, $s_id));
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($price as $item)
                                                    </br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>
                                            </td>
                                            <td>
                                                @php
                                                    $labour = json_decode(showLabour($json_decoded, $sell_stock, $daimond, $s_id));
                                                    $total_item = 0;
                                                @endphp
                                                @foreach ($labour as $item)
                                                    </br>{{ $item }}
                                                    @php
                                                        $total_item = $total_item + $item;
                                                    @endphp
                                                @endforeach
                                                <br><br><b>{{ $total_item }}</b>
                                            </td>

                                        </tr>

                                        {{-- <td> Party Total:-</td> --}}
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

    <script src="{{ asset('assets/vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/advance-ui-modals.min.js') }}"></script>
    @php
    function showRate($json_decoded, $s_id)
    {
        $rate = [];
        foreach ($json_decoded[0] as $key => $val) {
            $r_id = $key;
            $wt_category = App\Models\rate::where('rates.r_id', $r_id)->get();
            $wt_category = $wt_category[0]['wt_category'];
            array_push($rate, $wt_category);
        }
        return json_encode($rate);
    }
    function daimondCount($json_decoded, $sell_stock, $daimond, $s_id)
    {
        $daimond_data = [];
        foreach ($json_decoded[0] as $key => $val) {
            $r_id = $key;
            $wt_category = App\Models\rate::where('rates.r_id', $r_id)->get();
            $wt_category = $wt_category[0]['wt_category'];
            $count1 = 0;
            foreach ($daimond as $r) {
                if ($s_id == $r->s_id) {
                    foreach ($sell_stock as $value) {
                        if ($value['d_id'] == $r->d_id) {
                            $daimond_categorie_id = $r->d_wt_category;

                            if ($r_id == $daimond_categorie_id) {
                                $count1 = $count1 + 1;
                            }
                        }
                    }
                }
            }
            array_push($daimond_data, $count1);
        }
        return json_encode($daimond_data);
    }
    function issuCuts($json_decoded, $sell_stock, $daimond, $s_id)
    {
        $issueCuts = [];
        foreach ($json_decoded[0] as $key => $val) {
            $r_id = $key;
            $wt_category = App\Models\rate::where('rates.r_id', $r_id)->get();
            $wt_category = $wt_category[0]['wt_category'];
            $total_weight = 0;
            $d_weigth = 0;

            foreach ($daimond as $r) {
                if ($r->s_id == $s_id) {
                    foreach ($sell_stock as $value) {
                        if ($value['d_id'] == $r->d_id) {
                            $d_weight_categry = $r->d_wt_category;

                            if ($r_id == $d_weight_categry) {
                                $d_weight = $total_weight + $r->d_wt;
                                $total_weight = $d_weight;
                            }
                        }
                    }
                }
            }
            array_push($issueCuts, $total_weight);
        }
        return json_encode($issueCuts);
    }
    function outCuts($json_decoded, $sell_stock, $daimond, $s_id)
    {
        $outCuts = [];
        foreach ($json_decoded[0] as $key => $val) {
            $r_id = $key;
            $wt_category = App\Models\rate::where('rates.r_id', $r_id)->get();
            $wt_category = $wt_category[0]['wt_category'];
            $d_n_weight = 0;
            $total_new_weight = 0;

            foreach ($daimond as $r) {
                if ($r->s_id == $s_id) {
                    foreach ($sell_stock as $value) {
                        if ($value['d_id'] == $r->d_id) {
                            $d_weight_categry = $r->d_wt_category;

                            if ($r_id == $d_weight_categry) {
                                $d_n_wt = $total_new_weight + $r->d_n_wt;
                                $total_new_weight = $d_n_wt;
                            }
                        }
                    }
                }
            }
            array_push($outCuts, $total_new_weight);
        }
        return json_encode($outCuts);
    }
    function showPice($json_decoded, $s_id)
    {
        $price = [];
        foreach ($json_decoded[0] as $key => $val) {
            $r_id = $key;
            $wt_category = App\Models\rate::where('rates.r_id', $r_id)->get();
            $wt_category = $wt_category[0]['wt_category'];
            $fetchPrice = $val;
            array_push($price, $fetchPrice);
        }
        return json_encode($price);
    }

    function showLabour($json_decoded, $sell_stock, $daimond, $s_id)
    {
        $labour = [];
        foreach ($json_decoded[0] as $key => $val) {
            $r_id = $key;
            $wt_category = App\Models\rate::where('rates.r_id', $r_id)->get();
            $wt_category = $wt_category[0]['wt_category'];
            $count1 = 0;
            $price = 0;

            foreach ($daimond as $r) {
                if ($r->s_id == $s_id) {
                    foreach ($sell_stock as $value) {
                        if ($value['d_id'] == $r->d_id) {
                            $daimond_count = $r->d_wt_category;

                            if ($r_id == $daimond_count) {
                                $count1 = $price + $r->price;
                                $price = $count1;
                            }
                        }
                    }
                }
            }
            array_push($labour, $price);
        }
        return json_encode($labour);
    }
    @endphp

@endsection
@include('app')
