@extends("admin.layouts.main")
@section("title","Harcama Dökümanları")
@push("style")
    <link rel="stylesheet" href="{{asset("admin/css/uppy.min.css")}}">
@endpush
@section("content")
    <div id="drag-drop-area" data-url="{{route("admin.income.files.store",$income)}}"></div>
@endsection
@push("script")
    <script src="{{asset("admin/js/uppy.legacy.min.js")}}"></script>
    <script src="{{asset("admin/js/file-upload.init.js")}}"></script>
@endpush
