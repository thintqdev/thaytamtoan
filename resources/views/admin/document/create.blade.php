@extends('admin.layouts.app')

@section('title', 'Tài liệu')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tạo tài liệu</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('document.create') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="class-name"> Tên tài liệu </label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="class-name"> Mô tả tài liệu </label>
                        <textarea id="summernote" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label> Link google drive </label>
                        <input type="text" class="form-control" name="google_drive_url">
                    </div>
                    <div class="form-group">
                        <label> Loại tài liệu </label>
                        <select class="form-select" name="mime_type">
                            <option value="pdf">PDF</option>
                            <option value="docx">DOCX</option>
                            <option value="other">Khác</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Danh mục </label>
                        <select class="form-select" name="category_id">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('document.list') }}" class="btn btn-secondary">Đóng</a>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('vendors/summernote/summernote-lite.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 500
            , toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']]
                , ['font', ['strikethrough', 'superscript', 'subscript']]
                , ['fontsize', ['fontsize']]
                , ['color', ['color']]
                , ['para', ['ul', 'ol', 'paragraph']]
                , ['height', ['height']]
                , ['table', ['table']]
                , ['insert', ['link', 'picture', 'video']]
                , ['view', ['fullscreen', 'codeview', 'help']]
            , ]
        , });
        var noteBar = $('.note-toolbar');
        noteBar.find('[data-toggle]').each(function() {
            $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
        });
        $('.note-editor [data-event="insertUnorderedList"]').tooltip('disable');
    });

</script>
@endsection
