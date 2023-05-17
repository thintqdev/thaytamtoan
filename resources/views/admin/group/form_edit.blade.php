@extends('admin.layouts.app')

@section('title', 'Lớp học')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Chỉnh lớp học</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('group.update', ['id' => $group->id]) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="class-name">Tên lớp học:</label>
                            <input type="text" class="form-control" name="name" value="{{ $group->name }}">
                        </div>
                        <div class="form-group">
                            <label for="class-description">Mô tả lớp học:</label>
                            <input type="text" class="form-control" name="description" value="{{ $group->description }}">
                        </div>
                        <div class="form-group">
                            <label for="class-quantity">Số lượng:</label>
                            <select class="form-select" name="quantity">
                                @for ($i = 1; $i <= 50; $i++)
                                    <option value="{{ $i }}" {{ $i == $group->quantity ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lesson-count">Số buổi dạy</label>
                            <select class="form-control" id="lesson-count">
                                @for ($i = 1; $i <= 3; $i++)
                                    <option value="{{ $i }}"
                                        {{ $i == $group->schedules->count() ? 'selected' : '' }}>
                                        {{ $i }} buổi
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div id="lesson-times">
                            @foreach ($group->schedules as $schedule)
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="day-of-week">Thứ</label>
                                            <small class="text-muted">Ví dụ: Chủ nhật: 1, Thứ 2: 2, ...</small>
                                            <input type="number" class="form-control" id="day-of-week" name="day_of_week[]"
                                                value="{{ $schedule->day_of_week }}" min="1" max="7">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="start-time">Giờ bắt đầu</label>
                                            <input type="time" class="form-control" id="start_time" name="start_time[]"
                                                value="{{ $schedule->start_time }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="end-time">Giờ kết thúc</label>
                                            <input type="time" class="form-control" id="end_time" name="end_time[]"
                                                value="{{ $schedule->end_time }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('group.list') }}" class="btn btn-secondary">Đóng</a>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/pages/group/group.js') }}"></script>
@endsection
