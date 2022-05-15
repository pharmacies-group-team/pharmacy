<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toyko Pharmacy</title>
    <!-- <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css"> -->
    <link rel="stylesheet" href="assests/css/style.css">
    <!-- <script src="assests/js/jquery-3.6.0.min_2.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <!-- menu section  -->
 <nav class="navbar navbar-expand-lg navbar-light container-fluid" >
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html">Tokyo<span style="color: yellow;">Pharmac</span> <small >ies </small> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/jobs.html">Jobs</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="pages/services.html" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Services
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="pages/resume.html">Make Resume / CV</a></li>
              <li><a class="dropdown-item" href="#">Evaluate Resume </a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Help to know your needs</a></li>
              <li><a class="dropdown-item" href="#">Help You to know Your Goal</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">The job you wish</a>
          </li>
        </ul>
        <form class="d-flex">
          <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
          <a class="btn btn-outline-success" style="color:yellowgreen;" href="pages/dashboard/protfile.html">Sing In</a>  /
          <a class="btn btn-outline-success" style="color:yellowgreen;" href="pages/regest.html">Creat Email</a>
        </form>
        <!-- <li class="nav-item">
          <a class="nav-link" href="pages/jobs.html" style="color: yellow;">Create Email</a>
        </li> -->
      </div>
    </div>
  </nav>
 <!--End menu section  -->


 <!-- End the header  -->
 @yield('content')


 <footer class="col-12 fixed-bottom">



</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script> -->
</body>
</html>


