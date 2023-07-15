@extends('dashboard.layouts.master')
@section('title', 'create' .'banners')
@section('content')

    <div class="col-md">
        <div class="card">

            <form action="{{ route('banners.store')}}" method="post"
                enctype="multipart/form-data">
                @csrf

                <h5 class="card-header">Add banners</h5>
                <div class="card-body">
                    <form class="needs-validation" novalidate>
                        @foreach (config('translatable.locales') as $locale)
                            <div class="mb-3">
                                <label class="form-label" for="{{ $locale . '[title]' }}"> title {{ $locale }}</label>
                                <input type="text" class="form-control" id="{{ $locale . '[title]' }}"
                                    name="{{ $locale . '[title]' }}" required />

                            </div>
                        @endforeach



                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-upload-file">Image</label>
                            <input type="file" class="form-control" name="image" id="bs-validation-upload-file"
                                {{ request('type') != 'model' ? 'required' : '' }} />
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
