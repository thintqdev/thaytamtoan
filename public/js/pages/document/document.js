$(document).ready(function() {
    $('button[data-bs-target="#modal-delete-document"]').on('click', function() {
        var documentId = $(this).data('document-id');
        $('#modal-delete-document').data('document-id', documentId);
    });

    $('#confirmDelete').click(function(event) {
        event.preventDefault();
        var documentId = $('#modal-delete-document').data('document-id');
        $.ajax({
            url: '/admin/documents/' + documentId,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                toastr.success('Đã xóa danh mục thành công.');
                window.location.reload();
            },
            error: function(xhr) {
                toastr.error('Không thể xóa danh mục. Vui lòng thử lại sau.');
            }
        });
    });
});