@extends('admin.layout.admin_layout')

@section('content')
  <div class="content-wrapper" style="min-height: 1302.32px;">
    <?php 
    $var = explode('/', request()->route()->uri);
  #echo $var[0];
    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blogs</h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(Session::has('success'))
      <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="search-form d-flex align-items-center" method="get" action="{{url('admin/blogs/list')}}">
                  @csrf
                  <input type="text" name="q" placeholder="Search" required title="Enter search keyword">

                </form>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th scope="col">Priority</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form method="post" action="{{url('admin/blogs/priority/update')}}" enctype="multipart/form-data">
                      @csrf
                      @foreach ($data as $key => $val)
                        <tr>
                          <td>{{$key + 1}}</td>
                          <td><input type="number" min="0" name="priority[{{$val->id}}]" value="{{$val->priority}}"
                              style="width:50px; text-align:center;"></td>
                          <td>{{ $val->name }}</td>
                          <td>
                            {{ $val->slug }}
                          </td>
                          <td>
                            <a href="#">@if($val->status == 1)<i class="fas fa-toggle-on"></i>@else<i
                            class="fas fa-toggle-off"></i>@endif</a>
                            <a href="{{url($var[0] . '/blogs/edit')}}/{{$val->id}}"><i class="fas fa-edit"></i></a>
                            <a onclick="return confirm('Are you sure?')"
                              href="{{url($var[0] . '/blogs/delete')}}/{{$val->id}}"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                      @endforeach
                      <tr>
                        <td colspan="8">
                          <input type="submit" name="p" value="Update Priority" class="btn btn-primary">
                          <!-- <input type="submit" name="d" value="Doctor Priority" class="btn btn-primary">
                        <input type="submit" name="s" value="Speciality Priority" class="btn btn-primary"> -->
                        </td>
                      </tr>
                    </form>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {!! $data->links('pagination::bootstrap-5') !!}
              </div>
            </div>

          </div>

        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection