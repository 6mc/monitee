
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
      <button><i class="fa fa-play"></i></button>
      <button><i class="fa fa-step-backward"></i></button>
      <button><i class="fa fa-step-forward"></i></button>
      <input type="text" placeholder="Paste Youtube URL Here" class="add-music-input g-color b-black">
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
    </div>
  </div>
</div>
<!-- partial --> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>

  function execute(input) {
    console.log(input.value);
    input.value = "";
  }


	frame = document.getElementById('frame'); 
  range = document.getElementById('range');


	var bingo = [];
	@foreach( $screenshots as $screenshot)
	bingo.push("history/{{$screenshot->path}}");
	@endforeach

	frame.src = "/" +bingo[bingo.length -1];

	function refreshFrame(index) {
		// body...

	frame.src = "/" + bingo[index-1];

	}


//  getLastFrame();



//   function getLastFrame() {
    
//     fetch('/live/'+ window.location.href.split("/")[4])
//   .then(response => response.json())
//   .then(data =>{ 

//     bingo.push(data.path);
//     range.setAttribute('max', Number(range.getAttribute('max')) + 1);
//     if (range.value == range.getAttribute('max')) {}
//     range.value = Number(range.getAttribute('max'));
//     frame.src = "/" + bingo[range.value-1];
//     console.log('calistim')
//    // getLastFrame();
// setTimeout(getLastFrame, 10000);
//    });
//   }

 





</script>
</body>
</html>
