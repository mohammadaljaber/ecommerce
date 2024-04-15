@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3>
                Add Category
                    <a href="{{url('admin/category')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/category')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label> Name </label>
                            <input type="text" name="name" class="form-control"/>
                            @error('name')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label> Slug </label>
                            <input type="text" name="slug" class="form-control"/>
                            @error('slug')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label> Description </label>
                            <textarea  name="description" class="form-control"></textarea>
                            @error('description')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label> Image </label>
                            <input type="file" name="image" class="form-control"/>
                            @error('image')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label> Status </label><br>
                            <input type="checkbox" name="status" />
                        
                        </div>
                        <div class="col-md-12 mb-3">
                            <label> Meta title </label>
                            <input type="text" name="meta_title" class="form-control"/>
                            @error('meta_title')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label> Meta keyword </label>
                            <textarea  name="meta_keyword" rows="3" class="form-control"></textarea>
                            @error('meta_keyword')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label> Meta description </label>
                            <textarea  name="meta_description" rows="3" class="form-control"></textarea>
                            @error('meta_description')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Save</button>
                        </div>
                    </div>
                </form>
            </div>

        
        </div>




    </div>
</div>


@endsection