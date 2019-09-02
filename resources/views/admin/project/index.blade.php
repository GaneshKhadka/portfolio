@extends('layouts.app')

@section('title','Project')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <a href="{{route('project.create')}}" class="btn btn-outline-danger">Add Project</a>

                    @include('layouts.partial.msg')

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Projects</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" cellspacing="0" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Category name</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($projects as $key=>$project)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $project ->name }}</td>
                                            <td>{{ $project ->image }}</td>
                                            <td>{{ $project ->category->name }}</td>
                                            <td>{{ $project ->description }}</td>
                                            <td>{{ $project ->created_at }}</td>
                                            <td>{{ $project ->updated_at }}</td>
                                            <td><a href="{{route('project.edit',$project->id)}}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form id="delete-form-{{$project->id}}" action="{{route('project.destroy',$project->id)}}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure?You want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$project->id}}').submit();
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