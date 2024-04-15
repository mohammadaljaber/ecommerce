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
                Edit Slider
                    <a href="{{url('admin/sliders')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/sliders/update/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label > Title</label>
                        <input type="text" name="title" value="{{$slider->title}}" class="form-control">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label > description</label>
                        <textarea name="description" class="form-control"  rows="3">{{$slider->description}}</textarea>
                        @error('description')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <img src="{{asset($slider->image)}}" style="width: 70px;height:70px" alt="">
                    </div>
                    <div class="mb-3">
                        <label > Color Status</label>
                        <input type="checkbox" name="status"  {{$slider->status==1?'checked':''}}> checked=hidden,unchecked=visible
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>        
</div>
@endsection