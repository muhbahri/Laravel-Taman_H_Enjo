<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <div class="container">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Show Product</h2>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Product Title</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Catagory</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Product Image</th>
                            <th colspan="2">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($product as $product)
                          <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->catagory}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->discount_price}}</td>
                            <td>
                              @if ($product->image)
                              <img src="{{url('product').'/'.$product->image}}">
                              @endif
                            </td>
                            <td>
                              <a class="badge badge-info" href='{{ url('update_product',$product->id) }}'>Edit</a>
                                <form class="d-inline" action="{{ '/products/'.$product->id }}" method="POST">
                                    {{-- $nomor_induk adalah id-nya --}}
                                @csrf
                                @method('DELETE')
                                <button class="badge badge-danger" type="submit" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form> 
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
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