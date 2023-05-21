@extends('dashboard.layouts.master')
@section('title','Car tags')
@section('content')

    <div class="card">
        <h5 class="card-header">Car tags</h5>

        <div class="" style="margin-left:1100px">
            <a href="{{ route('tags.create')}}" class="dt-button add-new btn btn-primary" tabindex="0"
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



                                <a href="{{ route('tags.edit', $record->id) }}" style="margin-left:2px"
                                    class="btn btn-icon btn-label-warning col-4">
                                    <i class="tf-icons ti ti-edit"></i>
                                </a>
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
