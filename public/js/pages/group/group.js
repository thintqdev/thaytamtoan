$(document).ready(function () {
    $('#lesson-count').on('change', function () {
        var lessonCount = parseInt($(this).val());
        var lessonTimes = $('#lesson-times');
        lessonTimes.empty();
        for (var i = 1; i <= lessonCount; i++) {
            var newRow = $('<div class="row">');
            var col1 = $('<div class="col">').html('<div class="form-group"><label for="day_of_week_' + i + '">Thứ</label><small class="text-muted"> Ví dụ: Chủ nhật: 1, Thứ 2: 2, ...</small><input type="number" class="form-control" id="day-of-week_' + i + '" name="day_of_week[]" min="1" max="7"></div>');
            var col2 = $('<div class="col">').html('<div class="form-group"><label for="start_time_' + i + '">Giờ bắt đầu</label><input type="time" class="form-control" id="start_time_' + i + '" name="start_time[]" value="07:00"></div>');
            var col3 = $('<div class="col">').html('<div class="form-group"><label for="end_time_' + i + '">Giờ kết thúc</label><input type="time" class="form-control" id="end_time_' + i + '" name="end_time[]" value="09:00"></div>');
            newRow.append(col1, col2, col3);
            lessonTimes.append(newRow);
        }
    })

    // Form add group
    $('#create-staff-btn').click(function(event) {
        event.preventDefault();
        var formData = $('form').serialize();
        $.ajax({
            method: 'POST',
            url: '/admin/groups',
            data: formData,
            success: function(response) {
                toastr.success('Đã tạo lớp học thành công.');
                $('#modal-add-group').modal('hide');
                window.location.reload();
            },
            error: function(xhr, status, error) {
                toastr.error('Không thể tạo lớp học. Vui lòng thử lại sau.');
            }
        });
    });

    $('button[data-bs-target="#modal-delete-group"]').on('click', function() {
        var groupId = $(this).data('group-id');
        $('#modal-delete-group').data('group-id', groupId);
    });

    $('#confirmDelete').click(function (event) {
        event.preventDefault();
        var groupId = $('#modal-delete-group').data('group-id');
        $.ajax({
            url: '/admin/groups/' + groupId,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                toastr.success('Đã xóa nhóm thành công.');
                window.location.reload();
            },
            error: function (xhr) {
                toastr.error('Không thể xóa nhóm. Vui lòng thử lại sau.');
            }
        });
    });

    $('#modalEditGroup').click(function (event) {
        event.preventDefault();
    })

})


