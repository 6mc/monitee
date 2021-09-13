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
                  <div class="form-group">
                  <label>Mesai Başlangiç Saati</label>
                  <input name="shift_start" type="number" max="24" min="0" class="cells__input" value="{{$shift_start}}"/>
                </div>
                  <div class="form-group">
                  <label>Mesai Bitiş Saati</label>
                  <input name="shift_end" class="cells__input" type="number" max="24" min="0" value="{{$shift_end}}"/>
                </div>
                  <div class="form-group">
                 <div class="weekDays-selector">
  <input onchange="updateval()"  type="checkbox" id="weekday-mon" class="weekday" />
  <label for="weekday-mon">P</label>
  <input onchange="updateval()" type="checkbox" id="weekday-tue" class="weekday" />
  <label for="weekday-tue">S</label>
  <input onchange="updateval()" type="checkbox" id="weekday-wed" class="weekday" />
  <label for="weekday-wed">Ç</label>
  <input onchange="updateval()" type="checkbox" id="weekday-thu" class="weekday" />
  <label for="weekday-thu">P</label>
  <input onchange="updateval()" type="checkbox" id="weekday-fri" class="weekday" />
  <label for="weekday-fri">C</label>
  <input onchange="updateval()" type="checkbox" id="weekday-sat" class="weekday" />
  <label for="weekday-sat">C</label>
  <input onchange="updateval()" type="checkbox" id="weekday-sun" class="weekday" />
  <label for="weekday-sun">P</label>
</div>
                </div>
                <input type="hidden" id="days" name="days">
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
    <script>

      for (var i = {{$days}} - 1; i >= 0; i--) {
        document.getElementsByClassName('weekday')[i].checked = true;
      }

      function updateval() {
        document.getElementById('days').value = document.querySelectorAll('input[class="weekday"]:checked').length;
      }

      updateval()
    </script>
  </body>
</html>
