@extends('layouts.admin')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories</h1>
       
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Categories</li>
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
            <section class="content">
                @if(Session::get('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Categories</h3>
     
                <a href="add_categories" style="max-width: 150px; float: right; display: inline-block" class="btn btn-block btn-success">Add Categories</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="categories" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category Images</th>
                    <th>Operations</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $item)
                 
                  
                  
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}} </td>
                    <td>{{$item->description}} </td>
                   
                    <td class="align-middle"><img src="{{ asset('uploads/category_image/'.$item->image ) }}" class="img-thumbnail" style="width:80px"></td>
                    <td>
                      <a title ="Add Images" href="add-category-images/{{$item->id}}"><i class="fa fa-plus-circle"></i></a>&nbsp &nbsp
                        <a href="edit_categories/{{$item->id}}"><i class="fa fa-edit"></i></a>&nbsp &nbsp
                        <a href="deletecategory/{{$item->id}}" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></a>&nbsp &nbsp
                    </td>
                  </tr>
                
                  @endforeach
                  </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection