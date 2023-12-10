<div class="container">
                        <h2 class="my-3">Tổng Quan</h2>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card text-bg-primary mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Sản phẩm</h5>
                                        <p class="card-text text-center"><?=$tkSP?></p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="card text-bg-danger mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Khách hàng</h5>
                                        <p class="card-text text-center"><?=$tkUser?></p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="card text-bg-success mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Danh mục</h5>
                                        <p class="card-text text-center"><?=$tkDM?></p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="card text-bg-dark mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Hóa Đơn</h5>
                                        <p class="card-text text-center"><?=$tkHoaDon?></p>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                    <script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Your Function
function drawChart() {
// Set Data
    const data = google.visualization.arrayToDataTable([
    ['Danh mục', 'Số lượng'],
    <?php foreach ($tkSachTheoChuDe as $cd){
        echo "['".$cd['TenChuDe']."',".$cd['SoLuong']."],";
    } ?>
    
    ]);

    // Set Options
    const options = {
    title:'Biểu đồ số lượng sản phẩm theo danh mục'
    };

    // Draw
    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
    chart.draw(data, options);


    const data2 = google.visualization.arrayToDataTable([
    ['Tháng/Năm', 'DoanhThu'],
    <?php foreach ($tkDoanhThu as $dt){
        echo "['".$dt['Thang']."/".$dt['Nam']."',".$dt['DoanhThu']."],";
    } ?>
    ]);

    // Set Options
    const options2 = {
    title:'Biểu đồ thống kê doanh thu theo tháng'
    };

    // Draw
    const chart2 = new google.visualization.ColumnChart(document.getElementById('myChart2'));
    chart2.draw(data2, options2);
}
</script>