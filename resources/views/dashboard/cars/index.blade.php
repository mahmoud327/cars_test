@extends('dashboard.layouts.master')
@section('title', 'Cars')
@section('content')

    <div class="card">
        <div class="" style="margin-left:1100px">

        </div>
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-companies table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> title</th>
                        <th>description</th>
                        <th>make</th>
                        <th>model</th>
                        <th>year</th>
                        <th>price</th>
                        <th>engine size</th>
                        <th>mileage</th>
                        <th style="text-alight:center">Action</th>

                    </tr>
                </thead>
                <tbody>


                    @foreach ($records as $record)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record->title }}</td>
                            <td>{{ $record->description }}</td>
                            <td>{{ $record->make?->name }}</td>
                            <td>{{ $record->model?->name }}</td>
                            <td>{{ $record->year }}</td>
                            <td>{{ $record->price }}</td>
                            <td>{{ $record->engine_size }}</td>
                            <td>{{ $record->mileage }}</td>

                            <td>


                                <a href="{{ route('cars.show', $record->id) }}" style="margin-left:2px"
                                    class="btn btn-icon btn-label-success col-4">
                                    <i class="tf-icons ti ti-eye"></i>
                                </a>
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
