@extends('layouts.backend-layout')
@section('title', 'Artists')

@section('breadcrumb-title')
    @if($formType == 'edit')
        Edit artists
    @else
        Add New artists
    @endif
@endsection

@section('breadcrumb-button')
    <a href="{{ url('artists') }}" class="btn btn-out-dashed btn-sm btn-custom"><i class="fas fa-database"></i></a>
@endsection

@section('sub-title')
    <span class="text-danger">*</span> Marked are required.
@endsection

@section('content-grid', null)

@section('content')

    @if($formType == 'edit')
        {!! Form::open(array('url' => "artists/$employee->id",'encType' =>"multipart/form-data", 'method' => 'PUT', 'class'=>'custom-form')) !!}
    @else
        {!! Form::open(array('url' => "artists",'method' => 'POST','encType' =>"multipart/form-data", 'class'=>'custom-form')) !!}
    @endif
        <div class="row">
        <div class=" row col-md-12">
         
        <div class="input-group input-group-sm input-group-primary">
            <label class="input-group-addon" for="lname">Last Name<span class="text-danger">*</span></label>
            {{Form::text('lname', old('lname') ? old('lname') : (!empty($employee->lname) ? $employee->lname : null),['class' => 'form-control','id' => 'name', 'autocomplete'=>"off"])}}
        </div>
    </div>
        </div>
            <div class=" row col-md-12">


            <div class="col-6">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="designation_id">Department<span class="text-danger">*</span></label>
                    {{Form::select('department_id', $departments, old('department_id') ? old('department_id') : (!empty($employee->department_id) ? $employee->department_id : null),['class' => 'form-control','id' => 'department_id', 'placeholder'=>"Select Section", 'autocomplete'=>"off"])}}
                </div>
            </div>


            <div class="col-6">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="designation_id">Designation<span class="text-danger">*</span></label>
                    {{Form::select('designation_id', $designations, old('designation_id') ? old('designation_id') : (!empty($employee->designation_id) ? $employee->designation_id : null),['class' => 'form-control','id' => 'designation_id', 'placeholder'=>"Select Section", 'autocomplete'=>"off"])}}
                </div>
            </div>
                    </div>

    <div class=" row col-md-12">

            <div class="col-6">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="nid">NID<span class="text-danger">*</span></label>
                    {{Form::text('nid', old('nid') ? old('nid') : (!empty($employee->nid) ? $employee->nid : null),['class' => 'form-control','id' => 'nid', 'autocomplete'=>"off"])}}
                </div>
            </div>
            <div class="col-6">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="dob"> DOB <span class="text-danger">*</span></label>
                    {{Form::text('dob', old('dob') ? old('dob') : (!empty($employee->date) ? $employee->date : now()->format('d-m-Y')),['class' => 'form-control','id' => 'date', 'autocomplete'=>"off", 'required'])}}
                </div>
            </div>
    </div>
            <div class=" row col-md-12">
            <div class="col-6">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="contact">Contact<span class="text-danger">*</span></label>
                    {{Form::text('contact', old('contact') ? old('contact') : (!empty($employee->contact) ? $employee->contact : null),['class' => 'form-control','id' => 'contact', 'autocomplete'=>"off"])}}
                </div>
            </div>
            <div class="col-6">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="email">Email<span class="text-danger">*</span></label>
                    {{Form::email('email', old('email') ? old('email') : (!empty($employee->email) ? $employee->email : null),['class' => 'form-control','id' => 'email', 'autocomplete'=>"off"])}}
                </div>
            </div>
                </div>
            <div class="row col-md-12">
                <div class="col-12">
                    <div class="input-group input-group-sm input-group-primary">
                        <label class="input-group-addon" for="permanent_address">Permanent Address</label>
                        {{Form::textarea('permanent_address', old('permanent_address') ? old('permanent_address') : (!empty($employee->permanent_address) ? $employee->permanent_address : null),['class' => 'form-control','id' => 'permanent_address', 'autocomplete'=>"off",'rows'=>2])}}
                    </div>
                </div>
            </div>
            <div class="row col-md-12">


            <div class="col-12">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="present_address">Present Address</label>
                    {{Form::textarea('present_address', old('present_address') ? old('present_address') : (!empty($employee->present_address) ? $employee->present_address : null),['class' => 'form-control','id' => 'present_address', 'autocomplete'=>"off",'rows'=>2])}}
                </div>
            </div>
                </div>

            <div class="row col-md-12">
                <div class="col-12">

                    <div class="input-group input-group-sm input-group-primary">
                        <label class="input-group-addon" for="picture"> Photo <span class="text-danger">*</span></label>
                        {{Form::file('picture',['class' => 'form-control','id' => 'invoice_img'])}}
                    </div>
                </div></div>
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

