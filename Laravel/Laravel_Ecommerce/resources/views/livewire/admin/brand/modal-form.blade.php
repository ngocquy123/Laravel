 <!-- Modal -->
 <div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addBrandModalLabel">Thêm Thương Hiệu</h1>
          <button type="button" class="btn-close"  wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        

        <div class="modal-body">
          <form wire:submit.prevent="storeBrand">
            <div class="modal-body">
              <div class="mb-3">
              
                  <label for="">Chọn Loại</label>
                  <select wire:model.defer="category_id" class="form-control" id=""  required>
                    <option value="">-- Chọn Loại--</option>
                    @foreach ($categories as $cateItem)
                    <option value="{{$cateItem->id}}">{{$cateItem->name}}</option>
                    @endforeach
                  </select>
                  @error('category_id') <small class="text-danger">{{$message}}</small> @enderror
              </div>
              <div class="mb-3">
                <label for="">Tên</label>
                <input type="text" wire:model.defer="name" class="form-control">
                @error('name') <small class="text-danger">{{$message}}</small> @enderror
              </div>
              <div class="mb-3">
                <label for="">Đường dẫn</label>
                <input type="text" wire:model.defer="slug" class="form-control">
                @error('slug') <small class="text-danger">{{$message}}</small> @enderror
              </div>
              <div class="mb-3">
                <label for="">Trạng Thái</label>
                <input type="checkbox" wire:model.defer="status"> Checked=Ẩn | Un-Checked=Hiện
                @error('status') <small class="text-danger">{{$message}}</small> @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
              <button type="submit" class="btn btn-primary text-white">Đăng</button>
            </div>
            
          </form>
        </div>
       
      </div>
    </div>
  </div>


  {{-- Brand Update Modal --}}
  <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addBrandModalLabel">Sửa Thương Hiệu</h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent="updateBrand">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="">Chọn Loại</label>
                  <select wire:model.defer="category_id" class="form-control" id=""  required>
                    <option value="">-- Chọn Loại--</option>
                    @foreach ($categories as $cateItem)
                    <option value="{{$cateItem->id}}" >{{$cateItem->name}}</option>
                    @endforeach
                  </select>
                  @error('category_id') <small class="text-danger">{{$message}}</small> @enderror
              </div>
                <div class="mb-3">
                  <label for="">Tên</label>
                  <input type="text" wire:model.defer="name" class="form-control">
                  @error('name') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="mb-3">
                  <label for="">Đường dẫn</label>
                  <input type="text" wire:model.defer="slug" class="form-control">
                  @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="mb-3">
                  <label for="">Trạng Thái</label>
                  <input type="checkbox" wire:model.defer="status"> Checked=Ẩn | Un-Checked=Hiện
                  @error('status') <small class="text-danger">{{$message}}</small> @enderror
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary text-white">Sửa</button>
              </div>
              
            </form>
          </div>
       
      </div>
    </div>
  </div>


  {{-- Brand Delete Modal --}}
  <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addBrandModalLabel">Xóa Thương Hiệu</h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent="destroyBrand">
              <h4>Bạn Có Muốn Xóa Thương Hiệu ?</h4>
              <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary text-white">Xóa</button>
              </div>
              
            </form>
          </div>
       
      </div>
    </div>
  </div>
