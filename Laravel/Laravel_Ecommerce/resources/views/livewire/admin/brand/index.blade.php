<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Danh Sách Thương Hiệu
                        <a href="" class="btn btn-primary text-white float-end" data-bs-toggle="modal" data-bs-target="#addBrandModal">Thêm Thương Hiệu</a>
                    </h4>
                    {{ (session('message')) ? session('message') : ''}}  
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Loại</th>
                                <th>Đường Dẫn</th>
                                <th>Trạng Thái</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($brands as $brand)
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>
                                    @if($brand->category)
                                    {{$brand->category->name}}
                                    @else
                                    Chưa Thêm Loại
                                    @endif
                                </td>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->slug}}</td>
                                <td>{{($brand->status == "1" ? 'Ẩn': 'Hiện')}}</td>
                                <td>
                                    <a href="#"  wire:click="editBrand({{$brand->id}})" class="btn btn-sm btn-success text-white" data-bs-toggle="modal" data-bs-target="#updateBrandModal">Sửa</a>
                                    <a href="#" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-sm btn-danger text-white">Xóa</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Bạn Chưa Thêm Thương Hiệu</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $brands->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('close-modal',event =>{
            $('#addBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        })
    </script>
@endpush
