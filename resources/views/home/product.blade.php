
      <div class="hero_area">
         <!-- end header section -->
         <!-- slider section -->
         <section class="product_section layout_padding">
          <div class="container">
             <div class="heading_container heading_center">
                <h2>
                   Our <span>products</span>
                </h2>
                <br><br>
                <div>
                 <form action="{{url('product_search')}}" method="get" >
                    @csrf
                    <input style="width: 500px;" type="text" name="search" placeholder="Search Something">
                    <input type="submit" value="search">
                 </form>
                </div>
             </div>
             <div class="row">
       
          <div class="grid grid-cols-3 gap-6">
              @foreach ($product as $products)
              <div class="overflow-hidden bg-white rounded shadow group">
                  <div class="relative">
                      <a href="{{url('product_details',$products->id)}}">
                          <img src="product/{{$products->image}}" alt="product 1" class="w-full">
                      </a>
              </div>
              <div class="px-4 pt-4 pb-3">
                  <a href="#">
                      <h4 class="mb-2 text-xl font-medium text-gray-800 uppercase transition hover:text-primary">{{$products->title}}</h4>
                  </a>
                  <div class="flex items-baseline mb-1 space-x-2">
                    @if ($products->discount_price!=null)
                    <p class="text-xl font-semibold text-danger">@currency($products->discount_price)</p>
                    <p class="text-sm text-gray-400 line-through">@currency($products->price)</p>
                    @else
                    <p class="text-xl font-semibold text-gray">@currency($products->price)</p>
                    @endif
                </div>
              </div>
                  <a href="{{url('product_details',$products->id)}}"
                  class="block w-full py-1 text-center text-white transition border rounded-b bg-danger border-danger hover:bg-transparent hover:text-danger">See Detail</a>
              </div>
       
              @endforeach
            </div>
        </div>
    </div>
</section>
    <div class="container" style="padding-bottom: 50px;">
        <span>
            {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
        </span>
    </div>

