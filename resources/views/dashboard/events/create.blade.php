@extends('layouts.backend-layout')
@section('title', 'events')

@section('breadcrumb-title')
    @if($formType == 'edit')
        Edit Event
    @else
        Add New Event
    @endif
@endsection

@section('breadcrumb-button')
    <a href="{{ url('events') }}" class="btn btn-out-dashed btn-sm btn-custom"><i class="fas fa-database"></i></a>
@endsection

@section('sub-title')
    <span class="text-danger">*</span> Marked are required.
@endsection

@section('content-grid', 'offset-md-1 col-md-10 offset-lg-2 col-lg-8 my-3')

@section('content')

    @if($formType == 'edit')
        {!! Form::open(array('url' => "events/$event->id",'method' => 'PUT', 'class'=>'custom-form')) !!}
    @else
        {!! Form::open(array('url' => "events",'method' => 'POST', 'class'=>'custom-form')) !!}
    @endif
        <div class="row">
            <input type="hidden" name="id" value="{{old('id') ? old('id') : (!empty($event->id) ? $event->id : null)}}">
            <div class="col-12">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="name">Title<span class="text-danger">*</span></label>
                    {{Form::text('title', old('title') ? old('title') : (!empty($event->title) ? $event->title : null),['class' => 'form-control','id' => 'title', 'autocomplete'=>"off"])}}
                </div>
            </div>
            <div class="col-12">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="sub_title">Sub Title<span class="text-danger">*</span></label>
                    {{Form::text('sub_title', old('sub_title') ? old('sub_title') : (!empty($event->sub_title) ? $event->sub_title : null),['class' => 'form-control','id' => 'name', 'autocomplete'=>"off"])}}
                </div>
            </div>
            <div class="col-12">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="account_number">Date</label>
                    {{Form::text('date', old('date') ? old('date') : (!empty($artist->date) ? $artist->date : now()->format('d-m-Y')),['class' => 'form-control','id' => 'date', 'autocomplete'=>"off", 'required'])}}
                </div>
            </div>

            <div class="col-12">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="description">Description </label>
                    {{Form::textarea('description', old('description') ? old('description') : (!empty($event->description) ? $event->description : null),['class' => 'form-control','id' => 'description', 'autocomplete'=>"off",'rows'=>3])}}
                </div>
            </div>

            
            

           

        </div><!-- end row -->
        <div class="row">
            <div class="offset-md-4 col-md-4 mt-2">
                <div class="input-group input-group-sm ">
                    <button class="btn btn-custom btn-round btn-block py-2">Submit</button>
                </div>
            </div>
        </div> <!-- end row -->
    {!! Form::close() !!}

@endsection
@section('script')

    <script>
        $('#date').datepicker({format: "dd-mm-yyyy",autoclose: true,todayHighlight: true,showOtherMonths: true});
    </script>
@endsection
