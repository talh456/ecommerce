@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="addproduct" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Product</h3>

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
                    <label for="category_name">Product Title</label>
                    <input type="text" class="form-control" name="title" id="category_name" placeholder="Enter Category Name">
                    @error('title')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                  </div>

                <div class="form-group">
                  <label>Select Category</label>
                  <select class="form-control select2" style="width: 100%;" name="category">
                    @foreach($data as $item)
                    <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach
           
                  </select>
                </div>

 

              

 

   

              </div>
              <!-- /.col -->
             <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputFile">Product Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="product_image" id="product_image">
                    <label class="custom-file-label" for="product_image">Product Image</label>
                  </div>

                </div>
                @error('product_image')
                <p style="color:red">{{$message}}</p>
                @enderror
              </div>

              <div class="form-group">
                <label for="category_name">Product Price</label>
                <input type="text" class="form-control" name="price" id="category_name" placeholder="Enter Category Name">
                @error('price')
                <p style="color:red">{{$message}}</p>
                @enderror
              </div>
             </div>

   
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="form-group">
              <label for="category_name">Product Description</label>
              <textarea class="form-control" name="description" rows="3" placeholder="Enter Description"></textarea>
          </div>
   

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