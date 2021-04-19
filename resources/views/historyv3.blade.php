 @include('layouts.navbar')
      
    <main  role="main">
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
      </div>
    </main>
   <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="form-row">
            <div class="form-group col-md-8">
              <input id="date" class="form-control bg-transparent border border-dark" type="date" min="@php echo explode(' ', \App\photo::find(1)->created_at)[0]; @endphp" name="date" 
           max="@php echo date("Y-m-d"); @endphp">
            </div>
            <div class="form-group col-md-4">
              <button onclick="changedate()" type="button" class="btn btn-block btn-outline-dark">
                Getir
              </button>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

    <script src="/js/script.js"></script>

 <script>

  function changedate() {
    window.location.href = document.getElementById('date').value;
  }

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
