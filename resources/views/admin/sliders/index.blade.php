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
                Sliders List
                    <a href="{{url('admin/sliders/create')}}" class="btn btn-primary btn-sm text-white float-end">Add Slider</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Description</td>
                            <td>Image</td>
                            <td>Status</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        
                        @forelse ($sliders as $slider)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$slider->title}}</td>
                            <td>{{$slider->description}}</td>
                            <td><img src="{{asset($slider->image)}}" alt="" style="height: 70px;width:70px;"></td>
                            <td>{{$slider->status=='1'?'hidden':'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/sliders/edit/'.$slider->id)}}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{url('admin/sliders/delete/'.$slider->id)}}" onclick="return confirm('Are you sure you want to delete thid slider ?') "  class="btn btn-sm btn-danger" >Delete</a>
                            </td>
                        </tr>
                        @empty
                            <tr><td colspan="7" style="text-align: center"> No Colors Available</td></tr>
                        @endforelse
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>        
</div>
@endsection