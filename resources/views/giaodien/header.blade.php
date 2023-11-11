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


      {{-- <link href={{ asset("/chart/css/bootstrap.min.css") }} rel="stylesheet">
	<link href={{ asset("/chart/css/font-awesome.min.css") }} rel="stylesheet">
	<link href={{ asset("/chart/css/datepicker3.css") }} rel="stylesheet">
	<link href={{ asset("/chart/css/styles.css") }} rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> --}}


      <title>Quan Ly Kho Hang</title>

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


      <script>
            window.onload = function () {
            
                  var bieudocot = new CanvasJS.Chart("bieudocot", {
                        animationEnabled: true,
                        exportEnabled: true,
                        theme: "light1", // "light1", "light2", "dark1", "dark2"
                        title:{
                              text: "Simple Column Chart with Index Labels"
                        },
                        axisY: {
                              includeZero: true
                        },
                        data: [{
                              type: "column", //change type to bar, line, area, pie, etc
                              //indexLabel: "{y}", //Shows y value on all Data Points
                              indexLabelFontColor: "#5A5757",
                              indexLabelFontSize: 16,
                              indexLabelPlacement: "outside",
                              dataPoints: [
                                    { x: 10, y: 15 },
                                    { x: 20, y: 55 },
                                    { x: 30, y: 50 },
                                    { x: 40, y: 65 },
                                    { x: 50, y: 92, indexLabel: "\u2605 Highest" },
                                    { x: 60, y: 68 },
                                    { x: 70, y: 38 },
                                    { x: 80, y: 71 },
                                    { x: 90, y: 54 },
                                    { x: 100, y: 60 },
                                    { x: 110, y: 36 },
                                    { x: 120, y: 49 },
                                    { x: 130, y: 21, indexLabel: "\u2691 Lowest" }
                              ]
                        }]
                  });
                  bieudocot.render();

                  // -----------------------------------------------------
                  var bieudotron = new CanvasJS.Chart("bieudotron", {
                        theme: "light2", // "light1", "light2", "dark1", "dark2"
                        exportEnabled: true,
                        animationEnabled: true,
                        title: {
                              text: "Desktop Browser Market Share in 2016"
                        },
                        data: [{
                              type: "pie",
                              startAngle: 25,
                              toolTipContent: "<b>{label}</b>: {y}%",
                              showInLegend: "true",
                              legendText: "{label}",
                              indexLabelFontSize: 16,
                              indexLabel: "{label} - {y}%",
                              dataPoints: [
                                    { y: 51.08, label: "Chrome" },
                                    { y: 27.34, label: "Internet Explorer" },
                                    { y: 10.62, label: "Firefox" },
                                    { y: 5.02, label: "Microsoft Edge" },
                                    { y: 4.07, label: "Safari" },
                                    { y: 1.22, label: "Opera" },
                                    { y: 0.44, label: "Others" }
                              ]
                        }]
                  });
                  bieudotron.render();

                  // -----------------------------------------------------
                  var bieudoduong = new CanvasJS.Chart("bieudoduong", {
                        theme: "light1", // "light1", "light2", "dark1"
                        animationEnabled: true,
                        exportEnabled: true,
                        title: {
                              text: "Top 10 Most Viewed YouTube Videos"
                        },
                        axisX: {
                              margin: 10,
                              labelPlacement: "inside",
                              tickPlacement: "inside"
                        },
                        axisY2: {
                              title: "Views (in billion)",
                              titleFontSize: 14,
                              includeZero: true,
                              suffix: "bn"
                        },
                        data: [{
                              type: "bar",
                              axisYType: "secondary",
                              yValueFormatString: "#,###.##bn",
                              indexLabel: "{y}",
                              dataPoints: [
                                    { label: "Learning Colors", y: 4.91 },
                                    { label: "Uptown Funk", y: 4.96 },
                                    { label: "Wheels on the Bus", y: 5.36 },
                                    { label: "Phonics Song with Two Words", y: 5.36 },
                                    { label: "See You Again", y: 5.94 },
                                    { label: "Shape of You", y: 6.02 },
                                    { label: "Bath Song", y: 6.26 },
                                    { label: "Johny Johny Yes Papa", y: 6.73 },
                                    { label: "Despacito", y: 8.20 },
                                    { label: "Baby Shark Dance", y: 13.01 }
                              ]
                        }]
                  });
                  bieudoduong.render();

            }
      </script>

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
      <p class="app-sidebar__user-name"><b>{{ Auth::user()->TENNV }}</b></p>
      <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
  </div>
  <hr>
  <ul class="app-menu">
    <li><a class="app-menu__item" href="{{ route('dashboard') }}"><i class='app-menu__icon bx bx-dollar'></i><span
          class="app-menu__label">Dashboard</span></a></li>

    <li><a class="app-menu__item " href="{{ route('phieunhapxuat.index') }}"><i class='app-menu__icon bx bx-id-card'></i> <span
          class="app-menu__label">Quản Lý Phiếu</span></a></li>

    <li><a class="app-menu__item" href="{{ route('taikhoan.index') }}"><i class='app-menu__icon bx bx-user-voice'></i><span
          class="app-menu__label">Quản Lý Nhân Sự</span></a></li>

    <li><a class="app-menu__item" href="{{ route('phieunhapxuat.index') }}"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span 
          class="app-menu__label">Quản Lý Kho</span></a></li>

    <li><a class="app-menu__item" href="{{ route('sanpham.index') }}"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span 
          class="app-menu__label">Quản Lý Sản Phẩm</span></a></li>

    <li><a class="app-menu__item" href="{{ route('phieunhapxuat.index') }}"><i class='app-menu__icon bx bx-task'></i><span
          class="app-menu__label">Quản Lý Phân Loại</span></a></li>

    <li><a class="app-menu__item " href="{{ route('phieunhapxuat.index') }}"><i class='app-menu__icon bx bx-id-card'></i> <span
          class="app-menu__label">Quản Lý Nhà Cung Cấp</span></a></li>

    <li><a class="app-menu__item " href="{{ route('phieunhapxuat.index') }}"><i class='app-menu__icon bx bx-purchase-tag-alt'></i> <span
          class="app-menu__label">Quản Lý Trạng Thái</span></a></li>

    <li><a class="app-menu__item" href="{{ route('diachinhapxuat.index') }}"><i class='app-menu__icon bx bx-run'></i><span
          class="app-menu__label">Quản Lý Địa Chỉ</span></a></li>
  </ul>
</aside>


    