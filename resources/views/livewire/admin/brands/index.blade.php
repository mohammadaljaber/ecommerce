<div>
    @include('livewire.admin.brands.model-form')
    <div class="row">
        <div class="col-md-12">
    
            @if (session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
    
            <div class="card">
                <div class="card-header">
                    <h3>
                        Brands List
                        <a href=""  data-bs-toggle="modal" data-bs-target="#addbrand" class="btn btn-primary btn-sm float-end">Add Brands</a>
                    </h3>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $brand )
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->slug}}</td>
                                <td>{{$brand->status =='1'?'Hidden': 'Visible'}}</td>
                                <td>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#updatebrand" wire:click="editbrand({{$brand->id}})" class="btn btn-success">Edit</a>
                                    <a href="" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deletebrand" wire:click="deletebrand({{$brand->id}})">Delete</a>
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"> No Brands Found</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>

                <div>
                    {{$brands->links()}}
                </div>
                    
                </div>
            </div>
                
</div>
