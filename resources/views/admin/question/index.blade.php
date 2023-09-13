@extends('admin.layouts.app')

@title('title', 'Câu hỏi')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                <h4 class="card-title">Danh sách câu hỏi</h4>
            </div>
            <a href="{{ route('question.create_form', ['exam' => $exam]) }}" class="btn btn-primary float-end"><i class="bi bi-plus-circle"></i> Thêm câu hỏi
            </a>

        </div>

        <div class="card-body">

            <table class="table table-striped" id="data-question">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="col-8">Nội dung</th>
                        <th class="col-1">Mức độ</th>
                        <th class="col-1">Danh mục</th>
                        <th class="col-1">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questions as $question)
                    <tr>
                        <td> {{ $question->id }} </td>
                        <td> {{ $question->content }} </td>
                        <td> {{ $question->level }} </td>
                        <td> {{ $question->category->name }} </td>
                        <td>
                            <a href="">
                                <span class="badge bg-success">Xem</span>
                            </a>
                            <a href="">
                                 <span class="badge bg-warning">Sửa</span>
                            </a>
                            <button type="button" data-bs-target="#modal-delete-question"
                            data-bs-toggle="modal"
                            data-question-id=""
                            class="badge bg-danger borderless">Xoá</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
