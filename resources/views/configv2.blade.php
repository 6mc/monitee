 @include('layouts.navbar')

    <div class="container mt-3">
      <div class="row">
        <div class="col-12 mt-2">
          <div class="card border-dark">
            <h5 class="card-header">Ayarlar</h5>
            <div class="card-body">
                 <form id="form" method="post" action="config">
                @csrf
                <div class="form-group">
                  <label>Yenileme Aralığı(saniye)</label>
                  <input name="interval" class="cells__input"value="{{$interval}}" />
                </div>
                <div class="form-group">
                  <label>Canlı yenileme (saniye)</label>
                  <input name="liveinterval" class="cells__input"value="{{$liveinterval}}"/>
                </div>
                @foreach($employees as $employee)
                <div class="form-group">
                  <input type="text" value="{{$employee->pc}}" name="employeepc[{{ $loop->index }}]" class="form-control" readonly />
                  <input type="text" name="employeename[{{ $loop->index }}]" value="{{$employee->name}}" class="form-control" />
                </div>
                @endforeach
                <button type="submit" class="btn btn-success">Kaydet</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
      integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
      crossorigin="anonymous"
    ></script>

    <script src="/js/script.js"></script>
  </body>
</html>
