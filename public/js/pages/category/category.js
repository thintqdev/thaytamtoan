$(document).ready(function() {
    $('#add-category').on('click', function() {
        var newRow = $('<tr><form></form></tr>');

        var idInput = $('<td></td>');
        var nameInput = $('<td><input type="text" class="name-input" name="name"></td>');
        var slugInput = $('<td></td>');
        var parentNameInput = $(`<td><select class="form-select" name="parent_id"><option value=null>Không có tên danh mục cha</option></select></td>`);
        $.ajax({
            url: 'categories/get-categories',
            method: 'GET',
            success: function(data) {
                if (data && data.length > 0) {
                    var selectElement = parentNameInput.find('select');
                    $.each(data, function(index, category) {
                        var option = $('<option></option>');
                        option.val(category.id)
                        option.text(category.name);
                        selectElement.append(option);
                    });
                }
            },
            error: function(err) {
                console.log(err);
                console.log('Đã xảy ra lỗi khi lấy dữ liệu từ bảng category.');
            }
        });

        var actionCell = $('<td><button type="button" class="btn btn-secondary">Đóng</button> <button id="save-category" class="btn btn-primary">Lưu</button></td>');

        newRow.append(idInput)
        newRow.append(nameInput);
        newRow.append(slugInput);
        newRow.append(parentNameInput);
        newRow.append(actionCell);

        $('#data-category tbody').append(newRow);

        actionCell.find('#save-category').on('click', function(event) {
            event.preventDefault();
            var parent_id = newRow.find('select').val();
            var data = {
                _token: $('meta[name="csrf-token"]').attr('content'),
                name: newRow.find('.name-input').val()
            };

            if (parent_id !== 'null') {
                data.parent_id = parent_id;
            }
            $.ajax({
                method: 'POST',
                url: '/admin/categories',
                data: data,
                success: function(response) {
                    toastr.success('Đã tạo danh mục thành công.');
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    toastr.error('Không thể tạo danh mục. Vui lòng thử lại sau.');
                }
            });
        });
    });

    $('button[data-bs-target="#modal-delete-category"]').on('click', function() {
        var categoryId = $(this).data('category-id');
        $('#modal-delete-category').data('category-id', categoryId);
    });

    $('#confirmDelete').click(function(event) {
        event.preventDefault();
        var categoryId = $('#modal-delete-category').data('category-id');
        $.ajax({
            url: '/admin/categories/' + categoryId,
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