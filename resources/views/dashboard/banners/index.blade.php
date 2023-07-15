@extends('dashboard.layouts.master')
@section('title', request('type') == 'car' ? 'Categories' : request('type'))
@section('content')

    <div class="card">
        <h5 class="card-header">{{ request('type') == 'car' ? 'Categories' : request('type') }}</h5>

        <div class="">
            <a href="{{ route('banners.create') }}"
                class="dt-button add-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button"
                fdprocessedid="dvqh2r"><span><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span
                        class="d-none d-sm-inline-block"></span></span>
            </a>
        </div>
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-companies table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Image </th>
                        @foreach (config('translatable.locales') as $locale)
                            <th> title ({{ $locale }}) </th>
                        @endforeach
                        <th style="text-alight:center">Action</th>

                    </tr>
                </thead>
                <tbody>


                    @foreach ($records as $record)
                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($record->image)
                                    <img src="{{ asset('uploads/banners/' . $record->image) }}" alt=""
                                        width="50px" height="50px">
                                @endif
                            </td>

                            @foreach (config('translatable.locales') as $locale)
                                <td>{{ optional($record->translate($locale))->title }}</td>
                            @endforeach


                            {{-- <td><span class="badge bg-label-"></span>
                            </td> --}}
                            <td>

                                {{-- <button type="button" onclick="confirmStatus(this)" id="status<?php echo $list['userId']; ?>"
                                    data-column="userId" data-table="mstcompanies" data-status="<?php echo $list['isActive']; ?>"
                                    data-update-path="admin/User/updateStatus" data-update="<?php echo $list['userId']; ?>"
                                    title="Change  Status" class="btn btn-icon btn-label-linkedin col-4">
                                    <i class="tf-icons ti ti-mouse"></i>
                                </button> --}}
                                {{-- //add model --}}

                                <a href="{{ route('banners.edit', $record->id) }}"
                                    style="margin-left:2px" class="btn btn-icon btn-label-warning col-4">
                                    <i class="tf-icons ti ti-edit"></i>
                                </a>
                                <button type="button" onclick="confirmDeleted(this)" id=2
                                    data-column-id={{ $record->id }}
                                    data-delete-path="{{ route('banners.destroy', $record->id) }}"
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
