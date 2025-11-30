<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="shortcut icon" type="image/png" href="./BS/assets/images/logos/logotugas3.png" />
  <link rel="stylesheet" href="./BS/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="container-fluid py-5">
      <div
        class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
          <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
              <div class="card mb-0">
                <div class="card-body">
                  <form method="POST" action="{{ route('loginProses') }}">
                    @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email..">
                      @error('email')
                      <small class="text-danger">
                        {{ $message }}
                      </small>
                      @enderror
                    </div>
                    <div class="mb-4">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password..">
                      @error('password')
                      <small class="text-danger">
                        {{ $message }}
                      </small>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="./BS/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./BS/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script src="./alert/dist/sweetalert2.all.min.js"></script>
  
  @session('success')
  <script>
    Swal.fire({
    title: "Sukses",
    text: "{{ session('success') }}",
    icon: "success"
  });
  </script>
  @endsession

  @session('error')
  <script>
    Swal.fire({
    title: "Gagal",
    text: "{{ session('error') }}",
    icon: "error"
  });
  </script>
  @endsession

</body>

</html>