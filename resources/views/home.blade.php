@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h1>Motorcycles</h1>
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addMotorcycleModal">
        Add Motorcycle
    </button>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Status</th>
                <th>Owner</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (count($motorcycles) > 0)
            @foreach ($motorcycles as $motorcycle)
            <tr>
                <td>{{ $motorcycle->id }}</td>
                <td>{{ $motorcycle->name }}</td>
                <td>{{ $motorcycle->price }}</td>
                <td>{{ $motorcycle->status }}</td>
                <td>{{ $motorcycle->user->name }}</td>
                <td>
                    @if ($motorcycle->image)
                    <img src="{{ asset('storage/' . $motorcycle->image) }}" alt="{{ $motorcycle->name }}" width="100">
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                        data-target="#editMotorcycleModal" data-id="{{ $motorcycle->id }}"
                        data-name="{{ $motorcycle->name }}" data-price="{{ $motorcycle->price }}"
                        data-status="{{ $motorcycle->status }}"
                        data-image="{{ $motorcycle->image ? asset('storage/' . $motorcycle->image) : '' }}">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#deleteMotorcycleModal" data-id="{{ $motorcycle->id }}">Delete</button>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center">No motorcycles found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

<!-- Add Motorcycle Modal -->
<div class="modal fade" id="addMotorcycleModal" tabindex="-1" role="dialog" aria-labelledby="addMotorcycleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addMotorcycleModalLabel">Add Motorcycle</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"
                    style="filter: invert(1);"></button>
            </div>
            <div class="modal-body">
                <!-- Form content goes here -->
                <form action="{{ route('motorcycles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="motorcycleName">Name</label>
                        <input type="text" class="form-control" id="motorcycleName" name="name"
                            placeholder="Enter motorcycle name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="motorcyclePrice">Price</label>
                        <input type="number" class="form-control" id="motorcyclePrice" name="price"
                            placeholder="Enter motorcycle price" step="0.01">
                    </div>
                    <div class="form-group mb-3">
                        <label for="motorcycleStatus">Status</label>
                        <select class="form-control" id="motorcycleStatus" name="status">
                            <option value="Available">Available</option>
                            <option value="Sold">Sold</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <div style="background-image: url('/storage/4211763.png'); background-size: cover; height: 200px; width: 200px; cursor: pointer; background-position: center;"
                            onclick="document.getElementById('addMotorcycleImage').click();">
                            <input type="file" class="form-control" id="addMotorcycleImage" name="image"
                                style="display: none;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Motorcycle Modal -->
<div class="modal fade" id="editMotorcycleModal" tabindex="-1" role="dialog" aria-labelledby="editMotorcycleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="editMotorcycleModalLabel">Edit Motorcycle</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"
                    style="filter: invert(1);"></button>
            </div>
            <div class="modal-body">
                <!-- Form content goes here -->
                <form id="editMotorcycleForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="editMotorcycleName">Name</label>
                        <input type="text" class="form-control" id="editMotorcycleName" name="name"
                            placeholder="Enter motorcycle name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="editMotorcyclePrice">Price</label>
                        <input type="number" class="form-control" id="editMotorcyclePrice" name="price"
                            placeholder="Enter motorcycle price" step="0.01">
                    </div>
                    <div class="form-group mb-3">
                        <label for="editMotorcycleStatus">Status</label>
                        <select class="form-control" id="editMotorcycleStatus" name="status">
                            <option value="Available">Available</option>
                            <option value="Sold">Sold</option>
                        </select>
                    </div>
                    @if (!empty($motorcycle))
                    <div class="form-group mb-3">
                        <div style="background-image: url('{{ $motorcycle->image ? asset('storage/' . $motorcycle->image) : '' }}'); background-size: cover; height: 200px; width: 300px; cursor: pointer; background-position: center;"
                            onclick="document.getElementById('editMotorcycleImage').click();">
                            <input type="file" class="form-control" id="editMotorcycleImage" name="image"
                                style="display: none;">
                        </div>
                    </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Motorcycle Modal -->
<div class="modal fade" id="deleteMotorcycleModal" tabindex="-1" role="dialog"
    aria-labelledby="deleteMotorcycleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteMotorcycleModalLabel">Delete Motorcycle</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"
                    style="filter: invert(1);"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this motorcycle?</p>
                <form id="deleteMotorcycleForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Populate edit form
    $('#editMotorcycleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var price = button.data('price');
        var status = button.data('status');
        var image = button.data('image');

        var modal = $(this);
        modal.find('#editMotorcycleForm').attr('action', '/motorcycles/' + id);
        modal.find('#editMotorcycleName').val(name);
        modal.find('#editMotorcyclePrice').val(price);
        modal.find('#editMotorcycleStatus').val(status);
    });

    // Populate delete form
    $('#deleteMotorcycleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');

        var modal = $(this);
        modal.find('#deleteMotorcycleForm').attr('action', '/motorcycles/' + id);
    });
    $('#editMotorcycleImage').on('change', function(event) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#editMotorcycleImage').parent().css('background-image', 'url(' + e.target.result +
                ')');
        }
        reader.readAsDataURL(event.target.files[0]);
    });
    $('#addMotorcycleImage').on('change', function(event) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#addMotorcycleImage').parent().css('background-image', 'url(' + e.target.result +
                ')').css('width', '300px');
        }
        reader.readAsDataURL(event.target.files[0]);
    });
});
</script>
@endsection