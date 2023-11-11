
  <script src={{ asset("/admin/js/jquery-3.2.1.min.js") }}></script>
  <!--===============================================================================================-->
  <script src={{ asset("/admin/js/popper.min.js") }}></script>
  <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
  <!--===============================================================================================-->
  <script src={{ asset("/admin/js/bootstrap.min.js") }}></script>
  <!--===============================================================================================-->
  <script src={{ asset("/admin/js/main.js") }}></script>
  <!--===============================================================================================-->
  <script src={{ asset("/admin/js/plugins/pace.min.js") }}></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src={{ asset("/admin/js/plugins/chart.js") }}></script>
  <!--===============================================================================================-->
  <script type="text/javascript">
    var data = {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
      datasets: [{
        label: "Dữ liệu đầu tiên",
        fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
        strokeColor: "rgb(255, 212, 59)",
        pointColor: "rgb(255, 212, 59)",
        pointStrokeColor: "rgb(255, 212, 59)",
        pointHighlightFill: "rgb(255, 212, 59)",
        pointHighlightStroke: "rgb(255, 212, 59)",
        data: [20, 59, 90, 51, 56, 100]
      },
      {
        label: "Dữ liệu kế tiếp",
        fillColor: "rgba(9, 109, 239, 0.651)  ",
        pointColor: "rgb(9, 109, 239)",
        strokeColor: "rgb(9, 109, 239)",
        pointStrokeColor: "rgb(9, 109, 239)",
        pointHighlightFill: "rgb(9, 109, 239)",
        pointHighlightStroke: "rgb(9, 109, 239)",
        data: [48, 48, 49, 39, 86, 10]
      }
      ]
    };
    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);
  </script>
  <script type="text/javascript">
    //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
  </script>

  <script src={{ asset("/chart/js/jquery-1.11.1.min.js") }}></script>
  <script src={{ asset("/chart/js/bootstrap.min.js") }}></script>
  <script src={{ asset("/chart/js/chart.min.js") }}></script>
  <script src={{ asset("/chart/js/chart-data.js") }}></script>
  <script src={{ asset("/chart/js/easypiechart.js") }}></script>
  <script src={{ asset("/chart/js/easypiechart-data.js") }}></script>
  <script src={{ asset("/chart/js/bootstrap-datepicker.js") }}></script>
  <script src={{ asset("/chart/js/custom.js") }}></script>
  <script>
    window.onload = function () {

      var chart1 = document.getElementById("line-chart").getContext("2d");
      window.myLine = new Chart(chart1).Line(lineChartData, {
        responsive: true,
        scaleLineColor: "rgba(0,0,0,.2)",
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleFontColor: "#c5c7cc"
      });

      var chart2 = document.getElementById("bar-chart").getContext("2d");
      window.myBar = new Chart(chart2).Bar(barChartData, {
        responsive: true,
        scaleLineColor: "rgba(0,0,0,.2)",
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleFontColor: "#c5c7cc"
      });

      var chart3 = document.getElementById("doughnut-chart").getContext("2d");
      window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {
        responsive: true,
        segmentShowStroke: false
      });

      var chart4 = document.getElementById("pie-chart").getContext("2d");
      window.myPie = new Chart(chart4).Pie(pieData, {
        responsive: true,
        segmentShowStroke: false
      });

      var chart5 = document.getElementById("radar-chart").getContext("2d");
      window.myRadarChart = new Chart(chart5).Radar(radarData, {
        responsive: true,
        scaleLineColor: "rgba(0,0,0,.05)",
        angleLineColor: "rgba(0,0,0,.2)"
      });

      var chart6 = document.getElementById("polar-area-chart").getContext("2d");
      window.myPolarAreaChart = new Chart(chart6).PolarArea(polarData, {
        responsive: true,
        scaleLineColor: "rgba(0,0,0,.2)",
        segmentShowStroke: false
      });
      
    };
  </script>	

</body>
</html>