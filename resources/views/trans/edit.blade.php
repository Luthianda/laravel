@extends('app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{$title}}</h3>
                <form action="{{route('customer.update', $edit->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="" class="form-lable">Nama</label>
                    <input type="text" class="form-control" name="customer_name" value="{{$edit->name}}" required>

                    <label for="" class="form-lable">No Telp</label>
                    <input type="number" class="form-control" name="phone" value="{{$edit->phone}}">

                    <label for="" class="form-lable">Alamat</label>
                    <textarea name="description" class="form-control" cols="30" rows="5">{{$edit->address}}</textarea>

                    <button type="submit" class="btn btn-primary mt-2">Buat</button>
                    <a href="{{url()->previous()}}" class="btn btn-secondary mt-2">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
