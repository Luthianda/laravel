@extends('app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{$title}}</h3>
                <form action="{{route('trans.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="" class="form-label">No Pesanan</label>
                            <input type="text" class="form-control" name="order_code" readonly value="{{$orderCode ?? ''}}">

                            <div class="mt-3 mb-3">
                                <label for="" class="form-label">Pelanggan</label>
                                <select class="form-control" name="id_customer">
                                <option value="">Pilih Pelanggan</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="" class="form-label">Servis</label>
                                <select class="form-control" id="id_service" name="id_service">
                                <option value="">Pilih Servis</option>
                                    @foreach ($services as $service)
                                        <option data-price="{{$service->price}}" value="{{$service->id}}">{{$service->service_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="" class="form-label">Estimasi</label>
                                <input type="date" name="order_end_date" class="form-control">
                            </div>
                            <label for="" class="form-label">Catatan</label>
                            <textarea name="note" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="mt-3 mb-3">
                        <div align="right" class="mb-3">
                            <button type="button" class="btn btn-primary addRow">Tambah Baris</button>
                        </div>
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Servis</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    
                    <div class="mb-3">
                        <p><strong>Grand Total: Rp. <span id="grandTotal">0</span></strong></p>
                        <input type="hidden" name="grand_total" id="grandTotalInput" value="0">
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    <a href="{{url()->previous()}}" class="btn btn-secondary mt-2">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
