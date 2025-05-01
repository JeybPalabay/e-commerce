<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gadget Admin</title>
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style type="text/css">
      .main-panel, .content-wrapper {
        background-color: #1A1C23 !important;
      }
      body {
        background-color: #191A1F;
        color: #f0f0f0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      .div_center {
        text-align: center;
        padding-top: 40px;
        background-color: #191A1F;
        padding: 30px;
        border-radius: 12px;
        max-width: 800px;
        margin: auto;
      }
      .h2_font {
        font-size: 40px;
        padding-bottom: 20px;
        color: #ffffff;
      }
      .div_design {
        margin-bottom: 20px;
        text-align: left;
      }
      label {
        display: inline-block;
        width: 200px;
        color: #f0f0f0;
        font-weight: bold;
      }
      .input_color, select, input[type="text"], input[type="number"], input[type="file"] {
        width: calc(100% - 220px);
        background-color: #2c2c2c;
        color: #ffffff;
        border: 1px solid #444;
        padding: 8px 10px;
        border-radius: 6px;
        outline: none;
        transition: border 0.3s;
      }
      .input_color:focus, select:focus, input[type="file"]:focus {
        border: 1px solid #00bcd4;
      }
      input[type="file"] {
        padding: 5px;
      }
      .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px 20px;
        font-weight: bold;
        border-radius: 6px;
        transition: background-color 0.3s ease;
      }
      .btn-primary:hover {
        background-color: #0056b3;
      }
      .alert {
        background-color: #1e7e34;
        border: none;
        color: #ffffff;
      }
      .btn-close {
        filter: invert(1);
      }
      .btn-container {
        display: flex;
        justify-content: flex-end;
        margin-top: 30px;
        margin-right: 20px;
      }
      select option:disabled {
        color: gray;
        font-style: italic;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')
      <div class="container-fluid page-body-wrapper">
        @include('admin.header')
        <div class="main-panel">
          <div class="content-wrapper">
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session()->get('message') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="div_center">
              <h2 class="h2_font">Update Product</h2>
              <form action="{{ url('update_product_confirm', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_design">
                  <label for="name">Product Name</label>
                  <input type="text" class="input_color" name="name" id="name" value="{{ $product->product_name }}" required>
                </div>
                <div class="div_design">
                  <label for="price">Product Price</label>
                  <input type="number" class="input_color" name="price" id="price" value="{{ $product->price }}" required>
                </div>
                <div class="div_design">
                  <label for="discount">Product Discount</label>
                  <input type="number" class="input_color" name="discount" id="discount" value="{{ $product->discounted_price }}" required>
                </div>
                <div class="div_design">
                  <label for="description">Product Description</label>
                  <input type="text" class="input_color" name="description" id="description" value="{{ $product->description }}" required>
                </div>
                <div class="div_design">
                  <label for="category">Product Category</label>
                  <select name="category" id="category" class="input_color" required>
                    @foreach($category as $cat)
                      <option value="{{ $cat->id }}" {{ $cat->id == $product->category ? 'selected' : '' }}>
                        {{ $cat->category_name }}
                      </option>
                    @endforeach
                  </select>

                </div>
                <div class="div_design">
                  <label for="image">Current Product Image</label>
                  <img height="100" width="100" src="/product/{{ $product->image }}" alt="Product Image">
                </div>
                <div class="div_design">
                  <label for="image">Change Product Image</label>
                  <input type="file" name="image" id="image">
                </div>
                <div class="btn-container">
                  <input type="submit" class="btn btn-primary" value="Update Product">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('admin.script')
  </body>
</html>
