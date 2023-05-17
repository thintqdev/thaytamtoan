@extends('admin.layouts.app')

@section('title', 'Lớp học')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Chi tiết lớp học</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="class-name">Tên lớp học:</label>
                            <p class="text-black">{{ $group->name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="class-description">Mô tả lớp học:</label>
                            <p class="text-black">{{ $group->description }}</p>
                        </div>
                        <div class="form-group">
                            <label for="class-quantity">Số lượng:</label>
                            <p class="text-black">{{ $group->quantity }}</p>
                        </div>
                        <div class="form-group">
                            <label for="class-lesson-count">Số buổi dạy</label>
                            <p class="text-black">{{ $group->schedules->count() }}</p>
                        </div>
                        <div class="form-group">
                            <label for="class-schedule">Lịch dạy</label>
                            <div class="schedule-grid">
                                @php
                                    $daysOfWeek = [
                                        1 => 'Chủ nhật',
                                        2 => 'Thứ 2',
                                        3 => 'Thứ 3',
                                        4 => 'Thứ 4',
                                        5 => 'Thứ 5',
                                        6 => 'Thứ 6',
                                        7 => 'Thứ 7',
                                    ];
                                @endphp
                                @foreach ($group->schedules as $schedule)
                                    <div class="schedule-item">
                                        <p>{{ $daysOfWeek[$schedule->day_of_week] }}</p>
                                        <p>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                            {{ date('h:i A', strtotime($schedule->end_time)) }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('group.list') }}" class="btn btn-secondary">Đóng</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/pages/group/group.js') }}"></script>
@endsection
