@extends('admin.layouts.app')

@section('title', 'Đề thi')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Chi tiết đề thi</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form>
                    <div class="form-group">
                        <label for="class-name">Tên đề thi:</label>
                        <p class="text-black">{{ $exam->title }}</p>
                    </div>
                    <div class="form-group">
                        <label for="class-description">Loại đề thi:</label>
                        <p class="text-black">{{ $exam->type ? 'Thi cố định' : 'Thi tự do' }}</p>
                    </div>
                    <div class="form-group">
                        <label for="class-google_drive_url">Số lượng câu hỏi:</label>
                        <p class="text-black">{{ $exam->total_question }}</p>
                    </div>
                    <div class="form-group">
                        <label> Loại tài liệu: </label>
                        <p class="text-black">{{ $exam->duration }}</p>
                    </div>
                    <div class="form-group">
                        <label> Bắt đầu - Kết thúc </label>
                        <p class="text-black"><strong>{{ $exam->started_at }}</strong> đến <strong>{{ $exam->ended_at }}</strong></p>
                    </div>
                    <div class="form-group">
                        <label> Trạng thái </label>
                        <div class="form-check">
                            <div class="checkbox">
                                <input type="checkbox" class="form-check-input" disabled @if($exam->status) checked @else '' @endif>
                                <label for="checkbox3">Active</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="{{ route('exam.list') }}" class="btn btn-secondary">Đóng</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
