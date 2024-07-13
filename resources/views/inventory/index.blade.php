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
                        Add Item
                    </button>

                    <!-- Add Category Modal -->
                    <div class="modal fade" id="addCategoryModel" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Add Item</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" id="addInventory">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="name" class="form-label">Name </label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="Enter Item Name " required />
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <label for="category" class="form-label">Category</label>
                                            <select id="category" name="category"
                                                class="form-select form-select-lg">
                                                @foreach ($categories as  $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="description" class="form-label">Description </label>
                                                <input type="text" id="description" name="description" class="form-control"
                                                    placeholder="Enter item description " required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="quantity" class="form-label">Quantity </label>
                                                <input type="number" id="quantity" name="quantity" class="form-control"
                                                    placeholder="quantity " required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="price" class="form-label">Price </label>
                                                <input type="number" id="price" name="price" class="form-control"
                                                    placeholder="Price " required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="local" class="form-label">Local </label>
                                                <input type="text" id="local" name="local" class="form-control"
                                                    placeholder="Local " required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select id="status" name="status"
                                                class="form-select form-select-lg">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>

                                            </select>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="date" class="form-label">Date </label>
                                                <input type="date" id="date" name="date" class="form-control"
                                                    placeholder="Date " required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="stock" class="form-label">Stock </label>
                                                <input type="number" id="stock" name="stock" class="form-control"
                                                    placeholder="Stock " required />
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
                    <!-- Edit Inventory Modal -->
                    <div class="modal fade" id="editStockModel" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Edit Inventory</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" id="editInventory">
                                    @csrf
                                    <input type="hidden" name="id" id="idEdit">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="name" class="form-label">Name </label>
                                                <input type="text" id="nameEdit" name="name" class="form-control"
                                                    placeholder="Enter Item Name " required />
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <label for="category" class="form-label">Category</label>
                                            <select id="categoryEdit" name="category"
                                                class="form-select form-select-lg">
                                                @foreach ($categories as  $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="description" class="form-label">Description </label>
                                                <input type="text" id="descriptionEdit" name="description" class="form-control"
                                                    placeholder="Enter item description " required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="quantity" class="form-label">Quantity </label>
                                                <input type="number" id="quantityEdit" name="quantity" class="form-control"
                                                    placeholder="quantity " required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="price" class="form-label">Price </label>
                                                <input type="number" id="priceEdit" name="price" class="form-control"
                                                    placeholder="Price " required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="local" class="form-label">Local </label>
                                                <input type="text" id="localEdit" name="local" class="form-control"
                                                    placeholder="Local " required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select id="statusEdit" name="status"
                                                class="form-select form-select-lg">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>

                                            </select>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="date" class="form-label">Date </label>
                                                <input type="date" id="dateEdit" name="date" class="form-control"
                                                    placeholder="Date " required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="stock" class="form-label">Stock </label>
                                                <input type="number" id="stockEdit" name="stock" class="form-control"
                                                    placeholder="Stock " required />
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
                    <div class="modal fade" id="deleteInventoryModel" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Delete Inventory</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" id="deleteInventoryId">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <input type="hidden" name="id" id="InventoryIdDelete">
                                            <div class="col mb-3">
                                                <p>Are You Sure You Want to delete This Inventory</p>
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
                <h5 class="card-header">Inventory Items</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>#</th>
                                <th> Name</th>
                                <th> Cateogory</th>
                                <th> Description</th>
                                <th> Price</th>
                                <th> Quantity</th>
                                <th> Stock</th>
                                <th> Status</th>
                                <th> Date</th>

                                <th> Local</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventories as $inventory)
                                <tr>
                                    <td>{{ $inventory->id }}</td>
                                    <td>{{ $inventory->item_name }}</td>
                                    <td>{{ $inventory->category->name }}</td>
                                    <td>{{ $inventory->description }}</td>
                                    <td>{{ $inventory->price }}</td>
                                    <td>{{ $inventory->quantity }}</td>
                                    <td>{{ $inventory->stock }}</td>
                                    <td>{{ $inventory->status }}</td>
                                    <td>{{ $inventory->date }}</td>

                                    <td>{{ $inventory->local }}</td>

                                    <td>
                                        <button type="button" data-id="{{ $inventory->id }}"
                                            class="btn btn-sm btn-primary editStockButton" data-bs-toggle="modal"
                                            data-bs-target="#editStockModel">
                                            Edit Inventory
                                        </button>
                                        <br>
                                        <button type="button" data-id="{{ $inventory->id }}"
                                            class="btn btn-sm btn-danger deleteInventory" data-bs-toggle="modal"
                                            data-bs-target="#deleteInventoryModel">
                                            Delete Inventory
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

        <script src="{{ asset('assets/customjs/inventory.js') }}"></script>
    @endpush
@endsection
