@extends('dashboard.layouts.master')
@section('title', 'Car Features')
@section('content')

    <div class="card">
        <h5 class="card-header">{{ $feature->translate('en')->name }} Listings</h5>

        <div class="" style="margin-left:1100px">
            <a href="{{ route('feature.listings.create', $feature) }}" class="dt-button add-new btn btn-primary" tabindex="0"
                aria-controls="DataTables_Table_0" type="button" fdprocessedid="dvqh2r"><span><i
                        class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block"></span></span>
            </a>
        </div>
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-companies table">
                <thead>
                    <tr>
                        <th>#</th>
                        @foreach (config('translatable.locales') as $locale)
                            <th> Name ({{ $locale }}) </th>
                        @endforeach
                        <th style="text-alight:center">Action</th>

                    </tr>
                </thead>
                <tbody>


                    @foreach ($records as $record)
                        <tr>

                            <td>{{ $loop->iteration }}</td>


                            @foreach (config('translatable.locales') as $locale)
                                <td>{{ $record->translate($locale)->name }}</td>
                            @endforeach


                            {{-- <td><span class="badge bg-label-"></span>
                            </td> --}}
                            <td>



                                <a href="{{ route('feature.listings.edit', [$feature, $record->id]) }}"
                                    style="margin-left:2px" class="btn btn-icon btn-label-warning col-4">
                                    <i class="tf-icons ti ti-edit"></i>
                                </a>

                                <button type="button" onclick="confirmDeleted(this)" id={{  $record->id }}
                                    data-column-id={{ $record->id }}
                                    data-delete-path="{{ route('feature.listings.destroy', [$feature, $record->id]) }}"
                                    class="btn btn-icon btn-label-danger col-4">
                                    <i class="tf-icons ti ti-trash"></i>

                                </button>
                                {{-- <a href="{{ route('categories.show', $list->id) }}" style="margin-left:2px"
                                    class="btn btn-icon btn-label-success col-4">
                                    <i class="tf-icons ti ti-eye"></i>
                                </a> --}}

                                {{-- <button type="button" onclick="confirmDelete(this)" id="{{ $list->id }}"
                                    data-column="userId" data-delete-path="companies/destroy"
                                    data-delete="{{$list->id}}" style="margin-left:2px"
                                    class="btn btn-icon btn-label-danger col-4">
                                    <i class="tf-icons ti ti-trash"></i>
                                </button> --}}

                            </td>





                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(function() {
            $(".datatables").DataTable({

            })
        });
    </script>
@endsection
