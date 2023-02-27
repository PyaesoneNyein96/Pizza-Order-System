@extends('admin.admin-master')

@section('title', 'Main-Dashboard')


@section('content')





    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h4 class="title-1">Admin Dashboard</h4>

                            </div>
                        </div>
                        {{-- <div class="table-data__tool-right">
                            <a href="{{ route('admin@createProductPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add Product
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div> --}}
                    </div>




                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>

@endsection
