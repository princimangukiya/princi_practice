@extends('app')
@section('page-title')
    Weight Category
@endsection

@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Rate Master</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=""><i class="fe fe-layout mr-2 fs-14"></i>Weight Category</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">Weight Category List</a></li>
            </ol>
        </div>
        <div class="page-rightheader">
            <div class="btn btn-list">
                <a href="{{ route('Weight-Category.create') }}" class="btn btn-info"><i class="fa fa-user-plus mr-1"></i>
                    Add Weight Category</a>

            </div>
        </div>
    </div>
    <!--End Page header-->
    <div class="row">
        <div class="col-12">
            <!--div-->
            @if (session()->has('message'))
                {{-- <div class="alert alert-success">

                </div> --}}
                <div class="alert alert-danger col-6" style="float: right;" role="alert"><i class="fa fa-frown-o mr-2"
                        aria-hidden="true"></i>{{ session()->get('message') }}<button type="button" class="close"
                        data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Weight Category Details</div>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="rate_Master" class="table table-bordered text-wrap key-buttons">
                                <thead>
                                    <tr>
                                        @php
                                            $c_id = session()->get('c_id');
                                            $rate = App\Models\rate::where('c_id', $c_id)->get();
                                            // echo $rate;
                                        @endphp
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">Weight Category</th>
                                        <th class="border-bottom-0">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($weightCategory as $key => $value)
                                        <tr>

                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>{{ $value->wt_category }}</td>
                                            <td class="align-middle"
                                                style="display: flex; align-items: center;justify-content: space-evenly;">
                                                {{-- <a href="{{ route('rate_master.edit', ['id' => $value->Rate_id]) }}">
                                                    <div class="btn-group align-top">
                                                        <button class="btn btn-sm btn-success" type="button"
                                                            data-toggle="modal" data-target="#user-form-modal">Edit</button>
                                                        <button class="btn btn-sm btn-success" type="button"><i
                                                                class="fe fe-edit-2"></i></button>
                                                    </div>
                                                </a> --}}
                                                <div class="btn-group align-top">
                                                    <button class="btn btn-sm btn-danger diaDeleteBtn" data-toggle="modal"
                                                        id="smallButton" data-target="#smallModal"
                                                        data-href="{{ route('weight-category.destroy', $value->r_id) }}">Delete
                                                        <i class="fe fe-trash-2"></i></button>
                                                </div>
                                            </td>


                                        </tr>
                                    @endforeach
                                    @if (!$weightCategory->isEmpty())
                                        <div class="modal fade" id="smallModal" tabindex="{{ $key + 1 }}"
                                            role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                            <div class="modal d-block pos-static">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content modal-content-demo">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Message Preview</h6><button
                                                                aria-label="Close" class="close"
                                                                data-dismiss="modal" type="button"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6>Are You Sure To Delete Weight Category ?</h6>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form id="diaDeleteModalForm" method="post">
                                                                @csrf
                                                                <button class="btn btn-indigo" type="submit"
                                                                    value='success alert' id='click'>Delete
                                                                    Weight Category</button>
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-dismiss="modal">Close</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
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
    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip-primary"]').tooltip();
        });
        $(document).ready(function() {
            RateTabel = $('#rate_Master').DataTable({
                "autoWidth": false,
                "info": true,
                "paging": true,
                "lengthChange": false,
                "pageLength": 10,
                "sDom": 'lfrtip',
                "ordering": true,
                "searching": true,
                "order": [
                    [0, "desc"]
                ],
            });
        });
        $(".diaDeleteBtn").on('click', function() {
            var deleteUrl = $(this).data("href");
            //  alert(deleteUrl);
            $('#diaDeleteModalForm').attr('action', deleteUrl);
        });
    </script>



@endsection
