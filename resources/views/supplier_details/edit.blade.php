@section('content')
    <!--/app header-->
    @php

    $avatar = 'assets/images/users/2.jpg';

    @endphp
    <!--Page header-->

    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Edit Supplier Details</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Other Features</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Supplier List</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit Supplier</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->

    <form action="{{ route('supplier.update', $supplier->s_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Supplier Details</div>
                    </div>

                    <div class="card-body">

                        <div class="card-title font-weight-bold">Supplier info:</div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Supplier Name </label>
                                    <input id="s_name" type="text" name="s_name" class="form-control inputField"
                                        value="{{ $supplier->s_name }}" placeholder="Enter Supplier Name" autofocus>
                                    @error('s_name')
                                        <small class="errorTxt1">
                                            <div id="title-error" class="error" style="margin-left:3rem">
                                                {{ $message }}
                                            </div>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Supplier Gst :-</label>
                                    <input placeholder="Enter Supplier Gst" class="form-control inputField" id="s_gst"
                                        type="text" name="s_gst" value="{{ $supplier->s_gst }}" required>
                                    @error('s_gst')
                                        <small class="errorTxt1">
                                            <div id="title-error" class="error" style="margin-left:3rem">
                                                {{ $message }}
                                            </div>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Supplier Address:-</label>
                                    <textarea id="s_address" type="text" name="s_address"
                                        class="form-control mb-4 inputField" rows="3" placeholder="Enter Supplier Address"
                                        required
                                        style="margin-top: 0px; margin-bottom: 16px; height: 81px;">{{ $supplier->s_address }}</textarea>
                                    @error('s_address')
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
                    <div class="card-footer text-right">
                        <button type="submit" name="action" class="btn  btn-primary">Submit</button>
                        <a href="/supplier" class="btn btn-danger">Cancle</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Row-->
    </form>
    <script>
        var currentBoxNumber = 0;
        $(".inputField").keyup(function(event) {
            if (event.keyCode == 13) {
                textboxes = $("input.inputField");
                currentBoxNumber = textboxes.index(this);
                console.log(textboxes.index(this));
                if (textboxes[currentBoxNumber + 0] != null) {
                    nextBox = textboxes[currentBoxNumber + 0];
                    nextBox.focus();
                    nextBox.select();
                    event.preventDefault();
                    return false;
                } else {
                    addData();
                }
            }
        });
    </script>
    <script src="{{ asset('assets/js/quagga.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>

@endsection
@include('app')
