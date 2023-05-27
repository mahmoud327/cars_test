@extends('dashboard.layouts.master')
@section('title', 'show')
@section('content')
@inject('featureList', 'App\Models\FeatureList')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Car Details</h4>
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card mb-4">
                    <div class="card-body">


                        <p class="mt-4 small text-uppercase text-muted">Details</p>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <span class="fw-semibold me-1">Title:</span>
                                    <span>{{ $car->title }}</span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Description:</span>
                                    <span>{{ $car->description }}</span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Price:</span>
                                    <span>{{ $car->price }}</span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Year:</span>
                                    <span>{{ $car->year }}</span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Make:</span>
                                    <span>{{ $car->make?->name }}</span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Model:</span>
                                    <span>{{ $car->model?->name }}</span>
                                </li>

                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Engine Size:</span>
                                    <span>{{ $car->engine_size }}</span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Mileage:</span>
                                    <span>{{ $car->mileage }}</span>
                                </li>

                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Vin Number:</span>
                                    <span>{{ $car->vin_number }}</span>
                                </li>
                                @if($car->features->count() > 0)
                                @foreach ($car->features as $feature)
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">{{$feature->name}}</span>
                                    <span>{{ $featureList->find($feature->pivot->feature_list_id)->name }}</span>

                                @endforeach
                                @endif


                            </ul>
                            {{-- <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-primary me-3" data-bs-target="#editUser"
                                    data-bs-toggle="modal">Edit</a>

                                <a href="javascript:;" onclick="confirmDelete(this)" id="" data-column="userId"
                                    data-delete-path="Delete/deleteCompany" data-delete=""
                                    class="btn btn-label-danger suspend-user">Delete</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- /User Card -->
            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">


                <div class="table-responsive ">
                    <table class="datatables-basic table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>

                            </tr>
                        </thead>
                        <tbody>

                            @if($car->attachmentRelation->count() > 0)
                           @foreach ($car->attachmentRelation as $attachment)
                            <tr>
                             <td>{{ $loop->iteration }}</td>
                             <td><img src="{{ asset($attachment->image_path) }}" alt="" width="100px" height="100px"></td>
                            </tr>

                           @endforeach
                            @else
                            <tr>
                                <td colspan="2">No Images</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Project table -->


@endsection
