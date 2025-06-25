@extends('app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-header text">
                    <h1>Service Manage</h1>
                </div>
                <div class="card-body">
                    <a href="{{url('insert/service')}}" class="btn btn-primary mt-2 mb-2">Create</a>
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>No</th>
                            <th>Service Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="" class="btn btn-info">Edit</a>
                                <form action="" method="post" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="sumbit" onclick="return confirm('yakin beud nich pen apus??')" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
