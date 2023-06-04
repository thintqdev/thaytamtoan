@extends('admin.layouts.app')

@section('title', 'tài liệu')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Chi tiết tài liệu</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form>
                    <div class="form-group">
                        <label for="class-name">Tên tài liệu:</label>
                        <p class="text-black">{{ $document->name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="class-description">Mô tả tài liệu:</label>
                        <p class="text-black">{!! html_entity_decode($document->description) !!}</p>
                    </div>
                    <div class="form-group">
                        <label for="class-google_drive_url">Link google drive</label>
                        <p class="text-black"><a href="#" data-bs-target="#modal-preview-google-drive" data-bs-toggle="modal"> Xem trước</a></p>

                    </div>
                    <div class="form-group">
                        <label> Loại tài liệu </label>
                        <p class="text-black">{{ $document->mime_type }}</p>
                    </div>
                    <div class="form-group">
                        <label> Trạng thái </label>
                        <div class="form-check">
                            <div class="checkbox">
                                <input type="checkbox" class="form-check-input" disabled @if($document->status) checked @else '' @endif>
                                <label for="checkbox3">Active</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="{{ route('document.list') }}" class="btn btn-secondary">Đóng</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-preview-google-drive" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Xem trước link google drive</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-content">
                <div class="modal-body">
                    @if($document->mime_type != App\Models\Document::MIME_TYPE['PDF'])
                    <p>Định dạng chưa hỗ trợ xem trước</p>
                    @else
                    <iframe src="{{ convertLinkGoogleDrive($document->google_drive_url) }}" width="1080" height="720" allow="autoplay"></iframe>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
