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
                        {{ __('messages.add_category') }}
                    </button>

                    <!-- Add Category Modal -->
                    <div class="modal fade" id="addCategoryModel" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">{{ __('messages.add_category') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" id="addCategory">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="category" class="form-label">{{ __('messages.category') }}</label>
                                                <input type="text" id="category" name="category" class="form-control"
                                                    placeholder="{{ __('messages.enter_category') }}" required />
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <label for="status" class="form-label">{{ __('messages.status') }}</label>

                                            <select id="status" name="status" class="form-select form-select-lg">
                                                <option value="Active">{{ __('messages.active') }}</option>
                                                <option value="Inactive">{{ __('messages.inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            {{ __('messages.close') }}
                                        </button>
                                        <button type="submit" class="btn btn-sm btn-primary">{{ __('messages.save_changes') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Category Modal -->
                    <div class="modal fade" id="editCategoryModel" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">{{ __('messages.edit_category') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" id="editCategory">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" id="idEdit" name="id">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="categoryNameEdit" class="form-label">{{ __('messages.category') }}</label>
                                                <input type="text" id="categoryNameEdit" name="category" class="form-control"
                                                    placeholder="{{ __('messages.enter_category') }}" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="categoryStatusEdit" class="form-label">{{ __('messages.status') }}</label>

                                                <select id="categoryStatusEdit" name="status" class="form-select form-select-lg">
                                                    <option value="Active">{{ __('messages.active') }}</option>
                                                    <option value="Inactive">{{ __('messages.inactive') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            {{ __('messages.close') }}
                                        </button>
                                        <button type="submit" class="btn btn-sm btn-primary">{{ __('messages.save_changes') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Category Modal -->
                    <div class="modal fade" id="deleteCategoryModel" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">{{ __('messages.delete_category') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" id="deleteCategoryId">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <input type="hidden" name="id" id="categoryIdDelete">
                                            <div class="col mb-3">
                                                <p>{{ __('messages.delete_confirmation') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            {{ __('messages.close') }}
                                        </button>
                                        <button type="submit" class="btn btn-sm btn-danger">{{ __('messages.delete') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Responsive Table -->
            <div class="card">
                <h5 class="card-header">{{ __('messages.categories') }}</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>#</th>
                                <th>{{ __('messages.name') }}</th>
                                <th>{{ __('messages.status') }}</th>
                                <th>{{ __('messages.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->status }}</td>
                                    <td>
                                        <button type="button" data-id="{{ $category->id }}" class="btn btn-sm btn-primary editCategoryButton" data-bs-toggle="modal" data-bs-target="#editCategoryModel">
                                            {{ __('messages.edit') }}
                                        </button>
                                        <br>
                                        <button type="button" data-id="{{ $category->id }}" class="btn btn-sm btn-danger categoryExam" data-bs-toggle="modal" data-bs-target="#deleteCategoryModel">
                                            {{ __('messages.delete') }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- / Responsive Table -->
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
