@extends('app')
@section('page-title')
    Sell Diamond
@endsection

@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Sell Diamond </h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Sell Diamond List</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
    <!-- Row -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">Sell Diamond</div>
        </div>
        <form action="{{ route('Defective_Pcs.update', $Diamond->d_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-6 col-md-6" style="padding: 20px;">
                    <div class="form-group">
                        <label class="form-label">Enter Date :-</label>
                        <input placeholder="Enter Date:-" class="form-control" id="Date" type="date" name="date"
                            value="{{ $Diamond->date }}" required>
                        @error('date')
                            <small class="errorTxt1">
                                <div id="title-error" class="error" style="margin-left:3rem">
                                    {{ $message }}
                                </div>
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6 col-md-6" style="display: flex;padding: 20px;">
                    <div class="form-group col-md-12 col-sm-12" style="padding:0 20px;">
                        <label class="form-label">BarCode Value </label>
                        <input id="bar_code" type="text" name="bar_code" class="form-control inputField"
                            value="{{ $Diamond->d_barcode }}" placeholder="Enter Bar Code" autofocus>
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
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="form-label">Enter Resone:-</label>
                    <textarea id="resone" type="text" name="resone" class="form-control mb-4 inputField" rows="3" value=""
                        placeholder="Enter Resone" required
                        style="margin-top: 0px; margin-bottom: 16px; height: 81px;">{{ $Diamond->resone }}</textarea>
                    {{-- <input id="m_address" type="text" name="m_address" class="form-control inputField"
                   value="{{ old('m_address') }}" placeholder="Enter Manager Address" required> --}}
                    @error('resone')
                        <small class="errorTxt1">
                            <div id="title-error" class="error" style="margin-left:3rem">
                                {{ $message }}
                            </div>
                        </small>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-right" style="padding-right: 10% ">
                <button type="submite" id="addTODefectivePcs" name="addTODefectivePcs"
                    class="btn  btn-primary">Submit</button>
                <a href="/Defective_Pcs" class="btn btn-danger">Cancle</a>
            </div>
        </form>
    </div>

    <!--/div-->

    <!-- /Row -->




    <script src="{{ asset('assets/js/quagga.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>

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
    </script>
@endsection
