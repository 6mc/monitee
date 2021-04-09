
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="initial-scale=5.0, maximum-scale=6.0, user-scalable=no" />
  <title>CodePen - WinAmp Modified</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<style>
.handle::-webkit-slider-thumb {
  -webkit-appearance: none; /* Override default look */
  appearance: none;
  width: 25px; /* Set a specific slider handle width */
  height: 10px; /* Slider handle height */
  background: #d6ceb1; /* Green background */
  border: inset;
 border-color: #fdffbd;
  border-width: 3px;
  cursor: pointer; /* Cursor on hover */
}
.handle:focus {
outline: 0;
}
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="main-ui player">
  <header>
    <div class="line"></div>
    <h1>Jukebox</h1>
  </header>
  <div class="inner">
    <div class="current-play b-black g-color">
      PLAYING : Dream Theater - One Last Time
    </div>
    <div class="control">
      <form id="msg" method="POST" action="/command">
        @csrf
        <input type="hidden" value="{{$screenshots[0]->pc}}" name="pc">
      <button onclick="sendmessage()"><i class="fa fa-play"></i></button>
      <button><i class="fa fa-step-backward"></i></button>
      <button><i class="fa fa-step-forward"></i></button>
      <input type="text" name="command" id="message" placeholder="Buraya Mesajınız yazın" class="add-music-input g-color b-black">
      </form>
      <input id="range" oninput="refreshFrame(this.value)" class="handle" type="range" value="{{count($screenshots)}}" min="0" max="{{count($screenshots)}}" style="width:94%; margin-left:3%; border-style: inset;
    border-color: #7e7e7e;
    border-width: 2px;
    -webkit-appearance: none;
    background: transparent;
    margin-top:1%;">
    </div>
  </div>
</div>
<div class="main-ui playlist" style="width: 56%;">
  
  <header >
    <div class="line"></div>
    <h1>Queue lists</h1>
  </header>
  <div class="inner">
    <div class="list b-black" style="
    margin-left: auto;
    margin-right: auto;
    min-height: auto;">
      <!-- <ul>
        <li class="playing">Dream Theater - One Last Time</li>
        <li>Periphery - Marigold</li>
        <li>Dream Theater - The Dark Eternal Night</li>
        <li>Dream Theater - Play Video</li>
        <li>Dream Theater - The Bigger Picture</li>
        <li>Dream Theater - Play Video</li>
        <li>Dream Theater - Hell's Kitchen</li>
        <li>Dream Theater - Play Video</li>
        <li>Dream Theater - The Gift of Music</li>
        <li>Dream Theater - Play Video</li>
        <li>Dream Theater - Our New World</li>
      </ul> -->
      <img id="frame" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/6b449513765711.56277d303236b.gif" style="width: 100%">
    </div>
    <div class="control">
      <form method="post" action="/command">  
        @csrf
        <input type="hidden" value="{{$screenshots[0]->pc}}" name="pc">
      <input type="text" name="command" style="float: left;" placeholder="Enter CMD Command" class="add-music-input g-color b-black">
      <button type="submit" >Execute Command</button>
      </form>
    </div>
  </div>
</div>
<!-- partial --> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.1/socket.io.js" integrity="sha512-vGcPDqyonHb0c11UofnOKdSAt5zYRpKI4ow+v6hat4i96b7nHSn8PQyk0sT5L9RECyksp+SztCPP6bqeeGaRKg==" crossorigin="anonymous"></script>
<script>

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
      $('#message').val('nircmd infobox "'+ document.getElementById('message').value +'"  "Mesaj" ');
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
setTimeout(getLastFrame, 10000);
   });
  }

 





</script>
</body>
</html>
