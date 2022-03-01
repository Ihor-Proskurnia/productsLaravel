@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Product</div>

                <div class="card-body">

                    <a href="/home" class="btn btn-secondary"><- Main</a>

                    <form action="{{ route('update') }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label>Id</label>
                        <input type="text" class="form-control" name="id">
                      </div>
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                      </div>
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price">
                      </div>
                      <div class="form-group">
                        <label>Desc</label>
                        <input type="text" class="form-control" name="desc">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
