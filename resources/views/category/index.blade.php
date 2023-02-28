@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover border rounded" id="myTable">
                    <thead>
                        <th>Category</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $category)
                        <tr>
                            <td class="pt-3">{{ $category->category_name }}</td>
                            <td style="width: 160px;">
                                <form action="">
                                    <a href="" class="btn btn-warning">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Category</div>
                    </div>
                    <input type="text" class="form-control" id="category-name" name="category_name" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">&#43; Add New</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection