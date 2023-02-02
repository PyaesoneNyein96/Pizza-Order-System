@extends('admin.category.category-master')


@section('title', 'dashboard-category')

@section('content')


    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Categories List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('admin@CreateCategoryPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add item
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>

                    <div class="sms-wrap">
                        @if (session('msg'))
                            <div class="col-md-5 float-end alert alert-success alert-dismissible fade show" role="alert">
                                <span class="text-success small">{{ session('msg') }} <i class="fa fa-check"
                                        aria-hidden="true"></i></sp>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('Delmsg'))
                            <div class="col-md-5 float-end alert alert-warning alert-dismissible text-center fade show"
                                role="alert">
                                <span class="text-success small">{{ session('Delmsg') }}
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
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
                                <hr>
                            </div>


                            <div class="col-md-5 col-6 searching">
                                <form action="{{ route('admin@categoryList') }}" method="get" class="d-flex">
                                    <input type="text" class="shadow-none rounded form-control form-control-sm"
                                        value="{{ request('searchValue') }}" name="searchValue" title="Search here !"
                                        placeholder="Search . . .">
                                    <button type="submit" class="btn btn-outline-info rounded-circle mx-2 bg-dark"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>


                        @if (!$data->isEmpty())
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category name</th>
                                        <th>Created - date</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr class="tr-shadow" title="{{ $item->name }}">
                                            {{-- {{ $loop->index + $Blogs->firstItem()  }} --}}
                                            <td>{{ $loop->index + $data->firstItem() }}</td>
                                            <td>
                                                <span>{{ $item->name }}</span>
                                            </td>
                                            <td>
                                                <span> {{ $item->created_at->format('j - M -Y , g:i A') }} </span> |
                                                <small> {{ $item->created_at->diffForHumans() }}</small>
                                            </td>
                                            <td class="bg-light ">
                                                <div class="table-data-feature d-flex justify-content-center">
                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Send">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </button> --}}

                                                    <a href="{{ route('admin@EditCategory', $item->category_id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('admin@DeleteCategory', $item->category_id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </a>
                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button> --}}
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
                                    <h4 class="w-50 text-light">There is no Categories yet !!</h4>
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
