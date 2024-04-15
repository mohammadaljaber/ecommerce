<!--  Modal -->
<!--if i use form in livewire i (use wire:ignore.self) -->

<div wire:ignore.self class="modal fade" id="addbrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brand</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- action in livewire in form is wire:submit.prevent="methodname" -->
      <form wire:submit.prevent="storebrand">
      <div class="modal-body">
        <div class="mb-3">
          <label>Brand Name</label>
          <input type="text" wire:model.defer="name" class="form-control">
          @error('name')
          <small class="text-danger">{{$message}}</small>
          @enderror
        </div>
        <div class="mb-3">
          <label>Brand Slug</label>
          <input type="text" wire:model.defer="slug" class="form-control">
          @error('slug')
          <small class="text-danger">{{$message}}</small>
          @enderror
        </div>
        <div class="mb-3">
          <label>Status</label><br>
          <input type="checkbox" wire:model.defer="status"> checked = hidden ,un-checked = visible
          @error('status')
          <small class="text-danger">{{$message}}</small>
          @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
      </div>
    </form>


    </div>
  </div>
</div>

<!--  update model -->

<div wire:ignore.self class="modal fade" id="updatebrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">update Brand</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closemodel" aria-label="Close"></button>
      </div>
      <div wire:loading>
        <div class="spinner-border text-info" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>

      <!-- action in livewire in form is wire:submit.prevent="methodname" -->
      <div wire:loading.remove>
      <form wire:submit.prevent="updatebrand">
      <div class="modal-body">
        <div class="mb-3">
          <label>Brand Name</label>
          <input type="text" wire:model.defer="name" class="form-control">
          @error('name')
          <small class="text-danger">{{$message}}</small>
          @enderror
        </div>
        <div class="mb-3">
          <label>Brand Slug</label>
          <input type="text" wire:model.defer="slug" class="form-control">
          @error('slug')
          <small class="text-danger">{{$message}}</small>
          @enderror
        </div>
        <div class="mb-3">
          <label>Status</label><br>
          <input type="checkbox" wire:model.defer="status"   /> checked = hidden ,un-checked = visible
          @error('status')
          <small class="text-danger">{{$message}}</small>
          @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" wire:click="closemodel" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
      </div>
    </form>
  </div>


    </div>
  </div>
</div>





<div wire:ignore.self class="modal fade" id="deletebrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">update Brand</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closemodel" aria-label="Close"></button>
      </div>
      <div wire:loading>
        <div class="spinner-border text-info" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>

      <!-- action in livewire in form is wire:submit.prevent="methodname" -->
      <div wire:loading.remove>
      <form wire:submit.prevent="destoybrand">
      <div class="modal-body">
        <h4> You Are Sure you want delete this brand ? </h4>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" wire:click="closemodel" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
      </div>
    </form>
  </div>


    </div>
  </div>
</div>