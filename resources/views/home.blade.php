@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="product/addForm" class="btn btn-success">Add new</a>
                    <a href="product/updateForm" class="btn btn-warning">Edit</a>
                    <a href="product/deleteForm" class="btn btn-danger">Del</a>

                    <form action="{{ route('getAllProducts') }}" method="GET" class="float-right mr-2">
                        @csrf
                        <input type="hidden" class="form-control" name="sort" value="ASC">
                        <button type="submit" class="btn btn-secondary">ASC</button>
                    </form>

                    <form action="{{ route('getAllProducts') }}" method="GET" class="float-right mr-2">
                        @csrf
                        <input type="hidden" class="form-control" name="sort" value="DESC">
                        <button type="submit" class="btn btn-secondary">DESC</button>
                    </form>

                    <label class="float-right mr-2 btn btn-light">Price</label>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Desc</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}$</td>
                                    <td>{{ $item->desc }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
