@extends('dashboard.layouts.master')
@section('title', 'create User')
@section('content')

    <div class="col-md">
        <div class="card">
            <h5 class="card-header">create User</h5>
            <div class="card-body">

                <form class="needs-validation" action="{{ route('users.store') }}" method="POST" >
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="bs-validation-name">First Name</label>
                        <input type="text" class="form-control" name="first_name"
                            id="bs-validation-name" placeholder="John Doe" required />
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Please enter your name.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="bs-validation-name">Last Name</label>
                        <input type="text"  name="last_name" class="form-control"
                            name="lastName" id="bs-validation-name" placeholder="John Doe" required />
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Please enter your name.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="bs-validation-email">Email</label>
                        <input type="email"  name="email" id="bs-validation-email"
                            class="form-control" placeholder="john.doe" aria-label="john.doe" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter a valid email</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="bs-validation-email">Phone</label>
                        <input type="text" name="phone" id="bs-validation-email"
                            class="form-control" placeholder="john.doe" aria-label="john.doe" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter a valid email</div>
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
