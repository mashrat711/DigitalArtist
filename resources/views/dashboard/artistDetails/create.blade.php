@extends('layouts.backend-layout')
@section('title', 'Requistions')

@section('breadcrumb-title')
    @if($formType == 'edit')
        Edit Details
    @else
        Add New Project
    @endif
@endsection

@section('breadcrumb-button')
    <a href="{{ url('artistDetails') }}" class="btn btn-out-dashed btn-sm btn-custom"><i class="fas fa-database"></i></a>
@endsection

@section('sub-title')
    <span class="text-danger">*</span> Marked are required.
@endsection

@section('content-grid', null)

@section('content')

    @if($formType == 'edit')
        {!! Form::open(array('url' => "artistDetails/$artistDetails->id",'encType' =>"multipart/form-data",'method' => 'PUT', 'class'=>'custom-form')) !!}
    @else
        {!! Form::open(array('url' => "artistDetails",'encType' =>"multipart/form-data",'method' => 'POST', 'class'=>'custom-form')) !!}
    @endif
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="name">Name<span class="text-danger">*</span></label>
                    {{Form::select('artist_id', $artists, old('name') ? old('name') : (!empty($artistDetails->name) ? $artistDetails->name : null),['class' => 'form-control','id' => 'name', 'placeholder'=>"Select name", 'autocomplete'=>"off"])}}
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="input-group input-group-sm input-group-primary">
                    <label class="input-group-addon" for="date">Date<span class="text-danger">*</span></label>
                    {{Form::text('date', old('date') ? old('dob') : (!empty($artistDetails->date) ? $artistDetails->date : now()->format('d-m-Y')),['class' => 'form-control','id' => 'date', 'autocomplete'=>"off", 'required'])}}
                </div>
            </div>

        </div><!-- end row -->

        <hr class="bg-success">
        <div class="table-responsive">
            <table id="purchaseTable" class="table table-striped table-bordered" >
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Subtitle</th>
                     <th>Des</th>
                    <th>Image</th>
                   
                    <th><i class="btn btn-primary btn-sm fa fa-plus" id="addItem" onclick="addItemDtl()"> </i></th>
                </tr>
                </thead>
                <tbody>

                @if(!empty($artistDetails))
                    @foreach($artistDetails->requisitiondetails as $artistDetailsdetail)
                        <tr>
                            <td>{{Form::text('title[]', old('title') ? old('title') : (!empty($artistDetailsdetail->title) ? $artistDetailsdetail->title : null),['class' => 'form-control text-right', 'min'=>'0', 'step'=>'0.01', 'required'] )}}</td>
                            <td>{{Form::text('sub_title[]', old('sub_title') ? old('sub_title') : (!empty($artistDetailsdetail->sub_title) ? $artistDetailsdetail->sub_title : null),['class' => 'form-control text-right', 'min'=>'0', 'step'=>'0.01'] )}}</td>
                            <td>{{Form::textarea('description[]', old('description') ? old('description') : (!empty($artistDetailsdetail->description) ? $artistDetailsdetail->description : null),['class' => 'form-control title', 'rows'=>1] )}}</td>
                            <td>{{Form::file('image[]', old('image') ? old('image') : (!empty($artistDetailsdetail->image) ? $artistDetailsdetail->image : null),['class' => 'form-control title', 'rows'=>1] )}}</td>

                           <td class="text-center"><button class="btn btn-danger btn-sm deleteItem" onclick="removQRow(this)" type="button"><i class="fa fa-minus"></i></button></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>

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

        var i = "{{!empty($artistDetails) ? count($artistDetails->requisitiondetails) : 1}}";
        function addItemDtl(){
            i++;
            var Row = `
                <tr>
                <td>{{Form::text('title[]', old('title') ? old('title') : (!empty($artistDetails->title) ? $artistDetails->title : null),['class' => 'form-control text-right', 'min'=>'0', 'step'=>'0.01', 'required'] )}}</td>
                <td>{{Form::text('sub_title[]', old('sub_title') ? old('sub_title') : (!empty($artistDetails->sub_title) ? $artistDetails->sub_title : null),['class' => 'form-control text-right', 'min'=>'0', 'step'=>'0.01'] )}}</td>
                <td>{{Form::textarea('description[]', old('description') ? old('description') : (!empty($artistDetails->description) ? $artistDetails->description : null),['class' => 'form-control', 'rows' => 1] )}}</td>
                <td>{{Form::file('image[]', old('image') ? old('image') : (!empty($artistDetails->image) ? $artistDetails->image : null),['class' => 'form-control', 'rows' => 1] )}}</td>

                <td class="text-center"><button class="btn btn-danger btn-sm deleteItem" onclick="removQRow(this)" id="" type="button"><i class="fa fa-minus"></i></button></td>
                </tr>
            `;

            var tableItem = $('#purchaseTable').append(Row);
        }
        function removQRow(qval){
            var rowIndex = qval.parentNode.parentNode.rowIndex;
            document.getElementById("purchaseTable").deleteRow(rowIndex);
        }

        $(function(){
            @if($formType == 'create')
                addItemDtl();
            @endif

            $('#date').datepicker({format: "dd-mm-yyyy",autoclose: true,todayHighlight: true,showOtherMonths: true});
        });


    </script>
@endsection
