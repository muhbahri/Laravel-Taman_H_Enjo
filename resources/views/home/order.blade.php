<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/111.jpg" type="">
      <title>HEnjo - Taman Haji Enjo</title>
      <!-- bootstrap core css -->
      
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style class="text/css">
      .container{
        padding-bottom: 60px;
      }
      </style>
   </head>
   <body>
    @include('sweetalert::alert')
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         
         <!-- end slider section -->
         {{-- <div class="rounded-lg p-6 drop-shadow-2xl pt-8" style="background-color: rgba(221, 221, 221, 0.314)">
          <div class="bg-white rounded-lg p-6">
            <div class="flex items-center justify-between">
              <h3 class="text-lg font-medium ml-4">Header Card</h3>
            </div>
            <div class="mt-4">
              
            </div>
            </div>
            </div>
            </div>
          </div> --}}

<br>

      <div class="container">
        <div style="border-radius:30px" class="card shadow-lg p-3 rounded-pill-4">
          <div class="container-fluid">
            <div class="py-3">
              <h3 class="m-0 font-weight-bold pl-2" style="padding-bottom: 6px;">Barang <span class="text-danger">Pesanan</span></h3>
            </div>
            <div style="border-radius:20px">
                  <table class="table" style="text-align: center;">
                    <thead>
                      <tr>
                        <th>Nama Produk</th>
                        <th>Jumlah Beli</th>
                        <th>Harga</th>
                        <th>Status Pengiriman</th>
                        <th>Gambar</th>
                        <th>Batal Order</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($order as $order)
                      <tr>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->jubel}}</td>
                        <td>@currency($order->price)</td>
                        <td>{{$order->delivery_status}}</td>
                        <td><img style="max-width: 50px; max-height:50px" class="img" src="/product/{{$order->image}}" alt=""></td>
                        <td>
                          @if ($order->delivery_status=='processing')
                          <a onclick="confirmation(event)" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel Order</a>
                          @else
                          <p style="color: blue">Not Allowed</p>
                          @endif
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
        </div>
      </div>
      </div>
      </div>


          
        {{-- </table>
        <div>
          <h1>Total Price : {{$totalprice}}</h1>
        </div>
        <div>
          <h1>Proceed to Order</h1>
          <a href="{{url('cash_order')}}" class="btn btn-danger">Checkout</a>
        </div>
      </div> --}}

      </section>
      </div>
      
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer') 
      <!-- footer end -->
      <div class="cpy_">
        <p class="mx-auto">© 2023 Copyright</a><br>
        
           Distributed By <a href="/">Taman H. Enjo</a>
        
        </p>
     </div>
     <script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Anda yakin ingin menghapus produk ini?",
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {


                 
                window.location.href = urlToRedirect;
               
            }  


        });

        
    }
</script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>