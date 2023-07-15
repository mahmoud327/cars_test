@extends('dashboard.layouts.master')
@section('title', 'Edit Page' )
@section('content')

    <div class="col-md">
        <div class="card">

            <form action="{{ route('pages.update', $page->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <h5 class="card-header">Edit Page</h5>
                <div class="card-body">
                    <form class="needs-validation" novalidate>
                        @foreach (config('translatable.locales') as $locale)
                            <div class="mb-3">
                                <label class="form-label" for="{{ $locale . '[title]' }}"> Title {{ $locale }}</label>
                                <input type="text" class="form-control" id="{{ $locale . '[title]' }}" value="{{ $page->translate($locale)->title }}"
                                    name="{{ $locale . '[title]' }}" required />

                            </div>
                            @error('title')
                                <span class="text-danger fw-bold">{{ $errors->first($locale . 'title') }}</span>
                            @enderror
                        @endforeach
                        {{-- content --}}
                        @foreach (config('translatable.locales') as $locale)
                        <div class="col-12">
                            <div class="mb-3 ">
                                <label for="{{ $locale . '[content]' }}" class="form-label">Content {{$locale}}</label>
                                <input type="hidden" name="{{ $locale . '[content]' }}" type="text" class="form-control"
                                value="{{ optional($page->translate($locale))->content }}" id="{{ $locale . '[content]' }}" required />
                                    <trix-editor input="{{ $locale . '[content]' }}"></trix-editor>
                                @error('content')
                                    <span class="text-danger fw-bold">{{ $errors->first($locale . 'content') }}</span>
                                @enderror
                            </div>
                        </div>
                    @endforeach









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
