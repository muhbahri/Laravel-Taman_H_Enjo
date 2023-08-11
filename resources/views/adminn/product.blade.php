<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    
    @include('sweetalert::alert')
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form elements</h4>
                  <p class="card-description"> Add Product </p>
                  <form class="forms-sample" action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Product Title</label>
                      <input type="text" class="form-control" name="title" id="exampleInputName1" placeholder="Name" required="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Product Description</label>
                      <input type="text" class="form-control" name="description" id="exampleInputEmail3" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Product price</label>
                      <input type="number" class="form-control" name="price" id="exampleInputtext4" placeholder="Password">
                    </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Product Quantity</label>
                    <input type="number" class="form-control" name="quantity" min="0" id="exampleInputName1" placeholder="Name">
                  </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Discount Price</label>
                      <input type="text" class="form-control" name="dis_price" id="exampleInputName1" placeholder="Name">
                  </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Product Catagory</label>
                      <select class="form-control" name="catagory" id="exampleSelectGender">
                        <option value="" selected="">Chose</option>
                        @foreach ($catagory as $catagory)
                        <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="image" required="">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            


          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>