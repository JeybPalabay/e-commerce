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
        box-shadow: #191A1F;
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

    .input_color,
    select,
    input[type="text"],
    input[type="number"],
    input[type="file"] {
        width: calc(100% - 220px);
        background-color: #2c2c2c;
        color: #ffffff;
        border: 1px solid #444;
        padding: 8px 10px;
        border-radius: 6px;
        outline: none;
        transition: border 0.3s;
    }

    .input_color:focus,
    select:focus,
    input[type="file"]:focus {
        border: 1px solid #00bcd4;
    }

    select {
        appearance: none;
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
    justify-content: flex-end; /* Aligns the button to the right */
    margin-top: 30px; /* Optional: adds some space above the button */
    margin-right: 20px;
    }
    select option:disabled {
    color: gray;  /* Light gray */
    font-style: italic;
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
            <h2 class="h2_font">Add Product</h2>

            <form action="{{url('add_product')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="div_design">
                <label for="name">Product Name</label>
                <input type="text" class="input_color" name="name" id="name" placeholder="Name of the Product ">
            </div>
            <div class="div_design">
                <label for="price">Product Price</label>
                <input type="number" class="input_color" name="price" id="price" placeholder="Price of the Product ">
            </div>
            <div class="div_design"> 
                <label for="discount">Product Discount</label>
                <input type="number" class="input_color" name="discount" id="discount" placeholder="Discount of the Product ">
            </div>
            <div class="div_design">
                <label for="description">Product Description</label>
                <input type="text" class="input_color" name="description" id="description" placeholder="Descirption of Product ">
            </div>
            <div class="div_design">
                <label for="Category">Product Category</label>
                <select name="category" id="category" class="input_color">
                    <option value="" disabled selected>Add a Category Here</option>
                    @foreach($category as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>

            </div>

            <div class="div_design">
                <label for="image">Product Image</label>
                <input type="file" name="image" id="image">
            </div>

            <div class="btn-container">
                <input type="submit" class="btn btn-primary" value="Add Product">
            </div>

            </form>
            </div>
 
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html> 