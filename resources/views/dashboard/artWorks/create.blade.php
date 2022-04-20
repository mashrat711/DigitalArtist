@extends('layouts.backend-layout')
@section('title', 'artWorks')

@section('breadcrumb-title')
    @if($formType == 'edit')
        Edit artWorks
    @else
        Add New artWorks
    @endif
@endsection

@section('breadcrumb-button')
    <a href="{{ url('artWorks') }}" class="btn btn-out-dashed btn-sm btn-custom"><i class="fas fa-database"></i></a>
@endsection

@section('sub-title')
    <span class="text-danger">*</span> Marked are required.
@endsection

@section('content-grid', null)

@section('content')

    @if($formType == 'edit')
        {!! Form::open(array('url' => "artWorks/$artWork->id",'encType' =>"multipart/form-data", 'method' => 'PUT', 'class'=>'custom-form')) !!}
    @else
        {!! Form::open(array('url' => "artWorks",'method' => 'POST','encType' =>"multipart/form-data", 'class'=>'custom-form')) !!}
    @endif
        <div class="row">
        <div class="col-md-12">
        
    
        
         
       
    </div>
        </div>
        <div class=" row col-md-12">

            
            <div class="col-6">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="name">Event<span class="text-danger">*</span></label>
                    {{Form::select('event_id', $events, old('event_id') ? old('event_id') : (!empty($artWork->event_id) ? $artWork->event_id : null),['class' => 'form-control','id' => 'name', 'placeholder'=>"Select Event", 'autocomplete'=>"off"])}}
                </div>
            </div>
             <div class="col-6">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="name">Artist<span class="text-danger">*</span></label>
                    {{Form::select('artist_id', $artists, old('artists') ? old('artists') : (!empty($artWork->artists) ? $artWork->artists : null),['class' => 'form-control','id' => 'name', 'placeholder'=>"Select Name", 'autocomplete'=>"off"])}}
                </div>
            </div>
            </div>
        <div class=" col-md-12">
         <div class="input-group input-group-sm input-group-primary">
            <label class="input-group-addon" for="title">title<span class="text-danger">*</span></label>
            {{Form::text('title', old('title') ? old('title') : (!empty($artWork->title) ? $artWork->title : null),['class' => 'form-control','id' => 'title', 'autocomplete'=>"off"])}}
        </div>
        </div>
            <div class=" col-md-12">
            <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="sub_title_id">sub_title<span class="text-danger">*</span></label>
                    {{-- {{Form::select('sub_title_id', $sub_titles, old('sub_title_id') ? old('sub_title_id') : (!empty($artWork->sub_title_id) ? $artWork->sub_title_id : null),['class' => 'form-control','id' => 'sub_title_id', 'placeholder'=>"Select Section", 'autocomplete'=>"off"])}} --}}
                    {{Form::text('sub_title', old('sub_title') ? old('sub_title') : (!empty($artWork->sub_title) ? $artWork->sub_title : null),['class' => 'form-control','id' => 'sub_title', 'autocomplete'=>"off"])}}

                </div>
            </div>
                    


            
         
            
            <div class="row col-md-12">
                <div class="col-12">
                    <div class="input-group input-group-sm input-group-primary">
                        <label class="input-group-addon" for="permanent_address">Description</label>
                        {{Form::textarea('description', old('description') ? old('description') : (!empty($artWork->description) ? $artWork->description : null),['class' => 'form-control','id' => 'permanent_description', 'autocomplete'=>"off",'rows'=>2])}}
                    </div>
                </div>
            </div>
            <div class="row col-md-12">



                </div>

            <div class="row col-md-12">
            <div class="col-md-9 col-lg-4 form-group mt-0 mb-0">
                <div class="">

                    <div class="custom-file">
                         {{-- <label class="input-group-addon" for="image">Image</label> --}}
                        {{Form::file('image', ['class' => 'form-control','id' => 'uploadFile',"onchange"=>"document.getElementById('picture').src = window.URL.createObjectURL(this.files[0])"]  )}}
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-2 form-group mt-0 mb-0">
                @if ($formType=='edit' and $artWork != null)
                {{-- {{dd($artWork->image)}} --}}
                    <img src="{{asset("dashboard/pictures/artWork/$artWork->image")}}" id="picture"  width="120px" height="60px" alt="">
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

