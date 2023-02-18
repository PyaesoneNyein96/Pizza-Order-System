@extends('admin.admin-master')


@section('title', 'dashboard-Product-Create')

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{ route('admin@productList') }}"><button
                                class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div>
                <div class="col-lg-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Product</h3>
                            </div>
                            <hr>
                            <form action="{{ route('admin@CreateProduct') }}" method="post" novalidate="novalidate"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="img" class=" form-label " style="cursor: pointer">
                                        Select Product Image
                                    </label>
                                    <input id="img" type="file"
                                        class="@error('productImage')  is-invalid @enderror form-control form-control-sm  "
                                        name="productImage">
                                    @error('productImage')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label class="control-label mb-1">Name</label>
                                    <input name="productName" type="text" value="{{ old('productName') }}"
                                        class="form-control @error('productName') is-invalid @enderror"
                                        placeholder="Name of Product...">
                                    @error('productName')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label class="control-label mb-1">Description</label>
                                    <textarea name="productDescription" class="form-control @error('productDescription') is-invalid @enderror"
                                        placeholder="Description" cols="30" rows="3">{{ old('productDescription') }}</textarea>
                                    @error('productDescription')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label class="control-label mb-1">Price</label>
                                    <input name="productPrice" type="number" min="0"
                                        value="{{ old('productPrice') }}"
                                        class="form-control @error('productPrice') is-invalid @enderror"
                                        placeholder="Price...">
                                    @error('productPrice')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label class="control-label mb-1">Waiting time</label>
                                    <input name="productWaitingTime" type="number" min="0"
                                        value="{{ old('productWaitingTime') }}"
                                        class="form-control @error('productWaitingTime') is-invalid @enderror"
                                        placeholder="Waiting Time...">
                                    @error('productWaitingTime')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label>Categories</label>
                                    <select name="productCategory"
                                        class="form-select @error('productCategory') is-invalid @enderror"
                                        value="{{ old('productCategory') }}">
                                        <option value="#" selected hidden disabled>
                                            - Select Category for Product
                                        </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('productCategory')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div>
                                    <button id="payment-button" type="submit"
                                        class="btn btn-lg btn-info btn-block mt-4 text-light rounded">
                                        <span id="payment-button-amount">Create
                                            <i class="fa fa-upload" aria-hidden="true"></i>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
