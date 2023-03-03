@extends('admin.admin-master')


@section('title', 'dashboard-product')

@section('content')


    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Product List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('admin@createProductPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add Product
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>



                    <div class="table-responsive table-responsive-data2 text-center">
                        <div class="d-flex row justify-content-between ">
                            <div class="col-md-5 col-6 total text-start">
                                Total Category : <span class="badge badge-pill px-2 rounded-circle h5 bg-info">
                                    {{ $data->total() }}
                                </span>
                                <div> Search Key :
                                    <span class="text-danger">
                                        {{ request('searchValue') }}
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-5 col-6 searching">
                                <form action="{{ route('admin@productList') }}" method="get" class="d-flex">
                                    <input type="text" class="shadow-none rounded form-control form-control-sm"
                                        value="{{ request('searchValue') }}" name="searchValue" title="Search here !"
                                        placeholder="Search . . .">

                                    <button type="submit" class="btn btn-outline-info rounded-circle mx-2 bg-dark"><i
                                            class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                    <a href="{{ route('admin@productList') }}" class="btn btn-success"> Clear </a>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="sms-wrap">
                            @if (session('success'))
                                <div class="col-md-5 float-end alert alert-success alert-dismissible fade show"
                                    role="alert">
                                    <span class="text-success small">{{ session('success') }} <i class="fa fa-check"
                                            aria-hidden="true"></i></sp>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('delMsg'))
                                <div class="col-md-5 float-end alert alert-warning alert-dismissible text-center fade show"
                                    role="alert">
                                    <span class="text-success small">{{ session('delMsg') }}
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('updateMsg'))
                                <div class="col-md-5 float-end alert alert-warning alert-dismissible text-center fade show"
                                    role="alert">
                                    <span class="text-success small">{{ session('updateMsg') }}
                                        {{-- <i class="fas fa-check-double"></i>
                                        <i class="fab fa-check-double    "></i> --}}
                                    </span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>


                        @if (!$data->isEmpty())
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th> No</th>
                                        <th> image</th>
                                        <th> name</th>
                                        <th> Category</th>
                                        <th> Waiting Time</th>
                                        <th> Price</th>
                                        <th> Views</th>
                                        <th> Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr class="tr-shadow" title="{{ $item->name }}">

                                            <td>{{ $loop->index + $data->firstItem() }}</td>

                                            <td class="ms-3 col-2">
                                                <div class="img-wrap border shadow d-flex align-items-center">
                                                    <a href="{{ route('admin@detailProduct', $item->id) }}">
                                                        <img src="{{ asset('storage/product/' . $item->image) }}"
                                                            class="product-img shadow-sm"
                                                            style="object-fit:contain;width:150px;height:120px">
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <span>{{ $item->name }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $item->Category->name }}</span>
                                            </td>

                                            <td>
                                                <span> {{ $item->waiting_time }} days</span>
                                            </td>
                                            <td>
                                                <span> $ {{ $item->price }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $item->view_count }}</span>
                                            </td>


                                            <td class="bg-light">
                                                <div class="table-data-feature d-flex justify-content-center">

                                                    <a href="{{ route('admin@detailProduct', $item->id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Detail">
                                                            <i class="fa fa-align-right" aria-hidden="true"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('admin@productEdit', $item->id) }}" class="mx-2">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a class="mx-2" href="{{ route('admin@deleteProduct', $item->id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach



                                </tbody>
                            </table>
                            <div class="paginate">
                                {{ $data->links() }}
                                {{-- {{ $data->appends(request()->query())->links() }} --}}
                            </div>
                        @else
                            <div class="py-3 mt-5 d-flex justify-content-center">
                                <div class="wrap  shadow  w-50 bg-secondary  py-4 rounded d-flex justify-content-center">
                                    <h4 class="w-50 text-light">There is no Product yet !!</h4>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>

@endsection
