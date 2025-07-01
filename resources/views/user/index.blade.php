@extends('app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{$title}}</h3>
                <div class="mb-3" align="right">
                    <a href="{{route('user.create')}}" class="btn btn-primary">Tambah</a>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($datas as $index => $data)
                    <tr>
                        <td>{{$index += 1}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>
                            <a href="{{route('user.edit', $data->id)}}" class="btn btn-warning btn-sm">Ubah</a>
                            <form action="{{route('user.destroy', $data->id)}}" method="post" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="sumbit" onclick="return confirm('yakin beud nich pen apus??')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
