@extends('dashboard.layouts.master')
@section('title', 'show companies')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Profile</h4>
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                <img class="img-fluid rounded mb-3 pt-1 mt-4" src="{{ $company->image_path }}" height="100"
                                    width="100" alt="User avatar" />
                                <div class="user-info text-center">
                                    <h4 class="mb-2">{{ $company->name }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around flex-wrap pb-4 border-bottom">

                        </div>
                        <p class="mt-4 small text-uppercase text-muted">Details</p>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <span class="fw-semibold me-1">userName:</span>
                                    <span>{{ optional($company->user)->full_name }}</span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Email:</span>
                                    <span>{{ $company->email }}</span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Status:</span>
                                    <span class="badge bg-label"-></span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Role:</span>
                                    <span>Company</span>
                                </li>

                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Contact:</span>
                                    <span>{{ $company->phone }}</span>
                                </li>



                                {{-- <li class="mb-2 pt-1">
                                <label class="switch switch-square">
                                    <input type="checkbox" <?php echo $profile['isPaid'] == 1 ? 'checked' : ''; ?> onclick="confirmStatus(this)"
                                        id="status<?php echo $profile['userId']; ?>" data-column="userId" data-table="mstcompanies"
                                        data-status="<?php echo $profile['isPaid']; ?>"
                                        data-update-path="admin/User/updateStatusPaid"
                                        data-update="<?php echo $profile['userId']; ?>" class="switch-input" />
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"><i class="ti ti-check"></i></span>
                                        <span class="switch-off"><i class="ti ti-x"></i></span>
                                    </span>
                                    <span class="switch-label">Active Plan</span>
                                </label>

                            </li> --}}
                            </ul>
                            {{-- <div class="d-flex justify-content-center">
                            <a href="<?php echo base_url('admin/User/editCompany/' . $this->encrypt->encode($profile['userId'])); ?>" class="btn btn-primary me-3" data-bs-target="#editUser"
                                data-bs-toggle="modal">Edit</a>
                            <a href="javascript:;" onclick="confirmDelete(this)" id="<?php echo $profile['userId']; ?>"
                                data-column="userId" data-delete-path="Delete/deleteCompany"
                                data-delete="<?php echo $profile['userId']; ?>" class="btn btn-label-danger suspend-user">Delete</a>
                        </div> --}}
                        </div>
                    </div>
                </div>
                <!-- /User Card -->
            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">

                        <li class="nav-item">

                            <i class="tf-icons ti ti-shopping-cart ti-xs me-1"></i> Listings
                        </li>


                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="navs-pills-justified-profile" role="tabpanel">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-companies table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> title</th>
                                            <th>description</th>
                                            <th>make</th>
                                            <th>model</th>
                                            <th>year</th>
                                            <th>price</th>
                                            <th>engine size</th>
                                            <th>mileage</th>
                                            <th>Status</th>

                                            <th style="text-alight:center">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($records as $record)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $record->title }}</td>
                                                <td>{{ $record->description }}</td>
                                                <td>{{ $record->make?->name }}</td>
                                                <td>{{ $record->model?->name }}</td>
                                                <td>{{ $record->year }}</td>
                                                <td>{{ $record->price }}</td>
                                                <td>{{ $record->engine_size }}</td>
                                                <td>{{ $record->mileage }}</td>
                                                <td><span
                                                        class="badge bg-label-<?php echo $record->status == 0 ? 'warning' : 'success'; ?>"><?php echo $record->status == 0 ? 'Awaitong Approvel' : 'Active'; ?></span>
                                                </td>
                                                <?php
                                                $status = $record->status == 0 ? 1 : 0;

                                                ?>
                                                <td>

                                                    <button type="button" onclick="confirmStatus(this)"
                                                        id=<?php echo $record->id; ?> data-column={{ $record->status }}
                                                        data-status="{{ $status }}"
                                                        data-update-path="{{ route('car.is-active', $status) }}"
                                                        data-update="{{ $record->id }}" title="Change  Status"
                                                        class="btn btn-icon btn-label-linkedin col-4">
                                                        <i class="tf-icons ti ti-mouse"></i>
                                                    </button>

                                                    <button type="button" onclick="confirmDeleted(this)" id=2
                                                        data-column-id={{ $record->id }}
                                                        data-delete-path="{{ route('cars.destroy', $record->id) }}"
                                                        class="btn btn-icon btn-label-danger col-4">
                                                        <i class="tf-icons ti ti-trash"></i>

                                                    </button>



                                                    <a href="{{ route('cars.show', $record->id) }}" style="margin-left:2px"
                                                        class="btn btn-icon btn-label-success col-4">
                                                        <i class="tf-icons ti ti-eye"></i>
                                                    </a>
                                                </td>







                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                   
                    </div>
                </div>
                <!-- /Project table -->

            </div>
            <!--/ User Content -->
        </div>

        <!-- /Modal -->
    </div>

    <script>
        $(function() {
            $(".datatables").DataTable({

            })
        });
    </script>
@endsection
