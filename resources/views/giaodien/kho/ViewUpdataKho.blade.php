<br>
<br>

  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách Kho</li>
        <li class="breadcrumb-item">Cập Nhật Kho </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Cập Nhật Kho </h3>
          <div class="tile-body">

            @if (Session::Has('alert'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{ Session::Get('alert') }}.
              </div>
            @endif
            
            <form class="row" action="{{ route('kho.update') }}" method="post">
              @csrf
              
              <div class="form-group col-md-3">
                <label class="control-label">Tên kho</label>
                <input class="form-control" name="TENKHO" type="text" value="{{ $kho->TENKHO }}">
              </div>
              <div class="form-group col-md-2">
                <label class="control-label">SĐT</label>
                <input class="form-control" name="SDT" type="text" value="{{ $kho->SDT }}">
              </div>
              <div class="form-group col-md-5">
                <label class="control-label">Địa chỉ</label>
                <input class="form-control" name="DC" type="text" value="{{ $kho->DC }}">
              </div>
              <input type="hidden" name="MAKHO" value="{{ $kho->MAKHO }}">
              </div>
                <input class="btn btn-save" type="submit" name="submit" value="Lưu Lại">
                <a class="btn btn-cancel" href="{{ route('kho.index') }}">Hủy bỏ</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
</main>