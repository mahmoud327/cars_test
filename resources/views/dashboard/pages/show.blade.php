@extends('dashboard.layouts.master')
@section('title', 'show')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Page</h4>
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-12 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card mb-">
                    <div class="card-body">


                        <div class="info-container">
                            <ul class="list-unstyled">
                                @foreach (config('translatable.locales') as $locale)
                                <li class="mb-2">
                                    <span class="fw-semibold me-1">Title ({{ $locale }}):</span>
                                    <span>{{$page->translate($locale)->title}}</span>
                                </li>
                                @endforeach
                                @foreach (config('translatable.locales') as $locale)
                                <li class="mb-2">
                                    <span class="fw-semibold me-1">Content ({{ $locale }}):</span>
                                    <span>{!!$page->translate($locale)->content!!}</span>
                                </li>

                                @endforeach


                            </ul>

                        </div>
                    </div>
                </div>
                <!-- /User Card -->
            </div>
            <!--/ User Sidebar -->


        </div>

        <!-- /Modal -->
    </div>
@endsection
