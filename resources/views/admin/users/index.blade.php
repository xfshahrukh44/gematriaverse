@extends('layouts.main')

@push('after-css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                    <div class="card-body">
                        <h3 class="box-title pull-left">Users List</h3>

                        <div class="clearfix"></div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $key=>$user)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->roles()->pluck('name')->implode(', ')}}</td>
                                                <th>
                                                    <a class="btn btn-info" href="{{url('user/edit/'.$user->id)}}"><i
                                                                class="fa fa-pencil"></i> Edit</a> &nbsp;&nbsp;
                                                    <a class="delete btn btn-danger"
                                                       href="{{url('user/delete/'.$user->id)}}"><i
                                                                class="fa fa-trash"></i> Delete</a>
                                                </th>
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
        </div>
        @include('layouts.admin.footer')
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.delete', function (e) {
                if (confirm('Are you sure want to delete?')) {
                }
                else {
                    return false;
                }
            });
            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            @endif
        })

        $(function () {
            $('#myTable').DataTable({
                "columns": [
                    null, null, null, {"orderable": false}
                ]
            });

        });
    </script>

@endpush
