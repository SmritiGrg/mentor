@extends('admin.inc.main')
@section('container')
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container py-4">
        <a href="{{ route('trainer.create') }}" class="btn btn-primary my-3">Add</a>
        <table class="table table-secondary 
         table-hover table-bordered table-sm table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trainers as $trainer)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $trainer->name }}</td>
                        <td><a target="_blank" href="{{ asset('uploads/' . $trainer->image) }}">
                                <img src="{{ asset('uploads/' . $trainer->image) }}" alt="" width="100px"
                                    height="100px">
                            </a>
                        </td>
                        <td>{{ $trainer->description }}</td>
                        <td>
                            <a href="{{ route('trainer.edit', $trainer->id) }}" class="btn btn-primary btn-sm">Edit</a>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog        ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close btn" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure?☠
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('trainer.destroy', $trainer->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
