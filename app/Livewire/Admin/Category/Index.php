<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deletecategory($category_id) {
        $this->category_id=$category_id;
        // dd($category_id);
    }

    public function destroycategory(){
        $category=Category::find($this->category_id);
        $path='uploads/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        session()->flash('message','Category Deleted');
    }





    public function render()
    {
        $categories=Category::orderBy('id','DESC')->paginate('10');
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }
}
