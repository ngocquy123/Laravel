<div>
    <div wire:ignore.self class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Học Sinh</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <form wire:submit.prevent="saveStudent">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="">Tên</label>
                    <input type="text" wire:model="name" id=""  class="form-control">
                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text"  wire:model="email" id=""  class="form-control">
                    @error('email') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="mb-3">
                    <label for="">Course</label>
                    <input type="text" wire:model="course" id=""  class="form-control">
                    @error('course') <small class="text-danger">{{$message}}</small> @enderror
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Thêm</button>
              </div>
           </form>
          </div>
        </div>
      </div>
</div>