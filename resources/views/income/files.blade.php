@extends("layouts.main")
@section("content")
    {{html()->form()->route("income.fileStore", $income)->acceptsFiles()->open()}}
    <div class="mb-2">
        {{html()->file("files[]")->class("form-control")->multiple()->required()}}
        @if($errors)
            {{$errors->first("files")}}
        @endif
    </div>
    {{html()->submit("Yükle")->class("btn btn-blue")}}
    {{html()->form()->close()}}
    @if($income->hasMedia("files"))
        <div class="row mt-3">
            @foreach($income->getMedia("files") as $file)
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            {{$file->name}}
                        </div>
                        <div class="card-body">
                            <button class="btn btn-sm btn-secondary view-file"
                                    data-url="{{$file->getFullUrl()}}"
                                    data-type="{{$file->mime_type}}">
                                <i class="las la-eye"></i> Görüntüle
                            </button>
                            <a href="{{$file->getFullUrl()}}" class="btn btn-sm btn-secondary"><i
                                        class="las la-download"></i> İndir</a>
                            {{html()->form("DELETE")->route("licence.fileDelete", [$income,$file])->class("d-inline")->open()}}
                            <button class="btn btn-sm btn-danger delete-button" type="button"><i
                                        class="las la-times"></i></button>
                            {{html()->form()->close()}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-purple shadow-sm border-theme-white-2 mb-0 mt-3" role="alert">
            <div
                    class="d-inline-flex justify-content-center align-items-center thumb-xs bg-purple rounded-circle mx-auto me-1">
                <i class="fas fa-info align-self-center mb-0 text-white "></i>
            </div>
            Henüz Bu Ruhsat İçin Dosya Yüklenmemiştir.
        </div>
    @endif
    <div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileModalLabel">Dosya Görüntüle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
@endsection
