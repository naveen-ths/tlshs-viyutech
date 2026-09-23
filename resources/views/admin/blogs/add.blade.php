@extends('admin.layout.admin_layout')

@section('content')
<?php 
$var =  explode('/',request()->route()->uri);  
#echo $var[0];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 1345.52px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form method="post"
        action="@if(!isset($data->id)){{url($var[0].'/blogs/store')}}@else{{url($var[0].'/blogs/update')}} @endif"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="blogs_id" value="@if(isset($data->id)){{$data->id}}@endif">
       
        
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Blogs</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->


                            <div class="card-body">

                                
                              
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="name"  
                                        value="@if(isset($data->name)){{$data->name}}@endif"
                                        class="form-control" id="title" placeholder="Enter Title">
                                    @if ($errors->has('name'))<span
                                        class="error">{{ $errors->first('name') }}</span>@endif
                                </div>

                                  
                                <div class="form-group">
                                    <label for="exampleInputPassword1">URL(Slug)</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Enter URL" value="@if(isset($data->slug)){{$data->slug}}@endif">
                                    @if ($errors->has('slug'))<span
                                        class="error">{{ $errors->first('slug') }}</span>@endif
                                </div>
                                       
								<div class="form-group">
                                    <label> Category</label>
                                    <select class="form-control select2" name="speciality_id[]" multiple
                                        id="speciality_id" style="width: 100%;">
                                        <option value="">Select Category</option>
                                        @foreach($speciality as $val)
                                        <option value="{{$val->id}}" @if(isset($data->speciality_id))
                                            @foreach(explode(',',$data->speciality_id) as $vid)
                                            @if(isset($vid) && ($vid == $val->id)) selected @endif
                                            @endforeach
                                            @endif
                                            >{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Sub Category </label>
                                    <select class="form-control select2" name="subspeciality_id[]" multiple
                                        id="subspeciality_id" style="width: 100%;">
                                        <option value="">Select Sub Category</option>
                                        @if(isset($data->subspeciality_id))
                                        @foreach(explode(',',$data->subspeciality_id) as $subs_id)
                                        <option value="{{$subs_id}}" @if(isset($subs_id) && !empty($subs_id)) selected
                                            @endif>{{App\Models\Sub_Speciality::getSubSpecialityName($subs_id)}}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                   
 

                                <div class="form-group">
                                    <label for="exampleInputFile">Small Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="icon" type="file" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @if(isset($data->icon)) <img src="{{asset('blog')}}/{{$data->icon}}"
                                        style="height: 50px;width:60px" alt="">@endif
                                    @if(isset($data->icon)) <input type="hidden" value="{{$data->icon}}"
                                        name="icon_thumb" alt="">@endif

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Large Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @if(isset($data->image)) <img src="{{asset('blog')}}/{{$data->image}}"
                                        style="height: 50px;width:60px" alt="">@endif
                                    @if(isset($data->image)) <input type="hidden" value="{{$data->image}}"
                                        name="image_thumb" alt="">@endif
                                </div>

                                <!-- <div class="form-group">
                                    <label for="exampleInputFile">Mobile View Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="mobicon" type="file" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @if(isset($data->imgmobicon)) <img src="{{asset('blog')}}/{{$data->imgmobicon}}"
                                        style="height: 50px;width:60px" alt="">@endif
                                    @if(isset($data->imgmobicon)) <input type="hidden" value="{{$data->imgmobicon}}"
                                        name="mobicon_thumb" alt="">@endif

                                </div> -->


                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Short Description
                                            </h3>
                                        </div>
                                        <textarea class="ckeditor" name="short_description">
                                        @if(isset($data->short_description)){{$data->short_description}}@endif
                                       </textarea>
                                    </div>
                                </div>
 

                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                               Long Description
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description">
                                        @if(isset($data->long_description)){{$data->long_description}}@endif
                                       </textarea>
                                    </div>
                                </div>


                               <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                           Faq Schema 
                                            </h3>
                                        </div>

                                        <textarea  name="long_description2">
                                        @if(isset($data->long_description2)){{$data->long_description2}}@endif
                                       </textarea>
                                    </div>
                                </div>
<!--
                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading3"
                                                value="@if(isset($data->heading3)){{$data->heading3}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading3'))<span
                                                class="error">{{ $errors->first('heading3') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description3">
                                        @if(isset($data->long_description3)){{$data->long_description3}}@endif
                                       </textarea>
                                    </div>
                                </div>

                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading4"
                                                value="@if(isset($data->heading4)){{$data->heading4}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading4'))<span
                                                class="error">{{ $errors->first('heading4') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description4">
                                        @if(isset($data->long_description4)){{$data->long_description4}}@endif
                                       </textarea>
                                    </div>
                                </div>

                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading5"
                                                value="@if(isset($data->heading5)){{$data->heading5}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading5'))<span
                                                class="error">{{ $errors->first('heading5') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description5">
                                        @if(isset($data->long_description5)){{$data->long_description5}}@endif
                                       </textarea>
                                    </div>
                                </div>

                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading6"
                                                value="@if(isset($data->heading6)){{$data->heading6}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading6'))<span
                                                class="error">{{ $errors->first('heading6') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description6">
                                        @if(isset($data->long_description6)){{$data->long_description6}}@endif
                                       </textarea>
                                    </div>
                                </div>  


                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading7"
                                                value="@if(isset($data->heading7)){{$data->heading7}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading7'))<span
                                                class="error">{{ $errors->first('heading7') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description7">
                                        @if(isset($data->long_description7)){{$data->long_description7}}@endif
                                       </textarea>
                                    </div>
                                </div>  

                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading8"
                                                value="@if(isset($data->heading8)){{$data->heading8}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading8'))<span
                                                class="error">{{ $errors->first('heading8') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description8">
                                        @if(isset($data->long_description8)){{$data->long_description8}}@endif
                                       </textarea>
                                    </div>
                                </div> 


                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading9"
                                                value="@if(isset($data->heading9)){{$data->heading9}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading9'))<span
                                                class="error">{{ $errors->first('heading9') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description9">
                                        @if(isset($data->long_description9)){{$data->long_description9}}@endif
                                       </textarea>
                                    </div>
                                </div> 


                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading10"
                                                value="@if(isset($data->heading10)){{$data->heading10}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading10'))<span
                                                class="error">{{ $errors->first('heading10') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description10">
                                        @if(isset($data->long_description10)){{$data->long_description10}}@endif
                                       </textarea>
                                    </div>
                                </div> 


                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading11"
                                                value="@if(isset($data->heading8)){{$data->heading11}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading11'))<span
                                                class="error">{{ $errors->first('heading11') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description11">
                                        @if(isset($data->long_description11)){{$data->long_description11}}@endif
                                       </textarea>
                                    </div>
                                </div> 


                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading12"
                                                value="@if(isset($data->heading12)){{$data->heading12}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading12'))<span
                                                class="error">{{ $errors->first('heading12') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description12">
                                        @if(isset($data->long_description12)){{$data->long_description12}}@endif
                                       </textarea>
                                    </div>
                                </div> 


                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading13"
                                                value="@if(isset($data->heading13)){{$data->heading13}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading13'))<span
                                                class="error">{{ $errors->first('heading13') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description13">
                                        @if(isset($data->long_description13)){{$data->long_description13}}@endif
                                       </textarea>
                                    </div>
                                </div> 


                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading14"
                                                value="@if(isset($data->heading14)){{$data->heading14}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading14'))<span
                                                class="error">{{ $errors->first('heading14') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description14">
                                        @if(isset($data->long_description14)){{$data->long_description14}}@endif
                                       </textarea>
                                    </div>
                                </div> 


                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading15"
                                                value="@if(isset($data->heading15)){{$data->heading15}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading15'))<span
                                                class="error">{{ $errors->first('heading15') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description15">
                                        @if(isset($data->long_description15)){{$data->long_description15}}@endif
                                       </textarea>
                                    </div>
                                </div> 


                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading16"
                                                value="@if(isset($data->heading16)){{$data->heading16}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading16'))<span
                                                class="error">{{ $errors->first('heading16') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description16">
                                        @if(isset($data->long_description16)){{$data->long_description16}}@endif
                                       </textarea>
                                    </div>
                                </div> 


                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="heading17"
                                                value="@if(isset($data->heading17)){{$data->heading17}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('heading17'))<span
                                                class="error">{{ $errors->first('heading17') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_description17">
                                        @if(isset($data->long_description17)){{$data->long_description17}}@endif
                                       </textarea>
                                    </div>
                                </div> 

                                <div class="col-md-12" style="padding: 0">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="">
                                                <input type="text" name="other"
                                                value="@if(isset($data->other)){{$data->other}}@endif"
                                                class="form-control" id="exampleInputEmail1" placeholder="Enter Heading">
                                            @if ($errors->has('other'))<span
                                                class="error">{{ $errors->first('other') }}</span>@endif
                                            </h3>
                                        </div>

                                        <textarea class="ckeditor" name="long_other">
                                        @if(isset($data->long_other)){{$data->long_other}}@endif
                                       </textarea>
                                    </div>
                                </div>  -->

                                <div class="form-group">
                                    <label for="title">Meta Title</label>
                                    <input type="text" value="@if(isset($data->title)){{$data->title}}@endif"
                                        name="title" class="form-control" id="title" placeholder="Enter Meta Title">
                                </div>
                                <div class="form-group">
                                    <label for="Keyword">Meta Keyword</label>
                                    <input type="text" name="keyword"
                                        value="@if(isset($data->keyword)){{$data->keyword}}@endif" class="form-control"
                                        id="Keyword" placeholder="Enter Meta  Keyword">
                                </div>
                                <div class="form-group">
                                    <label for="Description">Meta Description</label>
                                    <textarea name="description" class="form-control" id="Description"
                                        placeholder="Enter Meta  Description">@if(isset($data->description)){{$data->description}}@endif</textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="yt_link">YT OR Video Link</label>
                                    <input type="text" name="yt_link"
                                        value=" @if(isset($data->yt_link)){{$data->yt_link}}@endif" class="form-control"
                                        id="yt_link" placeholder="Enter YT OR Video Link">
                                </div> -->
                                
                                <div class="form-group">
                                <label>Trending Blog</label>
                                <select class="form-control select2" name="featured" style="width: 100%;">
                                <option value="">Select Featured</option>
                                <option value="1" @if(isset($data->featured) && $data->featured==1) selected @endif>Yes</option>
                                <option value="0" @if(isset($data->featured) && $data->featured==0) selected @endif>No</option>
                                </select>
                                </div>
                                <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2" name="status" style="width: 100%;">
                                <option value="">Select Status</option>
                                <option value="1"  @if(isset($data->status) && $data->status==1) selected @endif>Yes</option>
                                <option value="0"  @if(isset($data->status) && $data->status==0) selected @endif>No</option>
                                </select>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </div>
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->

                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
    </form>
    <!-- /.content -->
</div>
@include('admin/ajaxjs/ajaxfile');

<!-- <script>
 $('document').ready(function(){
     $('#subspeciality_id').on('change',function(){
         var id = $(this).val();              
         $.ajax({
             url:"{{url('admin/getSSubspecialityDetailById')}}",
             method:"GET",
             data:{
                 id,
                 "_token": "{{ csrf_token() }}",
             },
             success:function(data){
                
                 $('#condition_id').empty(); 
                 let r = new Option("Select Treatment Condition",""); 
                 $('#condition_id').append(r); 
              $.each(data,function(key,value){
                 let s = new Option(value.name,value.id); 
                 $('#condition_id').append(s); 
             });
             },
             error:function(err){
                 console.log(err); 
             }
         });
     }); 
 });
</script> -->
@endsection