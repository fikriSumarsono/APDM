<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Penelitian Dosen dan Mahasiswa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset ('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset ('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
  
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="{{asset('dist/img/Logo STMIK.png')}}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <!-- dropzonejs -->
<link rel="stylesheet" href="{{asset('plugins/dropzone/min/dropzone.min.css')}}">
<script type="text/javascript" src="{{asset('dist/js/jquery.js')}}"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>        </a>      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-6">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
   
      <img src="{{asset('dist/img/Logo STMIK.png')}}" alt="" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        
      <span class="brand-text font-weight-light">APDM</span>    </a>
        <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        @foreach($lektors as $data)
        @if($data->foto)
        <img src="{{asset('img/'.$data->foto)}}" class="img-circle elevation-2" alt="User Image">
        @else
          <img src="{{url('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          @endif
          @endforeach      
          </div>
        <div class="info">
       <a class="d-block" ><span> {{auth()->user()->name}}</span></a>       </div>
              
          
      </div>
      <div class="user-panel ">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              
              <p>
                Dosen
                <i class="right fas fa-angle-left"></i>              </p>
            </a>
            @if (auth()->user()->level=="Dosen dan LPPM")
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('LPPM')}}" class="nav-link">
                  
                  <p>LPPM</p>
                </a>              </li>
                </ul>
              @endif
              @if (auth()->user()->level=="Dosen dan Ketua Prodi")
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('KetuaProdi')}}" class="nav-link">
                  
                  <p>Ketua Prodi</p>
                </a>              </li>
                </ul>
                @endif
                @if (auth()->user()->level=="Dosen dan Penjamin Mutu")
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('PenjaminMutu')}}" class="nav-link">
                  
                  <p>Penjamin Mutu</p>
                </a>              </li>
                </ul>
                @endif
        
      </div>
<!-- /.card-header -->
<section>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
        ith font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('Dosen')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class=""></i>              </p>
            </a>          </li>
          <li class="nav-header">PENGAJUAN</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Penelitian
                <i class="right fas fa-angle-left"></i>              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/researchs/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengusulan Baru</p>
                </a>              </li>

              <li class="nav-item">
                <a href="{{url('/UsulanLanjutan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usulan Lanjutan</p>
                </a>              </li>

              <li class="nav-item">
                <a href="{{url('/PerbaikanUsulan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perbaikan Usulan</p>
                </a>              </li>

              <li class="nav-item">
                <a href="{{url('/LaporanKemajuan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Kemajuan</p>
                </a>              </li>

              <li class="nav-item">
                <a href="{{url('/LaporanAkhir')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Akhir</p>
                </a>              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book-reader"></i>
              <p>
                Pengabdian
                <i class="right fas fa-angle-left"></i>              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/pengabdians/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengusulan Baru</p>
                </a>              </li>

              <li class="nav-item">
                <a href="{{url('/LanjutanPengabdian')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usulan Lanjutan</p>
                </a>              </li>

              <li class="nav-item">
                <a href="{{url('/PerbaikanPengabdian')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perbaikan Usulan</p>
                </a>              </li>

              <li class="nav-item">
                <a href="{{url('/KemajuanPengabdian')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Kemajuan</p>
                </a>              </li>

              <li class="nav-item">
                <a href="{{url('/AkhirPengabdian')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Akhir</p>
                </a>              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-lock"></i>
              <p>
                Riwayat Usulan
                <i class="right fas fa-angle-left"></i>              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/riwayatPenelitian')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penelitian</p>
                </a>              </li>
              </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/riwayatPengabdian')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengabdian</p>
                </a>              </li>
              </ul>
          <li class="nav-header">TEMPLATE</li>
          <li class="nav-item has-treeview">
            <a href="{{url('/TemplatePenelitian')}}" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>Penelitian</p>
            </a>
            </li>
            <li class="nav-item has-treeview">
            <a href="{{url('/TemplatePengabdian')}}" class="nav-link">
              <i class="nav-icon fa fa-book-reader"></i>
              <p>Pengabdian</p>
            </a>
            </li>
            <li class="nav-header"></li>
            <li class="nav-item has-treeview">
            <a href="{{route('ganti_password')}}" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Ganti Password
                <i class=""></i>              </p>
            </a>          </li>
            <li class="nav-header"></li>
            <li class="nav-item has-treeview">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Logout
                <i class=""></i>              </p>
            </a>          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"></div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              @yield('tab')
              
              @yield('container')
              </section>

    <!-- Main content -->
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="">APDM</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('plugins/moment/moment.min.js')}}"></script>
<script src="{{url('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
<!-- BS-Stepper -->
<script src="{{url('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{url('plugins/dropzone/min/dropzone.min.js')}}"></script>
<!-- InputMask -->
<script src="{{url('plugins/moment/moment.min.js')}}"></script>
<script src="{{url('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{url('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{url('plugins/toastr/toastr.min.js')}}"></script>

@include('sweetalert::alert')
<script>
  $(function () {

     //Initialize Select2 Elements
     $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#temp1");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "document", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previ1", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  })
  // DropzoneJS Demo Code End
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#addform').on('submit',function(e){
    e.preventDefault();

			$.ajax({
			type: "POST",
			url: "/members",
			data : $('#addform').serialize(),
      succes : function(response) {
          console.log(response)
          $('#staticBackdrop').modal('hide')
          alert("data saved");
      }
		});
	});
});
</script>

</body>
</html>
