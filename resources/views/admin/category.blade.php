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
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

    <!-- Custom Styles -->
    <style>
      body,
      .main-panel,
      .content-wrapper {
        background-color: #1A1C23 !important;
      }

      .container-scroller {
        background-color: #007bff;
      }

      .card {
        background-color: #191A1F;
        color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
      }

      h2.text-primary {
        font-size: 36px;
        font-weight: bold;
        color: #007bff !important;
      }

      h4.text-secondary {
        color: #aaa !important;
      }

      .table thead {
        background-color: #2e3240;
      }

      .table thead th {
        color: #ffffff;
        font-weight: 600;
        border-bottom: none;
        padding: 1rem;
        font-size: 1.1rem;
      }

      .table tbody td {
        color: #f0f0f0;
        padding: 0.9rem;
        vertical-align: middle;
        border-top: 1px solid #2a2d35;
      }


      .table {
        border-collapse: separate;
        border-spacing: 0 8px;
      }

      .table tbody tr {
        background-color: #1f222b;
        border-radius: 10px;
      }

      .table tbody tr td:first-child {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
      }

      .table tbody tr td:last-child {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
      }

      .btn-danger {
        background-color: #dc3545;
        border: none;
        font-weight: 500;
        text-transform: uppercase;
      }

      .btn-danger:hover {
        background-color: #c82333;
      }

      .btn-danger:focus {
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
      }

      .btn-danger-sm {
        padding: 5px 10px;
        font-size: 0.875rem;
      }

      /* Modal Styles */
      .modal-header {
        background-color: #6c757d;
        color: white;
      }

      .modal-body {
        color: #f8f9fa; 
        background-color: #191A1F; /* Lighter background color for the body */
      }

      .modal-footer {
        background-color: #191A1F; /* Same background color for consistency */
      }

      .modal .btn-danger {
        background-color: #dc3545; /* Red for the delete button */
      }

      .modal .btn-secondary {
        background-color: #6c757d; /* Grey for the cancel button */
        color: white; /* White text on cancel button */
      }

      .modal .btn-close {
        color: #fff; /* White color for close button */
      }

      input.form-control {
        background-color: #ffffff; /* Default background color */
        color: #191A1F; /* Default text color */
        border: 1px solid #ccc; /* Optional: Set border color */
        transition: background-color 0.3s, color 0.3s; /* Smooth transition */
      } 

      input.form-control:focus {
        background-color: #191A1F; /* Change background to white on focus */
        color: #ffffff; /* Change text color to black */
        border: 1px solid #007bff; /* Optional: Highlight border color */
      }

      input.form-control:hover {
        background-color: #191A1F; /* Change background to white on hover */
        color: #ffffff; /* Change text color to black on hover */
        border: 1px solid #007bff; /* Optional: Highlight border color */
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

            <div class="card shadow-sm">
              <div class="card-body">
                <h1 class="text-center mb-4 text-white font-weight-bold" style="font-size: 3rem;">Add Category</h1>
                <form action="{{ url('/add_category') }}" method="POST" class="row justify-content-center mb-5">
                  @csrf
                  <div class="col-md-6 d-flex gap-2">
                    <input type="text" name="category" class="form-control" placeholder="Input Product Category" required>
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
                </form>

                <h4 class="text-center mb-4 text-white font-weight-bold" style="font-size: 1.5rem;">Existing Categories</h4>

                <div class="table-responsive">
                  <table class="table table-striped text-center">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $item)
                        <tr>
                          <td class="align-middle text-white">{{ $item->category_name }}</td>
                          <td class="align-middle">
                            <!-- Delete Button with Modal Trigger -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                              Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    Are you sure you want to delete this category?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <a href="{{ url('delete_category', $item->id) }}" class="btn btn-danger">Confirm Delete</a>
                                  </div>
                                </div>
                              </div>
                            </div>
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

    @include('admin.script')
    <!-- Bootstrap JS and Modal Dependencies -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="admin/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
