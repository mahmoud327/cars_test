@extends('dashboard.layouts.master')
@section('title', 'Edit' . request('type') == 'car' ? 'Category' : request('type'))
@section('content')

    <div class="col-md">
        <div class="card">

            <form action="{{ route('categories.update', [$category->id,'type' => request('type'),'parent_id'=>request('parent_id')]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <h5 class="card-header">Edit {{ request('type') == 'car' ? 'Category' : request('type') }}</h5>
                <div class="card-body">
                    <form class="needs-validation" novalidate>
                        @foreach (config('translatable.locales') as $locale)
                            <div class="mb-3">
                                <label class="form-label" for="{{ $locale . '[name]' }}"> Name {{ $locale }}</label>
                                <input type="text" class="form-control" id="{{ $locale . '[name]' }}" value="{{ $category->translate($locale)->name }}"
                                    name="{{ $locale . '[name]' }}" required />

                            </div>
                        @endforeach



                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-upload-file">Image</label>
                            <input type="file" class="form-control" name="image" id="bs-validation-upload-file" value="{{$category->image}}"/>
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
