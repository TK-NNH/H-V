
<div class="row2">
    <div class="row2 font_title" style="margin-top: 200px;">
      <h1>Biểu đồ</h1>
    </div>
    <div class="row2 form_content ">
      <div
              id="myChart" style="width:100%; width:800px; height:500px; align-items: center">
      </div>

      <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

// Set Data
          const data = google.visualization.arrayToDataTable([
            ['dichvu', 'Số lượng bình luận'],
            <?php 
            $listsanpham = loadall_sanpham2();
               foreach ($listsanpham as $sanpham) {
                extract($sanpham);
                echo "['$name', $soBinhLuan],";
              }
            ?>
          ]);

// Set Options
          const options = {
            title:'BIỂU ĐỒ SỐ LƯỢNG BÌNH LUẬN TRONG SẢN PHẨM',
            is3D:true
          };

// Draw
          const chart = new google.visualization.BarChart(document.getElementById('myChart'));
          chart.draw(data, options);

        }
      </script>

<a href="index.php?act=quanlybinhluan"> <input class="mr20" type="button" value="QUẢN LÝ BÌNH LUẬN"></a>
    </div>
  </div>