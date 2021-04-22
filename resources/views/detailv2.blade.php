 @include('layouts.navbar')
    <main role="main">
   <section class="blog_section">
      <div class="container">
          <div class="blog_content">
              <div class="owl-carousel owl-theme">
                @foreach($employees as $employee)
                  <div class="blog_item mr-1">
                      <div class="blog_image">
                          <div class="box">
                            <a href="/detail/{{$employee->id}}">
                          <img class="img-fluid" src="/{{$employee->last_screenshot}}">
                        </a>
                          </div>
                          <div class="stack-top">
                            <p class="text-light text-center font-weight-bold">{{$employee->name}}</p>
                          </div>

                      </div>
                  </div>  
                 @endforeach       
              </div>
          </div>
      </div>
  </section>
  
      <div class="container">
        <div class="row">
          <div class="col-4">
              <h5 class="text-info font-weight-bold">{{$employees[$id-1]->name}}</h5>
          </div>
          <div class="col-6">
            <div class="form-group">
              <a  onclick="utils('killeverything')" href="#">
                <span class="badge badge-info">Tüm Programları Kapat</span>
              </a>
              <a  onclick="utils('closechrome')" href="#">
                <span class="badge badge-secondary">Chrome Kapat</span>
              </a>

              <a   onclick="utils('standby')" href="#">
                <span class="badge badge-warning">Uyku Moduna Al</span>
              </a>

              <a  onclick="utils('shutdown')" href="#">
                <span class="badge badge-danger">Bilgisayarı Kapat</span>
              </a>
            </div>
          </div>
        </div>

        <div class="row mb-1">
          <div class="col-md-9 mb-4">

            <img id="frame" src="/img/phpKJiMYJ.jpg" width="100%" height="100%" />
            <div  class="form-group">
              <input style="width: 100%;"  id="range" oninput="refreshFrame(this.value)" class="handle" type="range" value="{{count($screenshots)}}" min="0" max="{{count($screenshots)}}">
            </div>
          </div>
          <div class="col-12 col-md-3 overflow-div">
           @foreach($entries as $entry)
            <div class="row border-bottom">
              <div class="col-13">
                <a style="font-size:14px" href="#">{{$entry->process}}</a>
              </div>
              <div class="col-12">
                <p class="text-right text-secondary">
                  <small style="font-size:12px">{{$entry->created_at}}</small>
                </p>
              </div>
            </div> 
          @endforeach
          </div>
        </div>
         <b id="time">2021-04-25 16:06:06</b>
        <div class="row mb-2">
          <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'message')" id="defaultOpen">Mesaj</button>
            <button class="tablinks" onclick="openCity(event, 'history')">Geçmiş</button>
          </div>
          <div id="message" class="tabcontent">
            <div class="row">
              <div class="col">
                @foreach($messages as $message)
                <p>{{ explode('" "', $message->command)[1] }}</p>
                @endforeach
              </div>
            </div>
            <div class="row mt-5">
              <div class="col">
                <div class="form-row">
                  <div class="form-group col-md-9">

                      <form id="msg" method="POST" action="/message">
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
          <div id="history" class="tabcontent"> 

            <div class="row mt-3">
              <div class="col-2">
                <div class="form-group">
                  <input class="form-control mb-2" id="myInput" type="text" placeholder="Geçmişte Ara..">
                </div>
              </div>
               <div class="col-2">
                <div class="form-group">
                  <input class="form-control mb-2" id="startdate" type="date">
                </div>
              </div> <div class="col-2">
                <div class="form-group">
                  <input class="form-control mb-2" id="enddate" type="date">
                </div>
              </div>
               <div class="col-3">
                <div class="form-group">
                  <button type="button" onclick="filterhistory();" class="btn btn-info btn-block">Getir</button>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group"> 	
                  <select class  ="form-control" name="state" id="maxRows">
                    <option value="5000" selected>Hepsini Göster</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="70">70</option>
                    <option value="100">100</option>
                  </select>
              </div>
                </div>
              </div>
              <div class="col-12">
                <p id="result"></p>
              </div>
              

              <div class="overflow-table">
                <table id="myTables" class="table table-bordered table-striped w-100">
                  <thead>
                    <tr>
                      <th>Geçmiş</th>
                      <th>Tarih</th>
                    </tr>
                  </thead>
                  <tbody id="myTable">
                    
                      @foreach($entries as $entry)
                      <tr>
                        <td>{{$entry->process}}</td>
                        <td>{{$entry->created_at}}</td>
                      </tr> 
                      @endforeach
                  
                  </tbody>
                </table> 
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.1/socket.io.js" integrity="sha512-vGcPDqyonHb0c11UofnOKdSAt5zYRpKI4ow+v6hat4i96b7nHSn8PQyk0sT5L9RECyksp+SztCPP6bqeeGaRKg==" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script type="text/javascript">

 function filterhistory() {
   
   var startdate  = document.getElementById('startdate').value;
   var enddate  = document.getElementById('enddate').value;
 var csrf = document.querySelector('meta[name="csrf-token"]').content;
$.LoadingOverlay("show");
   $.ajax({
        url: '/filterhistory',
        type: "POST",
        data: { 'start_date': startdate, 'end_date': enddate, '_token': csrf , 'pc': "{{$screenshots[0]->pc}}" },
        success: function (response) {
          console.log(response);
        document.getElementById('myTable').innerHTML = "";
        response.forEach(function (element) {
          document.getElementById('myTable').innerHTML += "<tr>                        <td>"+element.process+"</td>                        <td>"+element.created_at+"</td>                     </tr>"
        })
$.LoadingOverlay("hide");
        }
    });


 }


