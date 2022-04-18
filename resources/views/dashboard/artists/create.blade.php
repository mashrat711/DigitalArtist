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
        {!! Form::open(array('url' => "artists/$artist->id",'encType' =>"multipart/form-data", 'method' => 'PUT', 'class'=>'custom-form')) !!}
    @else
        {!! Form::open(array('url' => "artists",'method' => 'POST','encType' =>"multipart/form-data", 'class'=>'custom-form')) !!}
    @endif
        <div class="row">
        <div class="col-md-12">
        
    
        
         
        <div class="input-group input-group-sm input-group-primary">
            <label class="input-group-addon" for="name">Name<span class="text-danger">*</span></label>
            {{Form::text('name', old('name') ? old('name') : (!empty($artist->name) ? $artist->name : null),['class' => 'form-control','id' => 'name', 'autocomplete'=>"off"])}}
        </div>
    </div>
        </div>
            <div class=" col-md-12">
            <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="designation_id">Designation<span class="text-danger">*</span></label>
                    {{-- {{Form::select('designation_id', $designations, old('designation_id') ? old('designation_id') : (!empty($artist->designation_id) ? $artist->designation_id : null),['class' => 'form-control','id' => 'designation_id', 'placeholder'=>"Select Section", 'autocomplete'=>"off"])}} --}}
                                {{Form::text('designation', old('designation') ? old('designation') : (!empty($artist->designation) ? $artist->designation : null),['class' => 'form-control','id' => 'designation', 'autocomplete'=>"off"])}}

                </div>
            </div>
                    

    <div class=" row col-md-12">

            
            <div class="col-6">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="dob"> DOB <span class="text-danger">*</span></label>
                    {{Form::text('dob', old('dob') ? old('dob') : (!empty($artist->date) ? $artist->date : now()->format('d-m-Y')),['class' => 'form-control','id' => 'date', 'autocomplete'=>"off", 'required'])}}
                </div>
            </div>
            <div class=" row col-md-12">
            <div class="col-6">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="contact">Contact<span class="text-danger">*</span></label>
                    {{Form::text('contact', old('contact') ? old('contact') : (!empty($artist->contact) ? $artist->contact : null),['class' => 'form-control','id' => 'contact', 'autocomplete'=>"off"])}}
                </div>
            </div>
            <div class="col-6">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="email">Email<span class="text-danger">*</span></label>
                    {{Form::email('email', old('email') ? old('email') : (!empty($artist->email) ? $artist->email : null),['class' => 'form-control','id' => 'email', 'autocomplete'=>"off"])}}
                </div>
            </div>
                </div>
            <div class="row col-md-12">
                <div class="col-12">
                    <div class="input-group input-group-sm input-group-primary">
                        <label class="input-group-addon" for="permanent_address">Address</label>
                        {{Form::textarea('address', old('address') ? old('address') : (!empty($artist->address) ? $artist->address : null),['class' => 'form-control','id' => 'permanent_address', 'autocomplete'=>"off",'rows'=>2])}}
                    </div>
                </div>
            </div>
            <div class="row col-md-12">



                </div>

            <div class="row col-md-12">
            <div class="col-md-9 col-lg-4 form-group mt-0 mb-0">
                <div class="">

                    <div class="custom-file">
                         <label class="input-group-addon" for="image">Image</label>
                        {{Form::file('image', ['class' => 'form-control','id' => 'uploadFile',"onchange"=>"document.getElementById('picture').src = window.URL.createObjectURL(this.files[0])"]  )}}
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-2 form-group mt-0 mb-0">
                @if ($formType=='edit' and $artist != null)
                {{-- {{dd($artist->image)}} --}}
                    <img src="{{asset("dashboard/pictures/artist/$artist->image")}}" id="picture"  width="120px" height="60px" alt="">
                @else
                                

                    <img id="picture" width="120px" height="60px" alt="" />
                @endif
            </div>
                {{-- <div class="col-12">

                    <div class="input-group input-group-sm input-group-primary">
                        <label class="input-group-addon" for="image"> Photo <span class="text-danger">*</span></label>
                        {{Form::file('image',['class' => 'form-control','id' => ''])}}
                    </div>
                </div> --}}
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

