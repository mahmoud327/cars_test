@extends('dashboard.layouts.master')
@section('title', 'edit Company ')
@section('content')
    <div class="col-md">
        <div class="card">
            <h5 class="card-header">Edit Company</h5>
            <div class="card-body">

                <form class="needs-validation" action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                    @method('put')
                    @csrf

                    <div class="row">

                        <div class="mb-3 col-6">
                            <label class="form-label" for="bs-validation-email">Company Name</label>
                            <input type="text" name="companyName" value="{{ $company->name }}" id="bs-validation-email"
                                class="form-control" placeholder="john.doe" aria-label="john.doe" required />
                            <div class="valid-feedback">Looks good!</div>
                            <small class="text-danger"></small>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label" for="bs-validation-email">Phone Number</label>
                            <input type="text" name="phoneNumber" value="{{ $company->phone }}"id="bs-validation-email"
                                class="form-control" placeholder="" aria-label="john.doe" required />
                            <div class="valid-feedback">Looks good!</div>
                            <small class="text-danger"></small>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label" for="bs-validation-email">Email</label>
                            <input type="text" name="email" value="{{ $company->email }}" id="bs-validation-email"
                                class="form-control" placeholder="john.doe" aria-label="john.doe" required />
                            <div class="valid-feedback">Looks good!</div>
                            <small class="text-danger"></small>
                        </div>

                        <div  class="mb-3">

                            <label class="form-label" for="bs-validation-bio"> choose user </label>
                            <select class="form-control"  required name="user_id">
                                @foreach ($users as $user)
                                   <option value="{{ $user->id }}" @if($user->id ==$company->user_id) selected @endif>
                                     {{ $user->full_name }}

                                   </option>
                                @endforeach
                            </select>


                        </div>

                        <div class="mb-3">

                            <label class="form-label" for="bs-validation-bio"> choose city </label>
                            <select class="form-control" required name="city_id">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"  @if($city->id ==$company->city_id) selected @endif>>
                                        {{ $city->title }}

                                    </option>
                                @endforeach
                            </select>


                        </div>

                        <div class="col-6">
                            <label class="form-label" for="bs-validation-password">Company Logo</label>
                            <div class="input-group input-group-merge">
                                <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="ti ti-upload d-block d-sm-none"></i>
                                    <input type="file" name="companyLogo" id="upload" class="account-file-input"
                                        hidden accept="image/png, image/jpeg" />
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="bs-validation-password">Company Feature Image</label>
                            <div class="input-group input-group-merge">
                                <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="ti ti-upload d-block d-sm-none"></i>
                                    <input type="file" name="featureImage" id="upload" class="account-file-input"
                                        hidden accept="image/png, image/jpeg" />
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-email">Address</label>
                            <input type="text" name="address" value="{{ $company->address }}" id="bs-validation-email"
                                class="form-control" placeholder="" aria-label="john.doe" required />
                            <small class="text-danger"></small>



                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $(".datatables").DataTable({

            })
        });
    </script>
@endsection
