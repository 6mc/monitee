 @include('layouts.navbar')

    <div class="container mt-3">
      <div class="row">
        <div class="col-12 mt-2">
          <div class="form-row">
            <div class="form-group col-md-6">
              <form method="get" action="/home">
           <input class="form-control bg-transparent border border-dark"  type="date" min="@php echo explode(' ', \App\photo::find(1)->created_at)[0]; @endphp" name="date" 
           @if(isset($_GET['date']))
           value="@php echo $_GET['date']; @endphp"
           @else
           value="@php echo date('Y-m-d'); @endphp" 
           @endif
           max="@php echo date("Y-m-d"); @endphp">
            </div>
            <div class="form-group col-md-4">
              <button type="submit" class="btn btn-block btn-outline-dark">
                Getir
              </button> 
           </div>
               
            
          </form>
            <div class="col-md-2">
              <div class="form-group">
                <button class="btn btn-orange" id="btn_3"><i class="fa fa-grip-horizontal"></i></button>
                <button class="btn btn-orange" id="btn_4"><i class="fa fa-chart-bar"></i></button>
                <button class="btn btn-orange" id="btn_6"><i class="fa fa-border-none"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <main role="main">
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row" id="changeDiv">
            
             @foreach ($employees as $employee)
            <div class="col-md-3">
              <div class="card mb-4 shadow-sm">
                <a href="
                @if(isset($_GET['date']))
          /history/{{$employee->id}}/{{$_GET['date']}}
          @else
         /detail/{{$employee->id}}
          @endif
" class="user_link">
                  <img src="{{$employee->last_screenshot}}" width="100%" class="image" />
                </a>
                <div class="card-body">
                  <p class="card-text">User</p>
                  <div class="d-flex justify-content-end">
                    @if($employee->pc_status == 'green')
                    <span class="badge badge-pill badge-success">Online</span>
                    @else
                    <span class="badge badge-pill badge-danger">Offline</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
              @endforeach

          </div>
        </div>
      </div>
    </main>

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

    <script src="js/script.js"></script>
  </body>
</html>
