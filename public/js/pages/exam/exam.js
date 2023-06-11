$(document).ready(function() {
    $('button[data-bs-target="#modal-delete-exam"]').on('click', function() {
        var examId = $(this).data('exam-id');
        $('#modal-delete-exam').data('exam-id', examId);
    });

    $('#confirmDelete').click(function(event) {
        event.preventDefault();
        var examId = $('#modal-delete-exam').data('exam-id');
        console.log(examId);
        $.ajax({
            url: '/admin/exams/' + examId,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                toastr.success('Đã xóa đề thi thành công.');
                window.location.reload();
            },
            error: function(xhr) {
                toastr.error('Không thể xóa đề thi. Vui lòng thử lại sau.');
            }
        });
    });
});