@extends('dashboard.layouts.master')
@section('title', 'Add User')
@section('content')
<div class="col-md">
    <div class="card">

        <h5 class="card-header">Add Company</h5>
        <div class="card-body">
            <div class="alert alert-success alert-dismissible" role="alert">
                test
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert alert-danger alert-dismissible" role="alert">
                test
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <form class="needs-validation" novalidate>
                <div class="mb-3">
                    <label class="form-label" for="bs-validation-name">Company Name</label>
                    <input type="text" class="form-control" id="bs-validation-name" placeholder="John Doe" required />
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please enter your name.</div>
                </div>


                <div class="mb-3">
                    <label class="form-label" for="bs-validation-upload-file"></label>
                    <input type="file" class="form-control" id="bs-validation-upload-file" required />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="bs-validation-bio">Address</label>
                    <textarea class="form-control" id="bs-validation-bio" name="bs-validation-bio" rows="3" required></textarea>
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
