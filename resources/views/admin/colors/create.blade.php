@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12" >
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>
                Add Colors
                    <a href="{{url('admin/colors')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/colors/create')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label > Color Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label > Color Code</label>
                        <input type="color" name="code" >
                        @error('code')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div> <div class="mb-3">
                        <label > Color Status</label>
                        <input type="checkbox" name="name" > checked=hidden,unchecked=visible
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>        
</div>
@endsection