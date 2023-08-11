

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTable Kamar</h6>
      </div>
      <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
          <tbody><tr>
              <td width="40%">Customer Name</td><td>:</td>
              <td>{{$order->name}}</td>
          </tr>
          <tr>
              <td>Customer Email</td><td>:</td>
              <td>{{$order->email}}</td>
          </tr>
          <tr>
              <td>Customer Phone</td><td>:</td>
              <td>{{$order->phone}}</td>
          </tr>
          <tr>
              <td>Customer Address</td><td>:</td>
              <td>{{$order->address}}</td>
          </tr>
          <tr>
              <td>Product Name</td><td>:</td>
              <td>{{$order->product_title}}</td>
          </tr>
          <tr>
              <td>Product Price</td><td>:</td>
              <td>{{$order->price}}</td>
          </tr>
          <tr>
              <td>Product Quantity</td><td>:</td>
              <td>{{$order->quantity}}</td>
          </tr>
          <tr>
              <td>Product ID</td><td>:</td>
              <td>{{$order->product_id}}</td>
          </tr>
          <tr>
              <td>Foto</td><td>:</td>
                    <img style="max-width: 100px; max-height:40px" src="product/{{$order->image}}">
              </td>
          </tr>
      </tbody></table>
      </div>
      </div>
      </div>
      </div>
</body>
</html>