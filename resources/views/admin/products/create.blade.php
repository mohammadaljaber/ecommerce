@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3>
                Products
                    <a href="{{url('admin/products')}}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                    </div>
                @endif
                <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                            Home
                        </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                            SEO Tags
                        </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                            Details
                        </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                            Product Images
                        </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                            Colors
                        </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Category</label>
                                            <select name="category_id" class="form-control">
                                                @foreach ($categories as $category )
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                        </div>
        
                                        <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Product Name</label>
                                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                            @error('name')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div> 
                                        </div>
        
                                        <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Product Slug</label>
                                            <input type="text" name="slug" class="form-control" value="{{old('slug')}}">
                                            @error('slug')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div> 
                                        </div>
        
                                        <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Brand</label>
                                            <select name="brand" class="form-control" >
                                                @foreach ($brands as $brand )
                                                    <option value="{{$brand->name}}">{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('brand')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                        </div>
                                </div>

                                <div class="mb-3">
                                    <label> Small Description </label>
                                    <textarea  name="samll_description" class="form-control" role="4"></textarea>
                                    @error('samll_description')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>  Description </label>
                                    <textarea  name="description" class="form-control" role="4"></textarea>
                                    @error('description')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                
                            </div>
                            <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">

                                <div class="mb-3">
                                    <label>Mete title</label>
                                    <input type="text" name="meta_title" class="form-control" value="{{old('meta_title')}}">
                                    @error('meta_title')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div> 
                                <div class="mb-3">
                                    <label> Meta Description </label>
                                    <textarea  name="meta_description" class="form-control" role="4" ></textarea>
                                    @error('meta_description')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label> Meta keyword </label>
                                    <textarea  name="meta_keyword" class="form-control" role="4"></textarea>
                                    @error('meta_keyword')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Original price</label>
                                            <input type="number" name="original_price" class="form-control" value="{{old('original_price')}}">
                                            @error('original_price')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Selling price</label>
                                            <input type="number" name="selling_price" class="form-control" value="{{old('selling_price')}}">
                                            @error('selling_price')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Quantity</label>
                                            <input type="number" name="quantity" class="form-control" value="{{old('quantity')}}">
                                            @error('quantity')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Trending</label>
                                            <input type="checkbox" name="trinding" value=1>
                                            @error('trinding')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <input type="checkbox" name="status" value=1>
                                            @error('status')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Upload product images</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>
                            </div>  
                            <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Select Color</label>
                                    <div class="row">
                                        @forelse ($colors as $color)
                                        <div class="col-md-3">
                                            <div class="p-2 border mb-3"> 
                                                Color : <input type="checkbox" name="colors[{{$color->id}}]" value="{{$color->id}}">
                                                {{$color->name}} <br>
                                                Quantity : <input type="number" name="colorquantity[{{$color->id}}]" style="width: 70px;border:1px solid" >
                                            </div>
                                        </div>
                                        @empty
                                            <div class="col-md-12">
                                                NO Color Found 
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div> 

                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>        
</div>
@endsection