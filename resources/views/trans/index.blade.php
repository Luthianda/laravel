@extends('app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{$title}}</h3>
                <div class="mb-3" align="right">
                    <a href="{{route('trans.create')}}" class="btn btn-primary">Tambah</a>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>No Pesanan</th>
                        <th>Pelanggan</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($datas as $index => $data)
                    <tr>
                        <td>{{$index += 1}}</td>
                        <td><a href="{{route('trans.show', $data->id)}}">{{$data->order_code}}</a></td>
                        <td>{{$data->customer->name}}</td>
                        <td>{{$data->order_end_date}}</td>
                        <td>{{$data->status_text}}</td>
                        <td>
                            <a href="{{route('print_struk', $data->id)}}" class="btn btn-success btn-sm">Cetak</a>
                            <a href="{{route('trans.show', $data->id)}}" class="btn btn-warning btn-sm">Ubah</a>
                            <form action="{{route('trans.destroy', $data->id)}}" method="post" style="display: inline">
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
