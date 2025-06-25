@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-header text">
                    <h1>Create Service</h1>
                </div>
                <div class="card-body">
                    <form action="" method="">
                        @csrf
                        <label for="" class="form-lable">Service Name</label>
                        <input type="text" class="form-control" name="service_name" required>

                        <label for="" class="form-lable">Price</label>
                        <input type="number" class="form-control" name="price" required>

                        <label for="" class="form-lable">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="5"></textarea>

                        <button type="submit" class="btn btn-primary mt-2">Create</button>
                        <a href="{{url('service')}}" class="btn btn-secondary mt-2">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
