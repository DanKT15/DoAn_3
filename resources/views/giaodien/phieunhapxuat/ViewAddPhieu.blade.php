
@if (Session::Has('alert'))
<div class="alert alert-success">
    <strong>Success!</strong> {{ Session::Get('alert') }}.
  </div>
@endif

<div class="container-sm border">
    <form action="{{ route('storephieu') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="formGroupExampleInput">Example label</label>
          <input type="text" name="sophieu" class="form-control" id="formGroupExampleInput" placeholder="Example input">
        </div>
        <button type="submit">Add</button>
      </form>
  </div>
