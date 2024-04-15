<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name,$slug,$status ,$id; //take value from  {wire:model.defer="name"} of input 

    public function rules(){
        return[
            'name'=>'required|string',
            'slug'=>'required|string',
            'status'=>'nullable'
        ];
    }

    public function resetinput(){
        $this->name=null;
        $this->slug=null;
        $this->status=null;
        $this->id=null;
    }
    public function storebrand() {
        $valedatedata=$this->validate();
        Brand::create([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status==true ? '1':'0'
        ]);
        session()->flash('message','Brand added successfully');
        $this->resetinput();
        // dd($this->name);
    }

    public function editbrand(Brand $brand){
        $this->id=$brand->id;
        $this->name=$brand->name;
        $this->slug=$brand->slug;
        $this->status=$brand->status;
        // dd($this->status);
    }
    public function closemodel () {
        $this->resetinput();
    }
    public function updatebrand(){
        $valedatedata=$this->validate();
        // dd($this->status);
        Brand::find($this->id)->update([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status==true ? '1':'0'
        ]);
        // dd($this->status);
        session()->flash('message','Brand updated successfully');
        $this->resetinput();
    }
    public function deletebrand($id){
        
        $this->id=$id;
        // dd($this->id);
    }
    public function destoybrand(){
        Brand::destroy($this->id);
        session()->flash('message','Brand deleted successfully');
        $this->resetinput();
    }

    public function render()
    {
        $brands= Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brands.index',compact('brands'))
        ->extends('layouts.admin') 
        ->section('content');
    }
}
