<!DOCTYPE html>
<html>
   <head>
    <base href="/public">
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
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <link href="home/css/main.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
    
    @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
  
         <div class="container flex items-center gap-3 py-4">
            <a href="../index.html" class="text-base text-primary">
            </a>
            <span class="text-sm text-gray-400">
            </span>
        </div>
        <!-- ./breadcrumb -->
      
        <!-- product-detail -->
        <div class="container grid grid-cols-2 gap-6">
            <div>
                <img style="border-radius:30px" src="{{ url('/product/'.$product->image) }}" alt="product" class="w-full">
                <div class="grid grid-cols-5 gap-4 mt-4">
                    
                </div>
            </div>
            <div>
              <br>
                <h2 class="mb-2 text-3xl font-medium uppercase">{{$product->title}}</h2>
                <div class="space-y-2">
                  <p class="space-x-2">
                    <span class="font-semibold text-gray-800">Kategori: </span>
                    <span class="text-gray-600">{{$product->catagory}}</span>
                  </p>
                  <p class="space-x-2 font-semibold text-gray-800">
                      <span>Stok Tersedia: </span>
                      <span class="text-gray-600">{{$product->quantity}}</span>
                  </p>
                  <p class="space-x-2 font-semibold text-gray-800">
                      <span>Harga Produk: </span>
                      <span class="text-gray-600">
                        @if ($product->discount_price!=null)
                        <p class="text-xl font-semibold text-danger">@currency($product->discount_price)</p>
                        <p class="text-sm text-gray-400 line-through">@currency($product->price)</p>
                        @else
                        <p class="text-xl font-semibold text-gray">@currency($product->price)</p>
                        @endif 
                      </span>
                  </p>
                </div>
                <div >
      
                
      
                <form action="{{url('add_cart',$product->id)}}" method="post">
                  @csrf
                <div class="mt-4">
                    <h3 class="mb-1 text-sm text-gray-800 uppercase" for="quantity">Jumlah Beli:</h3>
                  <input type="number" name="jubel" value="1" min="1" class="p-2 border border-gray-400" style="width:100px; height: 35px; border:0px; text-align:center;">
                </div>
                @if (Session()->has('message'))

            <div class="alert alert-danger" role="alert" style="padding; width: 260px">
              <strong>Stok Habis!</strong>
            {{ Session()->get('message')}}
        </div>
    @endif
                <div class="flex gap-3 pb-5 mt-3 border-b border-gray-200">
                  <button type="submit" class="flex items-center gap-2 px-8 py-2 font-medium text-white uppercase transition border rounded bg-danger border-danger hover:bg-transparent hover:text-danger">
                      <i class="fa fa-shopping-cart"></i></i>Masukan Keranjang
                  </button>
                </div>
              </form>
            </div>
        </div>
        <!-- ./product-detail -->
      
        <!-- description -->
        <div class="container pb-16">
            <h3 class="pb-3 font-medium text-gray-800 border-b border-gray-200 font-roboto">Product details</h3>
            <div class="w-3/5 pt-6">
                <div class="text-gray-600">
                    <p>{{$product->description}}</p>
                    
                </div>
      
            </div>
        </div>
      </div>

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
        <p class="mx-auto">© 2023 Copyright</a><br>
        
           Distributed By <a href="/">Taman H. Enjo</a>
        
        </p>
     </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      <script src="home/js/oi.js"></script>
   </body>
</html>