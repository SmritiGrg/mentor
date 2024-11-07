@extends('admin.inc.main')
@section('container')
    <div class="container mt-3">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Course</h5>
                <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
                <a href="{{ route('courseCategory.create') }}" class="btn btn-primary my-3">Add Category</a>
                <form enctype="multipart/form-data" method="post" action="{{ route('course.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-user"></i></span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"
                                name="name" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Image</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bx-buildings"></i></span>
                            <input type="file" id="basic-icon-default-company" class="form-control"
                                placeholder="ACME Inc." aria-label="ACME Inc."
                                aria-describedby="basic-icon-default-company2" name="image" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description"
                            name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Price</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bx-user"></i></span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Price"
                                aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" name="price" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
