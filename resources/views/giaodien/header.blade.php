<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
      <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href={{ asset("/admin/css/main.css") }}>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <title>Đăng nhập quản trị</title>

    <style>
        body{
        background:#eee;
        }
        .card {
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }
        .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0,0,0,.125);
        border-radius: 1rem;
        }
        .text-reset {
        --bs-text-opacity: 1;
        color: inherit!important;
        }
        a {
        color: #5465ff;
        text-decoration: none;
        }
  </style>
</head>
<body>

<!-- Navbar-->
<header class="app-header">
  <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
    aria-label="Hide Sidebar"></a>
  <!-- Navbar Right Menu-->
  <ul class="app-nav">
    
    <!-- User Menu-->
    <li>
      <form method="POST" action="{{ route('logout') }}">
            @csrf
      
            <a class="app-nav__item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                  <i class='bx bx-log-out bx-rotate-180'></i> 
            </a>
           
        </form>
    </li>
  </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
      <p class="app-sidebar__user-name"><b>Admin</b></p>
      <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
  </div>
  <hr>
  <ul class="app-menu">
    <li><a class="app-menu__item" href="{{ route('phieunhapxuat.index') }}"><i class='app-menu__icon bx bx-dollar'></i><span
          class="app-menu__label">Dashboard</span></a></li>

    <li><a class="app-menu__item " href="{{ route('phieunhapxuat.index') }}"><i class='app-menu__icon bx bx-id-card'></i> <span
          class="app-menu__label">Quản Lý Phiếu</span></a></li>

    <li><a class="app-menu__item" href="{{ route('phieunhapxuat.index') }}"><i class='app-menu__icon bx bx-user-voice'></i><span
          class="app-menu__label">Quản Lý Nhân Sự</span></a></li>

    <li><a class="app-menu__item" href="{{ route('phieunhapxuat.index') }}"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span 
          class="app-menu__label">Quản Lý Kho</span></a></li>

    <li><a class="app-menu__item" href="{{ route('phieunhapxuat.index') }}"><i class='app-menu__icon bx bx-task'></i><span
          class="app-menu__label">Quản Lý Phân Loại</span></a></li>

    <li><a class="app-menu__item " href="{{ route('phieunhapxuat.index') }}"><i class='app-menu__icon bx bx-id-card'></i> <span
          class="app-menu__label">Quản Lý Nhà Cung Cấp</span></a></li>

    <li><a class="app-menu__item " href="{{ route('phieunhapxuat.index') }}"><i class='app-menu__icon bx bx-purchase-tag-alt'></i> <span
          class="app-menu__label">Quản Lý Trạng Thái</span></a></li>

    <li><a class="app-menu__item" href="{{ route('phieunhapxuat.index') }}"><i class='app-menu__icon bx bx-run'></i><span
          class="app-menu__label">Quản Lý Địa Chỉ</span></a></li>
  </ul>
</aside>


    