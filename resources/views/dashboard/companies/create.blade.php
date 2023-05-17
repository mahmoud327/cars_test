@extends('dashboard.layouts.master')
@section('title', 'create company ')
@section('content')

    <div class="col-md">
        <div class="card">

            <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <h5 class="card-header">Add Company</h5>
                <div class="card-body">
                    <form class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-name">Company Name</label>
                            <input type="text" class="form-control" id="bs-validation-name" name="name"
                                placeholder="John Doe" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-upload-file"></label>
                            <input type="file" class="form-control" name="image" id="bs-validation-upload-file"
                                required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-upload-file">featureImage</label>
                            <input type="file" class="form-control" name="featureImage" id="bs-validation-upload-file"
                                required />
                        </div>
                        <div class="mb-3">

                            <label class="form-label" for="bs-validation-bio"> choose user </label>
                            <select class="form-control" required name="user_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->full_name }}

                                    </option>
                                @endforeach
                            </select>


                        </div>
                        <div class="mb-3">

                            <label class="form-label" for="bs-validation-bio"> choose city </label>
                            <select class="form-control" required name="city_id">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">
                                        {{ $city->title }}

                                    </option>
                                @endforeach
                            </select>


                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-bio">Address</label>
                            <textarea class="form-control" id="bs-validation-bio" name="address" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-bio">Phone number</label>
                            <input type="text" class="form-control" id="bs-validation-name" name="phone"
                                placeholder="enter phone" required />


                        </div>



                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>


    <script>
        $(function() {
            $(".datatables").DataTable({

            })
        });
    </script>
@endsection
