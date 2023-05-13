@extends('dashboard.layouts.master')
@section('title', 'edit User')
@section('content')

<div class="col-md">
    <div class="card">
        <h5 class="card-header">Edit User</h5>
        <div class="card-body">

            <div class="alert alert-success alert-dismissible" role="alert">

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="alert alert-danger alert-dismissible" role="alert">

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <form class="needs-validation" method="POST" novalidate>
                <div class="mb-3">
                    <label class="form-label" for="bs-validation-name">First Name</label>
                    <input type="text" class="form-control"
                        value="" name="firstName"
                        id="bs-validation-name" placeholder="John Doe" required />
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Please enter your name.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="bs-validation-name">Last Name</label>
                    <input type="text" value=""
                        class="form-control" name="lastName" id="bs-validation-name" placeholder="John Doe" required />
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Please enter your name.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="bs-validation-email">Email</label>
                    <input type="email" name="email"
                        value="" id="bs-validation-email"
                        class="form-control" placeholder="john.doe" aria-label="john.doe" required />
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please enter a valid email</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="bs-validation-email">Address</label>
                    <input type="text" name="address"
                        value=""
                        id="bs-validation-email" class="form-control" placeholder="" aria-label="john.doe" required />


                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="bs-validation-password">Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" name="password" id="bs-validation-password" class="form-control"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            required />
                        <span class="input-group-text cursor-pointer" id="basic-default-password4"><i
                                class="ti ti-eye-off"></i></span>
                    </div>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please enter your password.</div>
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
@endsection
