@extends('layouts.backend-layout')
@section('title', 'events')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/Datatables/dataTables.bootstrap4.min.css')}}">
@endsection

@section('breadcrumb-title')
    List of events
@endsection


@section('breadcrumb-button')
    <a href="{{ url('events/create') }}" class="btn btn-out-dashed btn-sm btn-custom"><i class="fa fa-plus"></i></a>
@endsection

@section('sub-title')
    Total: {{ count($events) }}
    @endsection


    @section('content')
            <!-- put search form here.. -->
    <div class="table-responsive">
        <table id="dataTable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Sub Title</th>
                <th>Date</th>
                <?php if(Auth::User()->user_type=='admin'){?>  
                <th>Status</th>
                 <?php }else{ ?>
                 <th>Submit Work</th>
                 <?php } ?>
                
                
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Sub Title</th>
                <th>Date</th>
                <th>Status</th>
                
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($events as $key => $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td> {{ $data->title }}</td>
                    <td> {{ $data->sub_title }}</td>
                    <td> {{ $data->date }}</td>
<td>
                    <?php if(Auth::User()->user_type=='admin'){?>  
                        
                    
                    <?php if($data->status == '1'){ ?> 
                        <a href="{{url('/status-update',$data->id)}}" class="btn btn-success">Active</a>
                    <?php }else{ ?> 
                    <a href="{{url('/status-update',$data->id)}}" class="btn btn-danger">Inactive</a>
                    <?php } ?>
                            
                   <?php }else{ ?>

                         <a href="{{ route("artWorks.create") }}" data-toggle="tooltip" title="Edit" class="btn btn-outline-danger"><i class="fas fa-plus"></i></a>
                        
                    <?php } ?>
                    </td>
                     
                    
                    
                    <td>
                        <div class="icon-btn">
                            <nobr>
                                <a href="{{ url("events/$data->id/edit") }}" data-toggle="tooltip" title="Edit" class="btn btn-outline-warning"><i class="fas fa-pen"></i></a>
                                {!! Form::open(array('url' => "events/$data->id",'method' => 'delete', 'class'=>'d-inline','data-toggle'=>'tooltip','title'=>'Delete')) !!}
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
        $(window).scroll(function () {
            //set scroll position in session storage
            sessionStorage.scrollPos = $(window).scrollTop();
        });
        var init = function () {
            //get scroll position in session storage
            $(window).scrollTop(sessionStorage.scrollPos || 0)
        };
        window.onload = init;

        $(document).ready(function () {
            $('#dataTable').DataTable({
                stateSave: true
            });
        });
    </script>
@endsection
