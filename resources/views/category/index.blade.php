@extends('layouts.app')

@section('content')

<div class="container" id="category">

    <div class="card mb-5">
        <div class="card-header">
            Add New Category
        </div>
        <div class="card-body p-3">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Category</div>
                    </div>
                    <input type="text" class="form-control" id="category-name" name="category_name" placeholder="New Category..." required autocomplete="off">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">&#43; Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-hover shadow rounded table-borderless" id="categoryTable">
        <thead class="">
            <th class="p-2 pl-4">Category</th>
            <th class="p-2 px-3">Action</th>
        </thead>
        <tbody>
            @foreach ($data as $category)
            <tr>
                <td class="col-8 px-3 pt-2 pl-4">{{ $category->category_name }}</td>
                <td class="col-4 px-3 py-2">
                    <form action="{{ route('category.destroy', $category->id) }}" method="post">
                        <button id="btn-edit-category" type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#EditCategoryModal" data-category-id="{{ $category->id }}">Edit</button>
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure to Delete \'{{$category->category_name}}\'?\nYou can\'t undo this action!');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="EditCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="editForm" method="POST">

                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Category Name</h5>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Category</div>
                            </div>
                            <input type="text" class="form-control" id="name" name="category_name" required autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>


@endsection

@section('script')

<script>
    $(document).ready(function() {
        $('#categoryTable').DataTable();
    });

    $(document).on('click', '#btn-edit-category', function() {
        var categoryId = $(this).data('category-id');
        $.ajax({
            type: 'GET',
            url: '/category/' + categoryId + '/edit',
            success: function(data) {
                document.querySelector('#EditCategoryModal #name').value = data.category_name;
                document.querySelector('#EditCategoryModal #editForm').setAttribute('action', `/category/${categoryId}`);
                console.log(data)
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>

@endsection