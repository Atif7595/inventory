@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->


                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="col-lg-4 col-md-6">
                        <div class="mt-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-primary subjectAdd" data-bs-toggle="modal"
                                data-bs-target="#addCategoryModel">
                                @lang('messages.add_item')
                            </button>

                            <!-- Add Inventory Modal -->
                            <div class="modal fade" id="addCategoryModel" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">@lang('messages.add_item')</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="" id="addInventory" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="name" class="form-label">@lang('messages.name')</label>
                                                        <input type="text" id="name" name="name" class="form-control"
                                                            placeholder="@lang('messages.name')" required />
                                                    </div>
                                                </div>
                                                <div class="col mb-3">
                                                    <label for="category" class="form-label">@lang('messages.category')</label>
                                                    <select id="category" name="category"
                                                        class="form-select form-select-lg">
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="description" class="form-label">@lang('messages.description')</label>
                                                        <input type="text" id="description" name="description" class="form-control"
                                                            placeholder="@lang('messages.description')" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="quantity" class="form-label">@lang('messages.quantity')</label>
                                                        <input type="number" id="quantity" name="quantity" class="form-control"
                                                            placeholder="@lang('messages.quantity')" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="price" class="form-label">@lang('messages.price')</label>
                                                        <input type="number" id="price" name="price" class="form-control"
                                                            placeholder="@lang('messages.price')" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="local" class="form-label">@lang('messages.local')</label>
                                                        <input type="text" id="local" name="local" class="form-control"
                                                            placeholder="@lang('messages.local')" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="status" class="form-label">@lang('messages.status')</label>
                                                        <select id="status" name="status"
                                                            class="form-select form-select-lg">
                                                            <option value="Active">@lang('messages.active')</option>
                                                            <option value="Inactive">@lang('messages.inactive')</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="date" class="form-label">@lang('messages.date')</label>
                                                        <input type="date" id="date" name="date" class="form-control"
                                                            placeholder="@lang('messages.date')" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="stock" class="form-label">@lang('messages.stock')</label>
                                                        <input type="number" id="stock" name="stock" class="form-control"
                                                            placeholder="@lang('messages.stock')" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="stock" class="form-label">@lang('messages.image')</label>
                                                        <input type="file" id="image" name="image" class="form-control"
                                                            placeholder="@lang('messages.image')" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    @lang('messages.close')
                                                </button>
                                                <button type="submit" class="btn btn-sm btn-primary">@lang('messages.save_changes')</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!-- Other modals follow the same pattern -->

                              <!-- Add Inventory Modal -->
                              <div class="modal fade" id="editStockModel" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">@lang('messages.add_item')</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="" id="editInventory" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" id="idEdit">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="name" class="form-label">@lang('messages.name')</label>
                                                        <input type="text" id="nameEdit" name="name" class="form-control"
                                                            placeholder="@lang('messages.name')" required />
                                                    </div>
                                                </div>
                                                <div class="col mb-3">
                                                    <label for="category" class="form-label">@lang('messages.category')</label>
                                                    <select id="categoryEdit" name="category"
                                                        class="form-select form-select-lg">
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="description" class="form-label">@lang('messages.description')</label>
                                                        <input type="text" id="descriptionEdit" name="description" class="form-control"
                                                            placeholder="@lang('messages.description')" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="quantity" class="form-label">@lang('messages.quantity')</label>
                                                        <input type="number" id="quantityEdit" name="quantity" class="form-control"
                                                            placeholder="@lang('messages.quantity')" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="price" class="form-label">@lang('messages.price')</label>
                                                        <input type="number" id="priceEdit" name="price" class="form-control"
                                                            placeholder="@lang('messages.price')" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="local" class="form-label">@lang('messages.local')</label>
                                                        <input type="text" id="localEdit" name="local" class="form-control"
                                                            placeholder="@lang('messages.local')" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="status" class="form-label">@lang('messages.status')</label>
                                                        <select id="statusEdit" name="status"
                                                            class="form-select form-select-lg">
                                                            <option value="Active">@lang('messages.active')</option>
                                                            <option value="Inactive">@lang('messages.inactive')</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="date" class="form-label">@lang('messages.date')</label>
                                                        <input type="date" id="dateEdit" name="date" class="form-control"
                                                            placeholder="@lang('messages.date')" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="stock" class="form-label">@lang('messages.stock')</label>
                                                        <input type="number" id="stockEdit" name="stock" class="form-control"
                                                            placeholder="@lang('messages.stock')" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="stock" class="form-label">@lang('messages.image')</label>
                                                        <input type="file" id="imageEdit" name="image" class="form-control"
                                                            placeholder="@lang('messages.image')"  />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    @lang('messages.close')
                                                </button>
                                                <button type="submit" class="btn btn-sm btn-primary">@lang('messages.save_changes')</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--
                         Table -->
                    <div class="card">
                        <h5 class="card-header">@lang('messages.inventory_items')</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>#</th>
                                        <th>@lang('messages.image')</th>
                                        <th>@lang('messages.name')</th>
                                        <th>@lang('messages.category')</th>
                                        <th>@lang('messages.description')</th>
                                        <th>@lang('messages.price')</th>
                                        <th>@lang('messages.quantity')</th>
                                        <th>@lang('messages.stock')</th>
                                        <th>@lang('messages.status')</th>
                                        <th>@lang('messages.date')</th>
                                        <th>@lang('messages.local')</th>
                                        <th>@lang('messages.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventories as $inventory)
                                        <tr>
                                            <td>{{ $inventory->id }}</td>
                                            <td><img src="{{ asset('storage/'.$inventory->image) }}" style="height: 50px" alt=""> </td>

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
                                                    @lang('messages.edit_inventory')
                                                </button>
                                                <br>
                                                <button type="button" data-id="{{ $inventory->id }}"
                                                    class="btn btn-sm btn-danger deleteInventory" data-bs-toggle="modal"
                                                    data-bs-target="#deleteInventoryModel">
                                                    @lang('messages.delete_inventory')
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
