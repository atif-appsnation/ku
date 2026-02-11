<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QRCode Project</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="{{url('/')}}/style.css">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img class="img-fluid" src="{{url('/')}}/ku-logo2.png" alt="KU Logo" width="50" height="50" class="d-inline-block align-top"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link active" aria-current="page" href="{{url('/home')}}">Upload File</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{url('/files')}}">Records</a>

        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">
      <a href="{{ url('/logout') }}" class="btn btn-outline-success my-2 my-sm-0">Logout</a>
    </form>
    </div>
  </nav>

  <div class="thin-bar">
    EXAMINATION DEPARTMENT
  </div>
  <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img class="img-fluid" src="{{url('/')}}/ku-logo2.png" alt="KU Logo" style="height:70px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/upload')}}">Upload File</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/files')}}">Records</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav> -->
  @if(session()->has('message'))
  <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  @endif
 <div class="text-center mt-3"><h1 class="display-4">DOCUMENT VERIFICATION PORTAL</h1></div>
