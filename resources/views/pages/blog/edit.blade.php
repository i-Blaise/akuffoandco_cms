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
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
    {{-- Toastify  --}}
  {{-- @toastifyCss --}}
    {{-- TinyMCE head  --}}
  <x-head.tinymce-config/>
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
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Blog Post</h4>
                  <p class="card-description">
                    Edit and Update
                  </p>
                    <form class="forms-sample" action="{{ route('update-blog-post', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image Upload</label>
                        <div class="col-sm-4">
                            <input type="file" name="main_image" class="file-upload-default">
                            <div class="input-group">
                                <input type="text" name="main_image" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div style="height: 200px; border: 1px solid #ddd; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                {{-- <img src="{{ asset('images/auth/login-bg.jpg') }}" alt="Case Study Image" style="max-width: 100%; max-height: 100%; object-fit: contain;"> --}}


                                @if($blog->main_image)
                                    <img src="{{ asset($blog->main_image) }}"
                                        alt="Case Study Image"
                                        width="150" class="img-thumbnail mb-2">
                                @else
                                    <p>No image uploaded</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Case Study Title</label>
                      <textarea class="form-control" id="myeditorinstance-caption" name="title" placeholder="Title">{{ $blog->title }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Excerpt</label>
                      <textarea class="form-control" id="myeditorinstance-excerpt" name="summary" placeholder="Excerpt">{{ $blog->summary }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Body</label>
                      <textarea class="form-control" id="myeditorinstance-body" name="body" placeholder="Body">{{ $blog->body }}</textarea>
                    </div>
                    <div class="form-group">
                    <label for="exampleSelectGender">Category</label>
                    <select class="form-control" name="category" id="exampleSelectGender">
                        <option value="bankruptcy" {{ $blog->category === 'bankruptcy' ? 'selected' : '' }}>
                            Bankruptcy
                        </option>
                        <option value="world" {{ $blog->category === 'world' ? 'selected' : '' }}>
                            World
                        </option>
                        <option value="justice_law" {{ $blog->category === 'justice_law' ? 'selected' : '' }}>
                            Justice Law
                        </option>
                        <option value="land_law" {{ $blog->category === 'land_law' ? 'selected' : '' }}>
                            Land Law
                        </option>
                        <option value="political_independence" {{ $blog->category === 'political_independence' ? 'selected' : '' }}>
                            Political Independence
                        </option>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Author Name</label>
                      <input type="text" class="form-control" name="author_name" placeholder="Author Name" value="{{ $blog->author_name }}">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
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
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
