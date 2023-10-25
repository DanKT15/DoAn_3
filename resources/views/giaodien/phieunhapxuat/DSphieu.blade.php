<br>
<br>

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách Phiếu</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">

            @if (Session::Has('alert'))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{ Session::Get('alert') }}.
                </div>
            @endif

            @if (Session::Has('err'))
                <div class="alert alert-warning">
                    <strong>Error!</strong> {{ Session::Get('err') }}.
                </div>
            @endif

            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">

                          <a class="btn btn-add btn-sm" href="{{ route('phieunhapxuat.create') }}" title="Thêm"><i class="fas fa-plus"></i>Tạo Phiếu Mới</a></div>

                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã phiếu</th>
                                <th>Số phiếu</th>
                                <th>Ngày lập</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (!empty($phieu))
                                
                                @foreach ($phieu as $key => $value)
                                    
                                    <tr>
                                        <td>{{ $value['id'] }}</td>
                                        <td>{{ $value['SOPHIEU'] }}</td>
                                        <td>{{ $value['NGAYLAP'] }}</td>

                                        @if (!empty($Trangthai))
                                            @foreach ($Trangthai as $key => $values)
                                                @if ($values['MATT'] == $value['MATT'])
                                                    <td>{{ $values['TENTT'] }}</td>
                                                @endif
                                            @endforeach
                                        @endif

                                        <td>
                                            {{-- <a class="btn btn-primary btn-sm trash" href="" title="Xóa"><i class="fas fa-trash-alt"></i></a> --}}
                                            
                                            <a class="btn btn-primary btn-sm edit" href="{{ route('phieunhapxuat.edit', ['id' => $value['id']]) }}" title="Sửa"><i class="fas fa-edit"></i></a>
                                            
                                            <a class="btn btn-primary btn-sm edit" href="{{ route('phieunhapxuat.show', ['id' => $value['id']]) }}" title="Chi tiết"><i class="fas fa-edit"></i></a>

                                            <form class="btn" action="{{ route('phieunhapxuat.destroy') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="idphieu" value="{{ $value['id'] }}">
                                                <button class="btn btn-primary btn-sm trash" type="submit"><i class="fas fa-trash-alt"></i></button>
                                            </form>

                                        </td>
                                    </tr>

                                @endforeach

                            @endif
                                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
