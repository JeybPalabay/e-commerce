<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gadget Admin</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" />

    <style>
      body, .main-panel, .content-wrapper {
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

      .center {
        margin: auto;
        width: 80%;
        text-align: center;
        margin-top: 30px;
        border: 2px solid #101114;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      }

      label {
        display: inline-block;
        width: 200px;
        font-weight: 600;
        color: #f0f8ff;
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
        background-color: #dc3545;
        color: #fff;
        border: none;
      }

      .btn-danger:hover {
        background-color: #c82333;
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

      /* Modal Styles */
      .modal-header {
        background-color: #6c757d;
        color: white;
      }

      .modal-body, .modal-footer {
        background-color: #191A1F;
        color: #f8f9fa;
      }

      .modal .btn-danger {
        background-color: #dc3545;
      }

      .modal .btn-secondary {
        background-color: #6c757d;
        color: white;
      }

      .alert-danger {
        background-color: #dc3545 !important;
      }

      /* Align the product image to the right side */
      td:last-child {
        text-align: right;
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
              <div id="alertMessage" class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
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
                  <th class="th_deg" colspan="2">Action</th>
                </tr>
                @foreach ($product as $item)
                <tr>
                  <td><img class="img_size" src="{{ asset('product/' . $item->image) }}" alt="{{ $item->product_name }}"></td>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->product_name }}</td>
                  <td>{{ $item->description }}</td>
                  <td>{{ $item->price }}</td>
                  <td>{{ $item->discounted_price }}</td>
                  <td>
                     <button class="btn btn-danger" onclick="confirmDelete('{{ $item->id }}')">Delete</button>
                  </td>
                  <td>
                    <a href="{{ url('update_product', $item->id) }}" class="btn btn-success">Update</a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>

            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to delete this product?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a id="confirmDeleteBtn" href="#" class="btn btn-danger">Delete</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    @include('admin.script')

    <!-- JavaScript to handle delete modal and auto-hide alert -->
    <script>
      function confirmDelete(productId) {
        const deleteUrl = "{{ url('delete_product') }}/" + productId;
        document.getElementById('confirmDeleteBtn').setAttribute('href', deleteUrl);
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
      }

      // Automatically hide the alert after 2 seconds
      setTimeout(function() {
        const alertMessage = document.getElementById('alertMessage');
        if (alertMessage) {
          alertMessage.classList.remove('show');
          alertMessage.classList.add('fade');
        }
      }, 2000); // 2000ms = 2 seconds
    </script>
  </body>
</html>
