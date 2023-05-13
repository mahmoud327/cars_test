@extends('dashboard.layouts.master')
@section('title', 'show')
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
                                <img class="img-fluid rounded mb-3 pt-1 mt-4"
                                    src="{{ asset('dashboard/assets/img/avatars/1.png') }}" height="100" width="100"
                                    alt="User avatar" />
                                <div class="user-info text-center">
                                    <h4 class="mb-2"></h4>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around flex-wrap pb-4 border-bottom">

                        </div>
                        <p class="mt-4 small text-uppercase text-muted">Details</p>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <span class="fw-semibold me-1">Username:</span>
                                    <span></span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Email:</span>
                                    <span></span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Status:</span>
                                    <span class="badge bg-label-warning">InActive</span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Role:</span>
                                    <span>Company</span>
                                </li>

                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Contact:</span>
                                    <span></span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Languages:</span>
                                    <span>English</span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Address:</span>
                                    <span></span>
                                </li>
                                <li class="mb-2 pt-1">
                                    <span class="fw-semibold me-1">Buy Plan:</span>
                                    <span class="badge bg-label-success">Yes</span>

                                </li>
                                <li class="mb-2 pt-1">
                                    <label class="switch switch-square">
                                        <input type="checkbox" checked onclick="confirmStatus(this)" id="status"
                                            data-column="userId" data-table="mstcompanies" data-status=""
                                            data-update-path="admin/User/updateStatusPaid" data-update=""
                                            class="switch-input" />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"><i class="ti ti-check"></i></span>
                                            <span class="switch-off"><i class="ti ti-x"></i></span>
                                        </span>
                                        <span class="switch-label">Active Plan</span>
                                    </label>

                                </li>
                            </ul>
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-primary me-3" data-bs-target="#editUser"
                                    data-bs-toggle="modal">Edit</a>
                                <a href="javascript:;" onclick="confirmDelete(this)" id="" data-column="userId"
                                    data-delete-path="Delete/deleteCompany" data-delete=""
                                    class="btn btn-label-danger suspend-user">Delete</a>
                            </div>
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
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home"
                                aria-selected="true">
                                <i class="tf-icons ti ti-details ti-xs me-1"></i> Payment History
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile"
                                aria-selected="false">
                                <i class="tf-icons ti ti-shopping-cart ti-xs me-1"></i> Listings
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-deleted" aria-controls="navs-pills-justified-profile"
                                aria-selected="false">
                                <i class="tf-icons ti ti-shopping-cart ti-xs me-1"></i> Deleted Listings
                            </button>
                        </li>
                        <!-- <li class="nav-item">
                      <button
                        type="button"
                        class="nav-link"
                        role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-messages"
                        aria-controls="navs-pills-justified-messages"
                        aria-selected="false"
                      >
                        <i class="tf-icons ti ti-star ti-xs me-1"></i> Reviews
                      </button>
                    </li> -->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                            <div class="table-responsive mb-3">
                                <table class="table" id="datatable1">
                                    <thead>
                                        <tr>
                                            <th>Payer Email</th>
                                            <th>Transaction Id</th>
                                            <th>Amount</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td> </td>
                                            <td>

                                            </td>
                                            <td><span class="badge bg-light-danger mr-1">Pending</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                        data-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">

                            <div class="table-responsive ">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Model</th>
                                            <th>Year</th>
                                            <th>Add Date</th>
                                            <th>Status</th>
                                            <th colspan="3" style="text-alight:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                            </td>
                                            <td>

                                                <button type="button" onclick="confirmStatus(this)" id="status"
                                                    data-column="listingId" data-table="mstlisting" data-status=""
                                                    data-update-path="admin/User/updateStatus" data-update=""
                                                    title="Change  Status" class="btn btn-icon btn-label-linkedin col-4">
                                                    <i class="tf-icons ti ti-brand-linkedin"></i>
                                                </button>
                                            </td>

                                            <td>
                                                <a href="#" style="margin-left:2px"
                                                    class="btn btn-icon btn-label-success col-4">
                                                    <i class="tf-icons ti ti-eye"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" onclick="confirmDelete(this)" id=""
                                                    data-column="listingId" data-delete-path="Delete/deleteListing"
                                                    data-delete="" style="margin-left:2px"
                                                    class="btn btn-icon btn-label-danger col-4">
                                                    <i class="tf-icons ti ti-trash"></i>
                                                </button>


                                            </td>

                                        </tr>

                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>No Data found</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-deleted" role="tabpanel">

                            <div class="table-responsive ">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Model</th>
                                            <th>Year</th>
                                            <th>Add Date</th>
                                            <th>Status</th>
                                            <th colspan="3" style="text-alight:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <tr>
                                            <td></td>
                                            <td></td>

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>



                                        </tr>

                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>No Data found</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>

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
@endsection
