@extends('admin.layouts.app')
@section('title', 'Tạo câu hỏi')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tạo câu hỏi</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form id="createQuestion">
                    @csrf
                    <input type="hidden" name="exam_id" value="{{$exam->id}}" id="exam_id">
                    <div class="form-group">
                        <div id="editor" name="content" placeholder="Type the content here!">
                        </div>
                    </div>
                    <label class="text-black">Mức độ</label>
                    <select class="form-select" name="level" id="level">
                        @foreach($levels as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    <label class="text-black">Danh mục</label>
                    <select class="form-select" name="category_id" id="parentId">
                        @foreach($parent_categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div class="modal-footer">
                        <a href="{{ route('question.list', ['exam' => $exam]) }}" class="btn btn-secondary">Đóng</a>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    MathJax.Ajax.config.path["mhchem"] = "https://cdnjs.cloudflare.com/ajax/libs/mathjax-mhchem/3.3.2";
    MathJax.Hub.Config({
        showMathMenu: false
        , TeX: {
            extensions: ["[mhchem]/mhchem.js"]
        }
        , messageStyle: "none"
        , tex2jax: {
            preview: "none"
        }
    });

</script>
<script>
    function getEditorData() {
        const data = window.ckeditor.getData();
        return data
    }

    ClassicEditor.create(document.querySelector('#editor'), {
            math: {
                engine: 'mathjax'
                , renderType: 'mathml'
                , enablePreview: true
            },
            ckfinder: {
                uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
            }
        })
        .then(editor => {
            window.ckeditor = editor;
            getEditorData();
            editor.model.document.on('change:data', () => {
                getEditorData();
            });
        })
        .catch(err => {
            console.error(err);
        });

    $('#createQuestion').submit(function (e) {
        e.preventDefault();
        content = getEditorData();
        level = $('#level').val();
        category_id = $('#parentId').val();
        exam_id = $('#exam_id').val()
        data = {
            content, level,  category_id, exam_id
        }
        $.ajax({
            method: 'POST',
            url: `/admin/exams/${exam_id}/questions`,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                toastr.success('Đã tạo câu hỏi thành công');
                location.href = '/admin/exams'
            },
            error: function(xhr, status, error) {
                toastr.error('Không thể tạo câu hỏi. Vui lòng thử lại sau.');
            }
        });
    })
</script>

@endsection