getPagination('#myTable');		 
function getPagination(table) {
  var lastPage = 1;

  $('#maxRows')
    .on('change', function(evt) {
    
     lastPage = 1;
     
      var trnum = 0; // reset tr counter
      var maxRows = parseInt($(this).val()); // get Max Rows from select option

      var totalRows = $(table + ' tbody tr').length; // numbers of rows
      $(table + ' tr:gt(0)').each(function() {
        // each TR in  table and not the header
        trnum++; // Start Counter
        if (trnum > maxRows) {
          // if tr number gt maxRows

          $(this).hide(); // fade it out
        }
        if (trnum <= maxRows) {
          $(this).show();
        } // else fade in Important in case if it ..
      }); //  was fade out to fade it in
     
      
    })
    .val(5000)
    .change();
}

// filter for word
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

    });
 
    var count = $('#myTable tr:visible').length;
    if(value == ""){
      document.getElementById("result").innerHTML ="";
    }
    else{
      document.getElementById("result").innerHTML = count + " sonuç bulundu.";
    }
  });
});
// filter for word



// tab menu
function openCity(evt, cityName) {

  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
// tab menu 


// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


      function utils(selection) {
    
    console.log("in utils");

    Swal.fire({
  title: 'Bu işlemi yapmak istediğinize emin misiniz?',
  showDenyButton: true,
  showCancelButton: false,
  confirmButtonText: 'Evet',
  denyButtonText: "Hayır",
}).then((result) => {
  if (result.isConfirmed) {
   


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
           Swal.fire('Başarılı', '', 'success')
        }
    });

  console.log(command);
}});
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
     var msg = document.getElementById('message').value;
      $('#message').val(msg);
    });
  }

 function execute(input) {
    console.log(input.value);
    input.value = "";
  }

   var socket = new io.connect('http://'+ window.location.origin.split("//")[1] +':3000');

    socket.on('connect', function() {
        console.log("Connected");
         socket.emit('user', window.location.href.split("/")[4]);
    });

  frame = document.getElementById('frame'); 
  range = document.getElementById('range');
  time = document.getElementById('time');

  var dates = [];
  var bingo = [];
  @foreach( $screenshots as $screenshot)
  bingo.push("{{$screenshot->path}}");
  dates.push("{{$screenshot->created_at}}")
  @endforeach


  frame.src = "/" +bingo[bingo.length -1];

  function refreshFrame(index) {
    // body...

  frame.src = "/" + bingo[index-1];
  time.innerText =  dates[index-1];
  }


 getLastFrame();



  function getLastFrame() {
    
    fetch('/live/'+ window.location.href.split("/")[4])
  .then(response => response.json())
  .then(data =>{ 

    bingo.push(data.path);
    dates.push(data.created_at);
    range.setAttribute('max', Number(range.getAttribute('max')) + 1);
    if (range.value == range.getAttribute('max') - 1)
    {   
    range.value = Number(range.getAttribute('max'));
    frame.src = "/" + bingo[range.value-1];
     time.innerText =  dates[range.value-1];
    }
    console.log('calistim')
   // getLastFrame();
setTimeout(getLastFrame, {{ intval($liveinterval)*1000 }});
   });
  

  }


$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});

 </script>

  </body>
</html>