<br>
<br>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách X</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
          
                            @if (Session::Has('alert'))
                            <div class="alert alert-success">
                                <strong>Success!</strong> {{ Session::Get('alert') }}.
                              </div>
                            @endif

                          <a class="btn btn-add btn-sm" href="{{ route('phieunhapxuat.create') }}" title="Thêm"><i class="fas fa-plus"></i>Tạo Phiếu Mới</a></div>

                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Đường dẫn lưu ảnh</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                if (isset($sanpham) and !empty($sanpham)) {

                                    foreach ($sanpham as $key => $value) {
                                        echo '
                                        <tr>
                                            <td>'.$value['MaHA'].'</td>
                                            <td>'.$value['TenSP'].'</td>
                                            <td>'.$value['Img_sp'].'</td>

                                            <td>
                                                <a class="btn btn-primary btn-sm trash" href="" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                }
                                
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
