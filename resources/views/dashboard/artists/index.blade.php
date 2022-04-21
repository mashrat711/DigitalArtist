@extends('layouts.backend-layout')
@section('title', 'Artists')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/Datatables/dataTables.bootstrap4.min.css')}}">
@endsection

@section('breadcrumb-title')
    List of Arists
@endsection


@section('breadcrumb-button')
    <a href="{{ url('artists/create') }}" class="btn btn-out-dashed btn-sm btn-custom"><i class="fa fa-plus"></i></a>
@endsection

@section('sub-title')
    Total: {{ count($data) }}
    @endsection


    @section('content')
            <!-- put search form here.. -->
    <div class="table-responsive">
        <table id="dataTable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>DOB</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>DOB</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($data as $key => $employee)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td> {{ $employee->name ?? ''}}</td>
                    <td> {{ $employee->department ?? ''}}</td>
                    <td> {{ $employee->designation ?? ''}}</td>
                    <td> {{ $employee->dob ? date('d-m-Y',strtotime($employee->dob)):''}}</td>
                    <td> {{ $employee->contact ?? ''}}</td>
                    <td> {{ $employee->email ?? ''}}</td>
                    <td> {{ $employee->address ?? ''}}</td>
                    {{-- {{dd("$data->image")}} --}}
                    <td><img class="d-flex align-self-center img-radius" style="width: 100px"
                             src='{{asset("dashboard/pictures/artist/$employee->image")}}' alt=""></td>
                    <td>
                        <div class="icon-btn">
                            <nobr>
                                <a href="{{ url("artists/$employee->id") }}" data-toggle="tooltip" title="Show" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>

                                <a href="{{ url("artists/$employee->id/edit") }}" data-toggle="tooltip" title="Edit" class="btn btn-outline-warning"><i class="fas fa-pen"></i></a>
                                {!! Form::open(array('url' => "artists/$employee->id",'method' => 'delete', 'class'=>'d-inline','data-toggle'=>'tooltip','title'=>'Delete')) !!}
                                {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm delete'])}}
                                {!! Form::close() !!}
                            </nobr>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/Datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/Datatables/dataTables.bootstrap4.min.js')}}"></script> 
    <script>
       
        $(document).ready(function () {
            $('#dataTable').DataTable({
                stateSave: true
            });
        });
        $('#date').datepicker({format: "dd-mm-yyyy",autoclose: true,todayHighlight: true,showOtherMonths: true});
    </script>
@endsection
