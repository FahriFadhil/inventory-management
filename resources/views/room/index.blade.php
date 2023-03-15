@extends('layouts.app')

@section('content')

<div class="container" id="room">

    <div class="card mb-5">
        <div class="card-header">
            Add New Room
        </div>
        <div class="card-body p-3">
            <form action="{{ route('room.store') }}" method="post">
                @csrf
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Room Number</div>
                    </div>
                    <input type="text" class="form-control" id="room-number" name="room_number" placeholder="New Room..." required autocomplete="off">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Size</label>
                    </div>
                    <select name="room_size" class="custom-select w-20" id="inputGroupSelect01" required>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                    <div class="input-group-prepend">
                        <label class="input-group-text">Caretaker</label>
                    </div>
                    <select name="id_user" class="custom-select w-20" id="inputGroupSelect01" required>
                        @foreach ($data[1] as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append ms-auto">
                        <button type="submit" class="btn btn-primary">&#43; Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-hover shadow rounded table-borderless" id="roomTable">
        <thead class="">
            <th class="p-2 pl-4">Room</th>
            <th class="p-2">Room Size</th>
            <th class="p-2">Caretaker</th>
            <th class="p-2 px-3">Action</th>
        </thead>
        <tbody>
            @foreach ($data[0] as $room)
            <tr>
                <td class="col-2 pt-2 pl-4">{{ $room->room_number }}</td>
                <td class="col-3 pt-2">{{ ucfirst($room->room_size) }}</td>
                <td class="col-4 pt-2">{{ $room->user->name }}</td>
                <td class="col-4 py-2">
                    <form action="{{ route('room.destroy', $room->id) }}" method="post">
                        <button id="btn-edit-room" type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#EditRoomModal" data-room-id="{{ $room->id }}">Edit</button>
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure to Delete Room \'{{$room->room_number}}\'?\nYou can\'t undo this action!');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade mx-auto" id="EditRoomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Room Data</h5>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Room Number</div>
                            </div>
                            <input type="text" class="form-control" id="room-number" name="room_number" placeholder="New Room..." required autocomplete="off">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Size</label>
                            </div>
                            <select name="room_size" class="custom-select w-20" id="room-size" required>
                                <option value="small">Small</option>
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                            </select>
                            <div class="input-group-prepend">
                                <label class="input-group-text">Caretaker</label>
                            </div>
                            <select name="id_user" class="custom-select w-20" id="user" required>
                                @foreach ($data[1] as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
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
        $('#roomTable').DataTable();
    });

    $(document).on('click', '#btn-edit-room', function() {
        var roomId = $(this).data('room-id');
        $.ajax({
            type: 'GET',
            url: '/room/' + roomId + '/edit',
            success: function(data) {
                document.querySelector('#EditRoomModal #room-number').value = data.room_number;
                document.querySelector('#EditRoomModal #room-size').value = data.room_size;
                document.querySelector('#EditRoomModal #user').value = data.user;
                document.querySelector('#EditRoomModal #editForm').setAttribute('action', `/room/${roomId}`);
                document.querySelector(`#EditRoomModal #user [value="${data.id_user}"]`).setAttribute('selected', `selected`);
                console.log(data)
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>

@endsection