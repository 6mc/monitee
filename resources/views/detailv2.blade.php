 @include('layouts.navbar')
    <main role="main">
   <section class="blog_section">
      <div class="container">
          <div class="blog_content">
              <div class="owl-carousel owl-theme">
                @foreach($employees as $employee)
                  <div class="blog_item mr-1">
                      <div class="blog_image">
                          <img class="img-fluid" src="/{{$employee->last_screenshot}}">
                      </div>
                  </div>  
                 @endforeach       
              </div>
          </div>
      </div>
  </section>
  
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="form-group">
              <a  onclick="utils('killeverything')" href="#">
                <span class="badge badge-primary">Tüm Programları Kapat</span>
              </a>
              <a  onclick="utils('closechrome')" href="#">
                <span class="badge badge-primary">Chrome Kapat</span>
              </a>

              <a   onclick="utils('standby')" href="#">
                <span class="badge badge-primary">Uyku Moduna Al</span>
              </a>

              <a  onclick="utils('shutdown')" href="#">
                <span class="badge badge-primary">Bilgisayarı Kapat</span>
              </a>
            </div>
          </div>
        </div>
         <div class="row mb-4">
          <div class="col-md-9 mb-5">
            <img id="frame" src="/img/phpKJiMYJ.jpg" width="100%" height="100%" />
            <div  class="form-group">
              <input style="width: 100%;"  id="range" oninput="refreshFrame(this.value)" class="handle" type="range" value="{{count($screenshots)}}" min="0" max="{{count($screenshots)}}">
            </div>
          </div>

          <div class="col-12 col-md-3 overflow-div">
           @foreach($entries as $entry)
            <div class="row border-bottom">
              <div class="col-12">
                <a href="#">{{$entry->process}}</a>
              </div>
              <div class="col-12">
                <p class="text-right text-secondary">
                  <small>{{$entry->created_at}}</small>
                </p>
              </div>
            </div> 
          @endforeach
          </div>
        </div>
        <div class="row mt-5">
          <div class="col">
            <div class="form-row">
              <div class="form-group col-md-9">
                      <form id="msg" method="POST" action="/command">
        @csrf
        <input type="hidden" value="{{$screenshots[0]->pc}}" name="pc">
                <input
                type="text" name="command" id="message" placeholder="Buraya Mesajınızı yazın" 
                  class="form-control bg-transparent border border-dark"
                />
              </div>
              <div class="form-group col-md-3">
                <button onclick="sendmessage()"
                 
                  class="btn btn-block btn-outline-dark ml-1"
                >
                  Gönder
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

    <script src="/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.1/socket.io.js" integrity="sha512-vGcPDqyonHb0c11UofnOKdSAt5zYRpKI4ow+v6hat4i96b7nHSn8PQyk0sT5L9RECyksp+SztCPP6bqeeGaRKg==" crossorigin="anonymous"></script>
 <script type="text/javascript">
      function utils(selection) {
    
    console.log("in utils");

  var command = "";
     
   switch (selection) {
  case "closechrome":
    command = "taskkill /F /IM chrome.exe /T";
    break;
  case "standby":
    command = "nircmd standby";
    break;
  case "killeverything":
    command = 'powershell -command "(New-Object -comObject Shell.Application).Windows() | foreach-object {$_.quit()}; Get-Process | Where-Object {$_.MainWindowTitle -ne \\"\\"} | stop-process"';
    break;
  case "shutdown":
    command = 'nircmd initshutdown "shutting down the system within 0 seconds" 0 force';
}

    var csrf = document.querySelector('meta[name="csrf-token"]').content;
     $.ajax({
        url: '/command',
        type: "POST",
        data: { 'command': command , '_token': csrf, 'pc': "{{$screenshots[0]->pc}}" },
        success: function (response) {
            console.log("command executed");
        }
    });

  console.log(command);
  }



function sendmessage() {
    
    // var csrf = document.querySelector('meta[name="csrf-token"]').content;
    //  $.ajax({
    //     url: '/command',
    //     type: "POST",
    //     data: { 'command': "nircmd infobox "+ document.getElementById('message').value +"  'Mesaj' " , '_token': csrf },
    //     success: function (response) {
    //         console.log(response);
    //         document.getElementById('message').value = "";
    //     }
    // });
    //document.getElementById('message').value = "nircmd infobox "+ document.getElementById('message').value +"  'Mesaj' ";
    $('#msg').submit(function () {
      // body...
     var msg =  'nircmd trayballoon "Mesaj" "'+ document.getElementById('message').value +'" "shell32.dll,22" 15000';
      $('#message').val(msg);
    });
  }

 function execute(input) {
    console.log(input.value);
    input.value = "";
  }

   var socket = new io.connect('ws://'+ window.location.origin.split("//")[1] +':3000');

    socket.on('connect', function() {
        console.log("Connected");
         socket.emit('user', window.location.href.split("/")[4]);
    });

  frame = document.getElementById('frame'); 
  range = document.getElementById('range');


  var bingo = [];
  @foreach( $screenshots as $screenshot)
  bingo.push("{{$screenshot->path}}");
  @endforeach

  frame.src = "/" +bingo[bingo.length -1];

  function refreshFrame(index) {
    // body...

  frame.src = "/" + bingo[index-1];

  }


 getLastFrame();



  function getLastFrame() {
    
    fetch('/live/'+ window.location.href.split("/")[4])
  .then(response => response.json())
  .then(data =>{ 

    bingo.push(data.path);
    range.setAttribute('max', Number(range.getAttribute('max')) + 1);
    if (range.value == range.getAttribute('max')) {}
    range.value = Number(range.getAttribute('max'));
    frame.src = "/" + bingo[range.value-1];
    console.log('calistim')
   // getLastFrame();
setTimeout(getLastFrame, {{ intval($liveinterval)*1000 }});
   });
  

  }




 </script>
  </body>
</html>