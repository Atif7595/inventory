@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="col-lg-4 col-md-6">
                <div class="mt-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary subjectAdd" data-bs-toggle="modal"
                        data-bs-target="#addCategoryModel">
                        Add Category
                    </button>

                    <!-- Add Category Modal -->
                    <div class="modal fade" id="addCategoryModel" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Add Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" id="addCategory">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="category" class="form-label">Category </label>
                                                <input type="text" id="category" name="category" class="form-control"
                                                    placeholder="Enter Category " required />
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <label for="nameBasic" class="form-label">Status</label>

                                            <select id="status" name="status"
                                                class="form-select form-select-lg">

                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>

                                            </select>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Edit Exam Modal -->
                    <div class="modal fade" id="editCategoryModel" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Edit Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" id="editCategory">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" id="idEdit" name="id">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="nameBasic" class="form-label">Category </label>
                                                <input type="text" id="categoryNameEdit" name="category"
                                                    class="form-control" placeholder="Enter Subject Name" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="nameBasic" class="form-label">Subjects</label>

                                                <select id="categoryStatusEdit" name="status"
                                                    class="form-select form-select-lg">
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>

                                                </select>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Delete Subject Modal -->
                    <div class="modal fade" id="deleteCategoryModel" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Delete Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" id="deleteCategoryId">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <input type="hidden" name="id" id="categoryIdDelete">
                                            <div class="col mb-3">
                                                <p>Are You Sure You Want to delete This Category</p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- Responsive Table -->
            <div class="card">
                <h5 class="card-header">Categories</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>#</th>
                                <th> Name</th>
                                <th> Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->status }}</td>



                                    <td>
                                        <button type="button" data-id="{{ $category->id }}"
                                            class="btn btn-sm btn-primary editCategoryButton" data-bs-toggle="modal"
                                            data-bs-target="#editCategoryModel">
                                            Edit Category
                                        </button>
                                        <br>
                                        <button type="button" data-id="{{ $category->id }}"
                                            class="btn btn-sm btn-danger categoryExam" data-bs-toggle="modal"
                                            data-bs-target="#deleteCategoryModel">
                                            Delete Subject
                                        </button>

                                    </td>
                            @endforeach

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Responsive Table -->
        </div>
        <!-- / Content -->

        <!-- Footer -->

        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    @push('script')

        <script src="{{ asset('assets/customjs/category.js') }}"></script>
    @endpush
@endsection
