@extends('admin.admin-master');



@section('title', 'Admin Management')

@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                {{-- START  --}}
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="d-inline title-1">Users</h2>
                                <a href="" class="mx-2">
                                    <button class="btn btn-outline-success">All User</button>
                                </a>
                                <a href="" class="mx-2">
                                    <button class="btn btn-outline-danger">Admins</button>
                                </a>

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
                                    {{-- {{ $data->total() }} --}}
                                </span>
                                <div> Search Key :
                                    <span class="text-danger">
                                        {{ request('searchValue') }}
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-5 col-6 searching">
                                <form action="{{ route('admin@adminList') }}" method="get" class="d-flex">
                                    <input type="text" class="shadow-none rounded form-control form-control-sm"
                                        value="{{ request('searchValue') }}" name="searchValue" title="Search here !"
                                        placeholder="Search . . .">

                                    <button type="submit" class="btn btn-outline-info rounded-circle mx-2 bg-dark"><i
                                            class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                    <a href="{{ route('admin@adminList') }}" class="btn btn-success"> Clear </a>
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
                                    <span class="text-success small">
                                        {{ session('updateMsg') }}
                                    </span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        </div>


                        @if (Auth::check())
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th> No</th>
                                        <th> Image</th>
                                        <th> name</th>
                                        <th> Email</th>
                                        <th> Gender</th>
                                        <th> Phone</th>
                                        <th> Address</th>
                                        <th> Status</th>

                                        {{-- <th> date</th> --}}
                                        <th> Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="tr-shadow">

                                            <td>{{ $loop->index + $users->firstItem() }}</td>

                                            <td class="ms-3 col-1">
                                                <div class="img-wrap border shadow d-flex align-items-center">
                                                    @if ($user->image == null && $user->gender == 'male')
                                                        <img src="{{ asset('image/avators/images.jpg') }}" alt="">
                                                    @elseif ($user->image == null && $user->gender == 'female')
                                                        <img src="{{ asset('image/avators/female.jpg') }}" alt="">
                                                    @elseif ($user->image == null)
                                                        <img src="{{ asset('image/avators/genderless.jpg') }}"
                                                            alt="">
                                                    @endif
                                                    <img src="{{ asset('storage/' . $user->image) }}"
                                                        class="product-img shadow-sm ">
                                                </div>
                                            </td>
                                            <td>
                                                <span>{{ $user->name }}</span>
                                            </td>

                                            <td>
                                                <span>{{ $user->email }}</span>
                                            </td>
                                            <td>
                                                <span> {{ $user->gender }} </span>
                                            </td>
                                            <td>
                                                <span> {{ $user->phone }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $user->address }}</span>
                                            </td>
                                            <td>
                                                <span> {{ $user->created_at->format('j - M -Y') }} </span> |

                                            </td>

                                            <td class="bg-light ">
                                                <div class="table-data-feature d-flex justify-content-start">

                                                    <a href="{{ route('admin@detailProduct', $user->id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Suspend">
                                                            <i class="fa-solid fa-circle-pause text-danger"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('admin@productEdit', $user->id) }}" class="mx-2">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>
                                                    @if (Auth::user()->id !== $user->id)
                                                        <a class="mx-2"
                                                            href="{{ route('admin@adminDelete', $user->id) }}">
                                                            <button class="item" data-toggle="tooltip"
                                                                data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </a>
                                                    @endif

                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach



                                </tbody>
                            </table>
                            <div class="paginate">
                                {{ $users->links() }}
                                {{-- {{ $data->appends(request()->query())->links() }} --}}
                            </div>
                        @else
                            <div class="py-3 mt-5 d-flex justify-content-center">
                                <div class="wrap  shadow  w-50 bg-warning  py-4 rounded d-flex justify-content-center">
                                    <h4 class="w-50 text-danger">Maintenance Break !!</h4>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- END DATA TABLE -->
                </div>
                {{-- END  --}}


            </div>
        </div>
    </div>

@endsection
