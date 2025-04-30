<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gadget Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style type="text/css">
         .main-panel,
        .content-wrapper {
        background-color: #1A1C23 !important;

      }
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            color: #f0f8ff;
            font-weight: 600;
        }
        .input_color {
            color: black;
        }
        .center {
            margin: auto;
            width: 80%;
            text-align: center;
            margin-top: 30px;
            border: 2px solid #101114; /* Existing border */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19); /* Shadow effect */
        }

        label {
            display: inline-block;
            width: 200px;
            font-weight: 600;
            color: #f0f8ff;
        }
        .div_design {
            padding-bottom: 15px;
        }
        .img_size {
            width: 90px;
            height: 90px;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .img_size:hover {
            transform: scale(1.1);
        }
        .th_color {
            background: #f0f8ff;
            color: #333;
        }
        .th_deg {
            padding: 20px;
            text-align: center;
            font-weight: 500;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        td, th {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background 0.3s ease, transform 0.3s ease;
        }
        .btn-danger {
            background-color: #e74c3c;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }
        .btn-success {
            background-color: #2ecc71;
            color: #fff;
        }
        .btn-success:hover {
            background-color: #27ae60;
            transform: scale(1.05);
        }
        .alert {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            border-radius: 10px;
        }
        .alert button {
            color: white;
        }
        .alert-success {
            background-color: #28a745;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
       @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="div_center">
                <h2 class="h2_font">Manage Product</h2>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Image</th>
                        <th class="th_deg">ID</th>
                        <th class="th_deg">Product Name</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Discounted Price</th>
                        <th class="th_deg" colspan=2>Action</th>
                    </tr>
                    @foreach ($product as $product)
                    <tr>
                        <td><img class="img_size" src="product/{{$product->image}}" alt="{{$product->product_name}}"></td>
                        <td>{{$product->id}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discounted_price}}</td>
                        <td>
                            <a href="{{url('delete_product', $product->id)}}" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger">Delete</a>
                        </td>
                        <td>
                            <a href="{{url('update_product', $product->id)}}" class="btn btn-success">Update</a>
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
  </body>
</html>
