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
              <li class="breadcrumb-item active">Category Images</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        
        <form action ="{{url('add_image_category', ['id' => $data->id])}}" method = "POST" enctype="multipart/form-data">
        
            
          @csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Category Images</h3>

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
                    <label for="category_name">Category Id:</label> &nbsp; 
                    {{$data->id}}
                    
                    <input type="hidden" name="id" class="form-control" value="{{$data->id}}">
                </div>


                <div class="form-group">
                    <label for="category_name">Category Name:</label> &nbsp; 
                    {{$data->title}}
                    
                    <input type="hidden" name="id" class="form-control" value="{{$data->id}}">
                </div>



                <div class="form-group">
                    <label for="exampleInputFile">Category Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="file[]" multiple>
                      </div>
                    </div>
                  </div>

              </div>
              <div class="col-md-6">
                <div class="form-group">
                    
                    <img style="width:120px; margin-top:5px; margin-left:100px;" src="{{ asset('uploads/category_image/'.$data->image ) }}" alt="">
                </div>
              </div>
              <!-- /.col -->
             
              <!-- /.col -->
            </div>
            <!-- /.row -->

   

            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Images</button>
        
          </div>
    </div>
</form>

<div class="card">

    <!-- /.card-header -->
    <div class="card-body">
      <table id="categories" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Product ID</th>
          <th>Images</th>
        </tr>
        </thead>
        <tbody>
          
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
 
        </tbody>
      
      </table>
    </div>
    <!-- /.card-body -->
  </div>


        <!-- /.row -->

        <!-- /.row -->

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection