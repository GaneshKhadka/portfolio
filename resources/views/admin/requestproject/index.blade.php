@extends('layouts.app')

@section('title','Project Request')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @include('layouts.partial.msg')

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Request Project</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" cellspacing="0" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Date and Time</th>
                                    <th>Budget</th>
                                    <th>Requirement</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($requestprojects as $key=>$requestproject)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $requestproject ->name }}</td>
                                            <td>{{ $requestproject ->phone }}</td>
                                            <td>{{ $requestproject ->email }}</td>
                                            <td>{{ $requestproject ->expected_date }}</td>
                                            <td>{{ $requestproject ->budget }}</td>
                                            <th>{{ $requestproject ->requirement }}</th>
                                            <th>
                                                @if($requestproject->status == true)
                                                    <span class="badge badge-info">Confirmed</span>
                                                @else
                                                    <span class="badge badge-danger">Not Confirmed yet!</span>
                                                 @endif
                                            </th>
                                            <td>{{ $requestproject ->created_at }}</td>
                                            <td>
                                                @if($requestproject->status == false)
                                                    <form id="status-form-{{$requestproject->id}}" action="{{route('requestproject.status',$requestproject->id)}}" style="display: none;" method="POST">
                                                        @csrf
                                                    </form>
                                                    <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you verify this request by phone ?')){
                                                            event.preventDefault();
                                                            document.getElementById('status-form-{{$requestproject->id}}').submit();
                                                            }else{
                                                            event.preventDefault();
                                                            }"><i class="material-icons">done</i> </button>
                                                @endif

                                                    <form id="delete-form-{{$requestproject->id}}" action="{{route('requestproject.destroy',$requestproject->id)}}" style="display: none;" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure?You want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{$requestproject->id}}').submit();
                                                            }else{
                                                            event.preventDefault();
                                                            }"><i class="material-icons">delete</i> </button>

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
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush