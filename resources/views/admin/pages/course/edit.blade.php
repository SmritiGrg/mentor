@extends('admin.inc.main')
@section('container')
    <div class="container mt-3">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="background-color: rgb(213, 203, 203)">
                <h5 class="mb-0">Update Course</h5>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="post" action="{{ route('course.update', $course->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Name</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"
                                name="title" value="{{ $course->name }}" required />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description"
                            name="description" value="{{ $course->description }}"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Price</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Price"
                                aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" name="price"
                                value="{{ $course->price }}" />
                        </div>
                    </div>
                    <div class="mb-3">

                        <div class="form-group col-12 mb-0">
                            <label class="col-form-label">Image</label>
                        </div>
                        <!-- image box where image from model come -->
                        <div class="input-group mb-3 col-12">
                            <input id="imagebox" type="text" class="form-control" disabled name="image" readonly>
                            <!-- img come above ☝ -->
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                                    data-bs-target="#modalId">
                                    Choose Image
                                </button>
                            </div>
                        </div>
                        <!-- we use modal to choose image -->
                        <div class="mb-3">
                            <!-- Modal trigger button -->

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <!-- styled to see which image is selected  as type radio opacity is 0-->
                                                <style>
                                                    [type=radio]:checked+img {
                                                        outline: 2px solid #f00;
                                                    }
                                                </style>
                                                @foreach ($files as $file)
                                                    <!-- for choosing 1 image from multiple option we use type radio -->
                                                    <label>
                                                        <input type="radio" name="image" value="{{ $file->image }}"
                                                            style="opacity: 0;" />
                                                        <img src="{{ asset('uploads/' . $file->image) }}" alt=""
                                                            height="100px;" width="100px;" style="margin-right:20px;">
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                                onclick=" firstFunction()">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Optional: Place to the bottom of scripts -->
                            <script>
                                const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

                                function firstFunction() {
                                    var x = document.querySelector('input[name=img]:checked').value;
                                    document.getElementById('imagebox').value = x; // use .innerHTML if we want data on label
                                }
                            </script>
                        </div>

                    </div>
                    {{-- <button type="reset" class="btn btn-primary">Reset</button> --}}
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
