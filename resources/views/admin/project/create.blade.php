@extends('layouts.app')

@section('title','Project')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display=none;">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ $error }}</span>
                                    </div>
                                @endforeach
                    @endif

                    {{--@include('layouts.partial.msg')--}}

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Add New Project</h4>
                        </div>
                        <div class="card-body">
                             <form method="POST" action="{{route('project.store')}}" enctype="multipart/form-data">
                                 @csrf
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label class="bmd-label-floating">Category</label>
                                             <select class="form-control" name="category">
                                                 @foreach($categories as $category)
                                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label class="bmd-label-floating">Name</label>
                                             <input type="text" class="form-control" name="name">
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label class="bmd-label-floating">Description</label>
                                             <textarea class="form-control" name="description"></textarea>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-md-12">
                                             <label class="bmd-label-floating">Image</label>
                                             <input type="file" name="image">
                                     </div>
                                 </div>

                                 <a href="{{route('project.index')}}" class="btn btn-danger">Back</a>
                                 <button type="submit" class="btn btn-primary">Save</button>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush