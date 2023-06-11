@extends('admin.layouts.app')

@section('title', 'Tạo đề thi')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tạo đề thi</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('exam.create') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="class-name"> Tên đề thi </label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label> Loại đề thi </label>
                        <select class="form-select" name="type">
                            <option value="1">Thi tự do</option>
                            <option value="2">Thi cố định</option>
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
                            <option value="{{$value}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Thời lượng </label>
                        <select class="form-select" name="duration">
                            @foreach($durations as $value)
                            <option value="{{$value}}">{{$value}} phút</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="date">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="start-time">Bắt đầu</label>
                                    <input type="datetime-local" class="form-control" name="started_at" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label> Kết thúc </label>
                                    <input type="datetime-local" class="form-control" name="ended_at"/ >
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
