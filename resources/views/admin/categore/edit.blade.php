@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3>
                   Edit Category
                    <a href="{{url('admin/category')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/category/'.$category->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label> Name </label>
                            <input type="text" name="name" value="{{$category->name}}" class="form-control"/>
                            @error('name')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label> Slug </label>
                            <input type="text" name="slug" value="{{$category->slug}}" class="form-control"/>
                            @error('slug')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label> Description </label>
                            <textarea  name="description"  class="form-control">{{$category->description}}</textarea>
                            @error('description')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label> Image </label>
                            <input type="file" name="image" class="form-control"/>
                            <img src="{{asset('uploads/category/'.$category->image)}}" width="60px" height="60px">
                            @error('image')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label> Status </label><br>
                            <input type="checkbox" name="status" {{$category->status=='1'? 'checked':''}} />
                        
                        </div>
                        <div class="col-md-12 mb-3">
                            <label> Meta title </label>
                            <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control"/>
                            @error('meta_title')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label> Meta keyword </label>
                            <textarea  name="meta_keyword" rows="3" class="form-control">{{$category->meta_keyword}}</textarea>
                            @error('meta_keyword')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label> Meta description </label>
                            <textarea  name="meta_description" rows="3" class="form-control">{{$category->meta_description}}</textarea>
                            @error('meta_description')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>
                    </div>
                </form>
            </div>

        
        </div>




    </div>
</div>


@endsection