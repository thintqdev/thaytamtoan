@extends('admin.layouts.app')

@section('title', 'Lớp học')

@section('content')
    <!-- Bordered table start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="card-header">
                    <h4 class="card-title">Danh sách lớp học</h4>
                </div>
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-add-group"
                    class="btn btn-primary float-end"><i class="bi bi-plus-circle"></i> Thêm lớp học
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên lớp</th>
                            <th>Mô tả</th>
                            <th>Số lượng</th>
                            <th>Lịch dạy</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->description }}</td>
                                <td>{{ $group->quantity }}</td>
                                <td>
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
                                </td>
                                <td>
                                    <a href="{{ route('group.detail', ['id' => $group->id]) }}"<span
                                        class="badge bg-success">Xem</span></a>
                                    <a href="{{ route('group.edit', ['id' => $group->id]) }}"<span
                                        class="badge bg-warning">Sửa</span></a>
                                    <button type="button" data-bs-target="#modal-delete-group" data-bs-toggle="modal"
                                        data-group-id="{{ $group->id }}" class="badge bg-danger borderless">Xoá</button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Bordered table end -->

    <!-- Modal add group -->
    <div class="modal fade" id="modal-add-group" tabindex="-1" aria-labelledby="modal-add-group-label" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-add-group-label">Thêm lớp học</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="class-name">Tên lớp học:</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="class-description">Mô tả lớp học:</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="class-description">Số lượng:</label>
                                <select class="form-select" name="quantity">
                                    @for ($i = 1; $i <= 50; $i++)
                                        <option> {{ $i }} </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lesson-count">Số buổi dạy</label>
                                <select class="form-control" id="lesson-count">
                                    <option value="1">1 buổi</option>
                                    <option value="2">2 buổi</option>
                                    <option value="3">3 buổi</option>
                                </select>
                            </div>

                            <div id="lesson-times">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="day-of-week">Thứ</label>
                                            <small class="text-muted">Ví dụ: Chủ nhật: 1, Thứ 2: 2, ...</small>
                                            <input type="number" class="form-control" id="day-of-week" name="day_of_week"
                                                min="1" max="7">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="start-time">Giờ bắt đầu</label>
                                            <input type="time" class="form-control" id="start_time" name="start_time"
                                                value="07:00">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="end-time">Giờ kết thúc</label>
                                            <input type="time" class="form-control" id="end_time" name="end_time"
                                                value="09:00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-primary" id="create-staff-btn">Tạo lớp học</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modal-delete-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <form>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">Xoá lớp học</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Lớp học xoá sẽ không khôi phục được, bạn có chắn chắn xoá?
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

    <script src="{{ asset('js/pages/group/group.js') }}"></script>
@endsection
