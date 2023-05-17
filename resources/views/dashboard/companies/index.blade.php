@extends('dashboard.layouts.master')
@section('title', 'companies')
@section('content')

    <div class="card">
        <div class="" style="margin-left:1100px">
            <a href="{{ route('companies.create') }}" class="dt-button add-new btn btn-primary" tabindex="0"
                aria-controls="DataTables_Table_0" type="button" fdprocessedid="dvqh2r"><span><i
                        class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block"></span></span>
            </a>
        </div>
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-companies table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th style="text-alight:center">Action</th>

                    </tr>
                </thead>
                <tbody>


                    @foreach ($companies as $list)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $list->name }}</td>
                            <td>{{ $list->email }}</td>
                            <td>{{ $list->phone }}</td>
                            <td><span class="badge bg-label-<?php echo $list['is_active'] == 0 ? 'warning' : 'success'; ?>"><?php echo $list['isActive'] == 0 ? 'Awaitong Approvel' : 'Active'; ?></span>
                            </td>
                            <td>

                                <button type="button" onclick="confirmStatus(this)" id="status<?php echo $list['userId']; ?>"
                                    data-column="userId" data-table="mstcompanies" data-status="<?php echo $list['isActive']; ?>"
                                    data-update-path="admin/User/updateStatus" data-update="<?php echo $list['userId']; ?>"
                                    title="Change  Status" class="btn btn-icon btn-label-linkedin col-4">
                                    <i class="tf-icons ti ti-mouse"></i>
                                </button>
                                <a href="{{ route('companies.edit', $list->id) }}" style="margin-left:2px"
                                    class="btn btn-icon btn-label-warning col-4">
                                    <i class="tf-icons ti ti-edit"></i>
                                </a>
                                <a href="{{ route('companies.show', $list->id) }}" style="margin-left:2px"
                                    class="btn btn-icon btn-label-success col-4">
                                    <i class="tf-icons ti ti-eye"></i>
                                </a>

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
