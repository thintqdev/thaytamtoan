@extends('admin.layouts.app')

@section('title', 'Đề thi')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Chỉnh sửa đề thi</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('exam.update', ['exam' => $exam]) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="class-name"> Tên đề thi </label>
                        <input type="text" class="form-control" name="title" value="{{ $exam->title }}">
                    </div>
                    <div class="form-group">
                        <label> Loại đề thi </label>
                        <select class="form-select" name="type">
                            <option value="1" @if ($exam->type === 1) selected @endif>Thi cố định</option>
                            <option value="2" @if ($exam->type === 2) selected @endif>Thi tự do</option>
                        </select>
                    </div>
                    @php
                        $totalQuestions = config('view.exam.total_question');
                        $durations = config('view.exam.duration');
                    @endphp
                    <div class="form-group">
                        <label> Số lượng câu hỏi </label>
                        <select class="form-select" name="total_question">
                            @foreach($totalQuestions as $value)
                            <option value="{{ $value }}" {{ $value == $exam->total_question ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Thời lượng </label>
                        <select class="form-select" name="duration">
                            @foreach($durations as $value)
                            <option value="{{ $value }}" {{ $value == $exam->duration ? 'selected' : '' }}>
                                {{ $value }} phút
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div id="date">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="start-time">Bắt đầu</label>
                                    <input type="datetime-local" class="form-control" name="started_at" value="{{$exam->started_at}}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label> Kết thúc </label>
                                    <input type="datetime-local" class="form-control" name="ended_at" value="{{$exam->ended_at}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('exam.list') }}" class="btn btn-secondary">Đóng</a>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection