@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="col-lg-4 col-md-6">
                <div class="mt-3">
                    <div id="success-message" style="display: none;" class="alert alert-success"></div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary userAdd" data-bs-toggle="modal"
                        data-bs-target="#addUserModel">
                        {{ __('messages.Add User') }}
                    </button>

                    <!-- Add User Modal -->
                    <div class="modal fade" id="addUserModel" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">{{ __('messages.Add User') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" id="addUser">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="name" class="form-label">{{ __('messages.Name') }}</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="{{ __('messages.Enter Name') }}" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="email" class="form-label">{{ __('messages.Email') }}</label>
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="{{ __('messages.Enter Email') }}" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="password" class="form-label">{{ __('messages.Password') }}</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="{{ __('messages.Enter Password') }}" required />
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <label for="status" class="form-label">{{ __('messages.Status') }}</label>

                                            <select id="status" name="status" class="form-select form-select-lg">
                                                <option value="Active">{{ __('messages.Active') }}</option>
                                                <option value="Inactive">{{ __('messages.Inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            {{ __('messages.Close') }}
                                        </button>
                                        <button type="submit" class="btn btn-sm btn-primary">{{ __('messages.Save changes') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Edit User Modal -->
                    <div class="modal fade" id="editUserModel" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">{{ __('messages.Edit User') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" id="updateUser">
                                    @csrf
                                    <input type="hidden" name="id" id="userId">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="name" class="form-label">{{ __('messages.Name') }}</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="{{ __('messages.Enter Name') }}" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="email" class="form-label">{{ __('messages.Email') }}</label>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="{{ __('messages.Enter Email') }}" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="password" class="form-label">{{ __('messages.Password') }}</label>
                                                <input type="password" id="password" name="password" class="form-control"
                                                    placeholder="{{ __('messages.Enter Password') }}" />
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <label for="status" class="form-label">{{ __('messages.Status') }}</label>

                                            <select id="status" name="status" class="form-select form-select-lg">
                                                <option value="Active">{{ __('messages.Active') }}</option>
                                                <option value="Inactive">{{ __('messages.Inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            {{ __('messages.Close') }}
                                        </button>
                                        <button type="submit" class="btn btn-sm btn-primary">{{ __('messages.Save changes') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Delete User Modal -->
                    <div class="modal fade" id="deleteUserModel" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">{{ __('messages.Delete User') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" id="deleteUserData">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <input type="hidden" name="id" id="UserIdDelete">
                                            <div class="col mb-3">
                                                <p>{{ __('messages.Are You Sure You Want to delete This User') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            {{ __('messages.Close') }}
                                        </button>
                                        <button type="submit" class="btn btn-sm btn-danger">{{ __('messages.Delete') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Responsive Table -->
            <div class="card">
                <h5 class="card-header">{{ __('messages.Users') }}</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>{{ __('messages.Name') }}</th>
                                <th>{{ __('messages.Email') }}</th>
                                <th>{{ __('messages.Status') }}</th>
                                <th>{{ __('messages.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>
                                        <button type="button" data-id="{{ $user->id }}"
                                            class="btn btn-sm btn-primary editUserButton" data-bs-toggle="modal"
                                            data-bs-target="#editUserModel">
                                            {{ __('messages.Edit User') }}
                                        </button>
                                        <br>
                                        <button type="button" data-id="{{ $user->id }}"
                                            class="btn btn-sm btn-danger deleteUser" data-bs-toggle="modal"
                                            data-bs-target="#deleteUserModel">
                                            {{ __('messages.Delete User') }}
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
        <script src="{{ asset('assets/customjs/users.js') }}"></script>
    @endpush
@endsection
