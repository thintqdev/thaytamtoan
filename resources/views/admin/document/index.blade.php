@extends('admin.layouts.app')

@section('title', 'Tài liệu')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                <h4 class="card-title">Danh sách tài liệu</h4>
            </div>
            <a href="{{ route('document.create_form') }}" class="btn btn-primary float-end"><i class="bi bi-plus-circle"></i> Thêm tài liệu
            </a>
        </div>

        <div class="card-body">
            <table class="table table-striped" id="data-document">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="col-3">Tên tài liệu</th>
                        <th class="col-5">Mô tả</th>
                        <th class="col-1">Trạng thái</th>
                        <th class="col-1">Danh mục</th>
                        <th class="col-1">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documents as $document)
                    <tr>
                        <td> {{ $document->id }} </td>
                        <td> {{ $document->name }} </td>
                        <td> {!! html_entity_decode($document->description) !!} </td>
                        <td>
                            @if($document->status)
                            <span class="badge bg-light-success">Active</span>
                            @elseif($document->status == 0)
                            <span class="badge bg-light-danger">Locked</span>
                            @endif
                        </td>
                        <td>
                            {{ $document->category->name }}
                        </td>
                        <td>
                            <a href="{{ route('document.show', ['document' => $document]) }}" <span class="badge bg-success">Xem</span>
                            </a>
                            <a href="{{ route('document.edit', ['document' => $document]) }}" <span class="badge bg-warning">Sửa</span>
                            </a>
                            <button type="button" data-bs-target="#modal-delete-document" data-bs-toggle="modal" data-document-id="{{ $document->id }}" class="badge bg-danger borderless">Xoá</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade text-left" id="modal-delete-document" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Xoá tài liệu</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Tài liệu xoá sẽ không khôi phục được, bạn có chắn chắn xoá?
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

<script src="{{ asset('js/pages/document/document.js') }}"></script>
@endsection
