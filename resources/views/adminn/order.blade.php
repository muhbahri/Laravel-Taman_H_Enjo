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
                    <h2 class="card-title">All Order</h2>
                  <div style="margin: auto; padding-bottom: 30px;">
                    <form action="{{url('search')}}" method="get">
                      @csrf
                      <input type="text" name="search" placeholder="Search Something">
                      <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>
                  </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Delivery Status</th>
                            <th>Image</th>
                            <th>Delivered</th>
                            <th>Print PDF</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($order as $order)
                          <tr>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td>
                              <img src="/product/{{$order->image}}">
                            </td>
                            <td>
                            @if($order->delivery_status=='processing')
                              <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Yakin?')" class="btn btn-primary">Delivered</a>
                            @else
                              <p>Delivered</p>
                            @endif
                            </td>
                            <td>
                              <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print Pdf</a>
                            </td>
                          </tr>
                          @empty
                              <tr>
                                <td colspan="16">
                                  No Data Found
                                </td>
                              </tr>
                          
                          @endforelse
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