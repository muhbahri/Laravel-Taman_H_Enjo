<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <style type="text/css">
    #div_center{
      justify-content: center;
    }

    input{
      text-align: center;
      margin-right: 4px;
      margin-left: 4px;
    }
    
    .container {
    display: flex;
    justify-content: center;
    flex-direction: row;
    padding-top: 100px;
    text-align: center;
}

    .h2_f{
      font-size: 40px;
      padding-bottom: 20px;
    }

    .center{
      margin: auto;
      margin-bottom: 40px;
      width: 85%;
      text-align: center;
      border: 3px solid white;
    }
    </style>
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

            {{-- @if (Session()->has('message'))

            <div class="alert alert-success" role="alert">
              <strong>Success!</strong>
            {{ Session()->get('message')}}
        </div>
    @endif --}}

            {{-- <div class="div_center">
              <h2 class="h2_f">Add Catagory</h2>
              <form action="{{url('/add_catagory')}}" method="POST">
                @csrf
                <input class="color" type="text" name="catagory" placeholder="write catagory name">
                <input type="submit" class="btn btn-primary" name="submit"
                value="Add Catagory">
              </form>
            </div> --}}

          <div class="container">
            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="h2_f">Add Catagory</h2>
                  <form class="forms-sample" action="{{url('/add_catagory')}}" method="POST">
                    @csrf
                    <div class="form-group d-flex" id="div_center">
                      <input type="text" class="form-control" name="catagory" placeholder="write catagory name">
                      <button type="submit" class="btn btn-primary me-2" name="submit">Submit</button>
                    </div>
                  </form>
                </div>
                <table class="center">
                  <tr>
                    <td>Catagory Name</td>
                    <td>Action</td>
                  </tr>
                  @foreach ($data as $data)
                  <tr>
                    <td>{{$data->catagory_name}}</td>
                    <td>
                      <a onclick="confirmation(event)" class="btn btn-danger" href="{{url('delete_catagory',$data->id)}}">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </table>
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