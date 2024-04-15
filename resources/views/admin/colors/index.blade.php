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
                Colors
                    <a href="{{url('admin/colors/create')}}" class="btn btn-primary btn-sm text-white float-end">Add Color</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Color Name</td>
                            <td>Color Code</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        
                        @forelse ($colors as $color)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$color->name}}</td>
                            <td>{{$color->code}}</td>
                            <td>{{$color->status=='1'?'hidden':'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/colors/edit/'.$color->id)}}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{url('admin/colors/delete/'.$color->id)}}" onclick="return confirm('Are you sure you want to delete thid product ?') "  class="btn btn-sm btn-danger" >Delete</a>
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