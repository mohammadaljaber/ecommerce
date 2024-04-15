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
                Products
                    <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-sm text-white float-end">Add Products</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Category</td>
                            <td>Product</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Status</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                    @endphp
                        @forelse ($products as $product )
                        
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->original_price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->status=='1'?'hidden':'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/products/'.$product->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{url('admin/products/'.$product->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete thid product ?') "  class="btn btn-sm btn-danger" >Delete</a>
                            </td>
                        </tr>
                        @empty
                            <tr><td colspan="7"> No Products Available</td></tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>        
</div>
@endsection