@extends('dashboard.layouts.master')
@section('title', 'Edit Feature' )
@section('content')

    <div class="col-md">
        <div class="card">

            <form action="{{ route('features.update', $feature->id ) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <h5 class="card-header">Edit Feature  Name</h5>
                <div class="card-body">
                    <form class="needs-validation" novalidate>
                        @foreach (config('translatable.locales') as $locale)
                            <div class="mb-3">
                                <label class="form-label" for="{{ $locale . '[name]' }}"> Name {{ $locale }}</label>
                                <input type="text" class="form-control" id="{{ $locale . '[name]' }}" value="{{ $feature->translate($locale)->name }}"
                                    name="{{ $locale . '[name]' }}" required />

                            </div>
                        @endforeach



                        <div class="mb-3">
                            <label class="form-label" for=""> position</label>
                            <input type="number" class="form-control"
                                name="position" required  value="{{$feature->position }}"/>

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
