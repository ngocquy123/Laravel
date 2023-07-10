<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name,$slug,$status,$brand_id,$category_id;
    

    protected function rules(){
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'category_id' => 'required|integer',
            'status' => 'nullable'
        ];
    }
    public function resetInput(){
        $this->name = "";
        $this->slug = "";
        $this->status = "";
        $this->category_id = "";
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function storeBrand(){
        $validateData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' =>Str::slug($this->slug),
            'status' => ($this->status === true ? '1': '0'),
            'category_id' => $this->category_id,
        ]);
        session()->flash('message','Đã thêm thương hiệu');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
        
    }
    
    // Update Brand
    public function editBrand(int $brand_id = null){
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name; 
        $this->slug = $brand->slug; 
        $this->status = $brand->status; 
        $this->category_id = $brand->category_id; 
    }
    public function closeModal(){
        $this->resetInput();
    }
    public function openModal(){
        $this->resetInput();
    }
    public function updateBrand(){
        $validateData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' =>Str::slug($this->slug),
            'status' => ($this->status === true ? '1': '0'),
            'category_id' => $this->category_id,
        ]);
        session()->flash('message','Đã sửa thương hiệu');
        $this->dispatchBrowserEvent('close-modal');
    }
    // Delete Brand
    public function deleteBrand($brand_id){
        $this->brand_id = $brand_id;
    }
    public function destroyBrand(){
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message','Đã Xóa Thương Hiệu');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $categories = Category::where('status','0')->get();
        $brands = Brand::orderBy('id','DESC')->paginate('10');
        return view('livewire.admin.brand.index',['brands' => $brands,'categories' => $categories]);
    }
}