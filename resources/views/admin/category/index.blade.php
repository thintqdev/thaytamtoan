@extends('admin.layouts.app')

@section('title', 'Danh mục')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="card-header">
                    <h4 class="card-title">Danh sách danh mục</h4>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="data-category">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên danh mục</th>
                            <th>Đường dẫn</th>
                            <th>Tên danh mục cha</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->parent_name }}</td>
                                <td>
                                    <button type="button" data-bs-target="#modal-delete-category" data-bs-toggle="modal"
                                        data-category-id="{{ $category->id }}" class="badge bg-danger borderless">Xoá</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button id="add-category" class="btn btn-primary float-end"><i class="bi bi-plus-circle"></i> Thêm
                    mới</button>
            </div>
        </div>
    </section>

    <div class="modal fade text-left" id="modal-delete-category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <form>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">Xoá danh mục</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Danh mục bị xoá sẽ không khôi phục được, bạn có chắn chắn xoá?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Đóng</span>
                        </button>
                        <button type="button" class="btn btn-danger ml-1" data-bs-dismiss="modal" id="confirmDelete">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">OK</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/pages/category/category.js') }}"></script>
@endsection
