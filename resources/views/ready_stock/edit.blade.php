@section('content')
    <!--/app header-->
    @php

    $avatar = 'assets/images/users/2.jpg';
    $c_id = session()->get('c_id');
    $manager = App\Models\Manager_Details::where('c_id', $c_id)->get();
    @endphp
    <!--Page header-->

    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Edit Manager Details</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Manager List</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit Manager</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
    <form action="{{ route('ready_stock.update', $Diamond->r_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-xl-9 col-lg-8">
                <div class="card" style="padding: 10px;">
                    <div class="card-header">
                        <div class="card-title">Edit ReadyStock Details</div>
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
                                    value="{{ $Diamond->d_barcode }}" onchange="fetchData()" placeholder="Enter Bar Code"
                                    autofocus>
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
                                    <input id="d_wt" type="text" name="d_wt" class="form-control"
                                        value="{{ $Diamond_purchase->d_wt }}" placeholder="Enter New Weight"
                                        readonly="readonly">
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
                                    <input id="price" type="text" name="price" class="form-control"
                                        value="{{ $Diamond_purchase->price }}" placeholder="Enter New Weight">
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
                                    <input id="d_n_wt" type="text" name="d_n_wt" class="form-control inputField"
                                        value="{{ $Diamond->d_n_wt }}" placeholder="Enter New Weight">
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
                    <div class="card-footer text-right">
                        <button type="submit" name="action" class="btn  btn-primary">Submit</button>
                        <a href="/manager" class="btn btn-danger">Cancle</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Row-->
    </form>
    <script src="{{ asset('assets/js/quagga.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>

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
        var id;
        var mytable
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#camera') // Or '#yourElement' (optional)
            },
            decoder: {
                readers: ["code_128_reader"]
            }
        }, function(err) {
            if (err) {
                console.log(err);
                return
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();
        });

        Quagga.onDetected(function(data) {
            console.log(data.codeResult.code);
            id = data.codeResult.code;
            $('#bar_code').val(id);
            document.querySelector('#result').innerText = data.codeResult.code;

            mytable.row.add([id, 'pkt1', '10.5']);
            mytable.draw();
        });

        $(document).ready(function() {
            mytable = $('#tblItems').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip'
            });
            // mytable.row.add([id, 'pkt1', '10.5']);
            // mytable.draw();
        });
    @endsection
    @include('app')
