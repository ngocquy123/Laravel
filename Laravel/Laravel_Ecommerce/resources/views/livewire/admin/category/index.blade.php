<div>
    <div  wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    <h6>Bạn có muốn xóa danh mục này ?</h6>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Xóa</button>
                  </div>
            </form>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Danh Mục
                        <a href="{{url('admin/category/create')}}" class="btn btn-primary text-white float-end">Thêm Danh Mục</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{ ($category->status === '1') ? 'Ẩn' : ' Hiện'}}</td>
                                    <td>
                                        <a href="{{ url('admin/category/'.$category->id.'/edit')}}" class="btn btn-success text-white">Sửa</a>
                                        <a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger text-white">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
        </div>

</div>
@push('script')
 <script>
    window.addEventListener('close-modal',event =>{
        $('#deleteModal').modal('hide');
    })
 </script>
@endpush

