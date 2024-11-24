@extends("layouts.main")
@section("title", "Kullanıcılar")
@section("button")
    <button data-url="{{route("user.create")}}" class="btn btn-sm btn-blue modal-action">Kullanıcı Ekle
    </button>
@endsection
@section("content")
    <table class="table table-striped border">
        <thead class="table-light">
        <tr>
            <th>Adı</th>
            <th>Email Adresi</th>
            <th class="text-end">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td class="text-end">
                    <button type="button" data-url="{{route("user.edit", $user)}}"
                            class="btn btn-sm btn-blue modal-action"><i
                            class="las la-pen"></i></button>
                    {{html()->form("DELETE", route("user.destroy", $user))->class("d-inline")->open()}}
                    <button type="button" class="btn btn-sm btn-danger delete-button"><i class="las la-trash-alt"></i>
                    </button>
                    {{html()->form()->close()}}
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="float-end">
        {{$users->links("pagination::bootstrap-4")}}
    </div>
@endsection
