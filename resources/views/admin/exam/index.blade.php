@extends('admin.layouts.app')

@title('title', 'Đề thi')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                <h4 class="card-title">Danh sách đề thi</h4>
            </div>
            <a href="{{ route('exam.create_form') }}" class="btn btn-primary float-end"><i class="bi bi-plus-circle"></i> Thêm đề thi
            </a>
        </div>

        <div class="card-body">
            <table class="table table-striped" id="data-exam">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="col-4">Tên</th>
                        <th class="col-1">Loại</th>
                        <th class="col-1">Thời hạn</th>
                        <th class="col-1">Tổng số câu hỏi</th>
                        <th class="col-1">Bắt đầu</th>
                        <th class="col-1">Kết thúc</th>
                        <th class="col-1">Trạng thái</th>
                        <th class="col-1">Hành động</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($exams as $exam)
                    <tr>
                        <td> {{ $exam->id }} </td>
                        <td> {{ $exam->title }} </td>
                        <td> {{ $exam->type == 1 ? 'Thi cố định' : 'Thi tự do' }} </td>
                        <td> {{ $exam->duration }} </td>
                        <td> {{ $exam->total_question }} </td>
                        <td> {{ $exam->started_at }} </td>
                        <td> {{ $exam->ended_at }} </td>
                        <td>
                            @if($exam->status)
                            <span class="badge bg-light-success">Active</span>
                            @elseif($exam->status == 0)
                            <span class="badge bg-light-danger">Locked</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('exam.show', ['exam' => $exam]) }}"
                                <span class="badge bg-success">Xem</span>
                            </a>
                            <a href="{{ route('exam.edit', ['exam' => $exam]) }}"
                                 <span class="badge bg-warning">Sửa</span>
                            </a>
                            <button type="button" data-bs-target="#modal-delete-exam"
                            data-bs-toggle="modal"
                            data-exam-id="{{ $exam->id }}"
                            class="badge bg-danger borderless">Xoá</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="modal fade text-left" id="modal-delete-exam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="exam">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Xoá đề thi</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Đề thi xoá sẽ không khôi phục được, bạn có chắn chắn xoá?
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
<script src="{{ asset('js/pages/exam/exam.js') }}"></script>
@endsection
