@extends('admin.inc.main')
@section('container')
    <div class="container mt-3">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="background-color: rgb(213, 203, 203)">
                <h5 class="mb-0">Create Category</h5>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="post" action="{{ route('courseCategory.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Name</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Name"
                                aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" name="name" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description"></textarea>
                    </div>
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
