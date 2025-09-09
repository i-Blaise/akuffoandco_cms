<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>KA - CMS</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('partials.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <!-- partial:../../partials/_sidebar.html -->
      @include('partials.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">list of Case Studies</h4>
                  <p class="card-description">
                    All Case Studies
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Title
                          </th>
                          <th>
                            Date Created
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($caseStudies as $index => $caseStudy)
                        <tr>
                          <td class="py-1">
                            {{ $index + 1 }}
                          </td>
                          <td>
                            {{ $caseStudy->title }}
                          </td>
                          <td>
                            {{ $caseStudy->created_at->format('F j, Y') }}
                          </td>
                          <td>
                            <label class="badge {{ $caseStudy->published ? 'badge-success' : 'badge-danger' }}">
                                {{ $caseStudy->published ? 'Published' : 'Not Published' }}
                            </label>
                          </td>
                          <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">Dropdown</button>
                                <div class="dropdown-menu">
                                    <form action="{{ route('case-studies.toggle', $caseStudy->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="dropdown-item">
                                            {{ $caseStudy->published ? 'Unpublish' : 'Publish' }}
                                        </button>
                                    </form>
                                    <a class="dropdown-item" href="{{ url('edit-case-study/' . $caseStudy->id) }}">Edit</a>
                                    <form action="{{ route('case-studies.destroy', $caseStudy->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"
                                            onclick="return confirm('Are you sure you want to delete this case study?');">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                          </div>
                          </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No case studies found.</td>
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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('partials.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
