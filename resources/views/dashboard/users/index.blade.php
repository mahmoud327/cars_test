@extends('dashboard.layouts.master')
@section('title', 'users')
@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@endpush

@section('content')

    <div class="card">
        <div class="" style="margin-left:1100px">
            <a href="{{ route('users.create') }}" class="dt-button add-new btn btn-primary" tabindex="0"
                aria-controls="DataTables_Table_0" type="button" fdprocessedid="dvqh2r"><span><i
                        class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block"></span></span>
            </a>
        </div>
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-companies table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> userName</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th style="text-alight:center">Action</th>

                    </tr>
                </thead>
                <tbody>


                    @foreach ($users as $list)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $list->full_name }}</td>
                            <td>{{ $list->email }}</td>
                            <td>{{ $list->phone }}</td>
                            <td><span class="badge bg-label-<?php echo $list['is_active'] == 0 ? 'warning' : 'success'; ?>"><?php echo $list['isActive'] == 0 ? 'Awaitong Approvel' : 'Active'; ?></span>
                            </td>
                            <td>



                                <!-- Modal -->



                                <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                  data-toggle="modal"
                                            href="#changeStatus{{ $list->id }}" title="تعديل">
                                         <i class="fa fa-eye"> </i>
                               </a>




                                <a href="{{ route('users.edit', $list->id) }}" style="margin-left:2px"
                                    class="btn btn-icon btn-label-warning col-4">
                                    <i class="tf-icons ti ti-edit"></i>
                                </a>


                                @include('dashboard.users.change-status-modal',['list_id'=>$list->id])


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
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </script>
@endsection
