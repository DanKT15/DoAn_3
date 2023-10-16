<br>
<br>

  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách Phiếu</li>
        <li class="breadcrumb-item">Tạo Phiếu Mới</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo Phiếu Mới</h3>
          <div class="tile-body">

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


            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}


            <form class="row" action="{{ route('phieunhapxuat.store') }}" method="post">
              @csrf
              
              <div class="form-group col-md-5">
                <label class="control-label">Mã Phiếu</label>
                <input class="form-control" name="sophieu" type="text" value="">
                @error('sophieu')
                    <span style="color: red">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group col-md-3">
                <label for="exampleSelect1" class="control-label">Nơi Vận Chuyển</label>
                <select class="form-control" name="madiachi" id="exampleSelect1">

                  <option value="">Chọn</option> 

                  @foreach ($DCnhapxuat as $item)
                    <option value="{{ $item->MADC }}">{{ $item->TENDC }}</option>
                  @endforeach

                </select>
                @error('madiachi')
                    <span style="color: red">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group col-md-3">
                <label for="exampleSelect1" class="control-label">Trạng Thái</label>
                <select class="form-control" name="matrangthai" id="exampleSelect1">

                  <option value="">Chọn</option> 
                  
                  @foreach ($Trangthai as $item)
                    <option value="{{ $item->MATT }}">{{ $item->TENTT }}</option>
                  @endforeach

                </select>
                @error('matrangthai')
                    <span style="color: red">{{ $message }}</span>
                @enderror
              </div>

             
                {{-- <div class="form-group col-md-8">
                  <label for="exampleSelect1" class="control-label">Sản Phẩm</label>
                  <select class="form-control" name="masp[0][subject]" id="exampleSelect1">
    
                      <option value="volvo">Volvo</option>
                      <option value="saab">Saab</option>
                      <option value="fiat">Fiat</option>
                      <option value="audi">Audi</option>
    
                  </select>
                </div>
    
                <div class="form-group col-md-2">
                  <label class="control-label">Chức Năng</label>
                  <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Thêm SP</button>
                </div> --}}

                

                <table style="border-collapse: collapse" cellspacing="0" cellpadding="0" class="table" id="dynamicAddRemove">
                  <tr>
                      <th>Sản Phẩm</th>
                      <th>Số Lượng</th>
                      <th>Chức Năng</th>
                  </tr>
                  <tr>
                      <td>
                        <div class="form-group col-md-10">
                          <select class="form-control" name="masp[0][subject]" id="exampleSelect1">
            
                              <option value="">Chọn</option> 
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
            
                          </select>
                          @error('masp.0.subject')
                              <span style="color: red">{{ $message }}</span>
                          @enderror
                        </div>
                      </td>

                      <td>
                        <div class="form-group col-md-10">
                          <input class="form-control" name="soluong" type="number" value="">
                          @error('soluong')
                              <span style="color: red">{{ $message }}</span>
                          @enderror
                        </div>
                      </td>

                      <td>
                        <div class="form-group col-md-10">
                          <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Thêm SP</button>
                        </div>
                      </td>

                  </tr>
              </table>
        
              </div>
                <input class="btn btn-save" type="submit" name="submit" value="Lưu Lại">
                <a class="btn btn-cancel" href="{{ route('phieunhapxuat.index') }}">Hủy bỏ</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
</main>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><div class="form-group col-md-10"><select class="form-control" name="masp['+ i +'][subject]" id="exampleSelect1"><option value="">Chọn</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></div></td><td><div class="form-group col-md-10"><input class="form-control" name="soluong" type="number" value="">@error('soluong')<span style="color: red">{{ $message }}</span>@enderror</div></td><td><div class="form-group col-md-10"><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></div></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
         $(this).parents('tr').remove();
    });
</script>

