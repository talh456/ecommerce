@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action ="{{url('editcategories', ['id' => $data->id])}}" method = "POST" enctype="multipart/form-data">
            @csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Category</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
         
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                    <label for="category_name">Category Title</label>
                    <input type="text" class="form-control" name="title" value={{$data->title}} id="category_name" placeholder="Enter Category Name">
                    @error('title')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                    <input type="hidden" name="id" class="form-control" value="{{$data->id}}">
                </div>

      


              </div>
              <!-- /.col -->
             <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputFile">Category Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="category_image" id="category_image">
                    <label class="custom-file-label" for="category_image">Category Image</label>
                  </div>
                </div>
                @error('category_image')
                <p style="color:red">{{$message}}</p>
                @enderror
              </div> 
            </div>
              <!-- /.col -->
              
            </div>

            <div class="form-group">
              <label for="category_name">Category Description</label>
              <textarea class="form-control" name="description" rows="3" placeholder="Enter Description">{{$data->description}}</textarea>
          </div>

            <!-- /.row -->

   

            <!-- /.row -->
          </div>
         
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        
          </div>
    </div>
</form>


        <!-- /.row -->

        <!-- /.row -->

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection