@extends('layouts.app')

@section('title','Login')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-1">

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
                        <div class="card-header card-header-info">
                            <h4 class="card-title ">Login</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('login')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Password</label>
                                            <input type="password" class="form-control" name="password" value="{{ old('email') }}" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info">Login</button>
                                <a href="{{route('welcome')}}" class="btn btn-danger">Back</a>

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