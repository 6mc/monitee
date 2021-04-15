<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - CSS Grid: Excel Spreadsheet</title>
  <link href="https://fonts.googleapis.com/css?family=Merriweather:700i|Noto+Sans:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css'><link rel="stylesheet" href="./excel.css">

</head>
<body>
     <form id="form" method="post" action="config">

<!-- partial:index.partial.html -->
<div class="main-content">
  <div class="title">Book1 - Excel</div>
  <div class="menu-bar">
    <div style="cursor: pointer;"><span onclick="window.location.href='/home'">Home</span></div>
    <div style="cursor: pointer;"><span onclick="$('#form').submit();">Save</span></div>
    <div><span>Insert</span></div>
    <div><span>Page Layout</span></div>
    <div><span>Formulas</span></div>
    <div><span>Data</span></div>
    <div><span>Review</span></div>
    <div><span>View</span></div>
    <div><span>Help</span></div>
  </div>
  <div class="icon-bar">
    <div class="icon-bar__clipboard">
      <div class="icon-paste">
        <div class="icon"></div><span>Paste</span>
      </div>
      <div class="icon icon-cut"></div>
      <div class="icon icon-copy"></div>
      <div class="icon-bar__name">Clipboard</div>
    </div>
    <div class="icon-bar__font">
      <select class="font-name">
        <option selected="selected">Noto Sans</option>
        <option style="--font:Arial">Arial</option>
        <option style="--font:Calibri">Calibri</option>
        <option style="--font:Comic Sans MS">Comic Sans MS</option>
        <option style="--font:Courier New">Courier New</option>
        <option style="--font:Impact">Impact</option>
        <option style="--font:Georgia">Georgia</option>
        <option style="--font:Garamond">Garamond</option>
        <option style="--font:Lato">Lato</option>
        <option style="--font:Open Sans">Open Sans</option>
        <option style="--font:Palatino">Palatino</option>
        <option style="--font:Verdana">Verdana</option>
      </select>
      <select class="font-size">
        <option selected="selected">14</option>
        <option>16</option>
        <option>18</option>
        <option>20</option>
        <option>22</option>
        <option>24</option>
        <option>26</option>
        <option>28</option>
        <option>36</option>
        <option>48</option>
        <option>72</option>
      </select>
      <div class="icon icon-bold"></div>
      <div class="icon icon-italic"></div>
      <div class="icon icon-underline"></div>
      <div class="icon icon-border"></div>
      <div class="icon icon-fill"></div>
      <div class="icon icon-color"></div>
      <div class="icon-bar__name">Font</div>
    </div>
    <div class="icon-bar__alignment">
      <div class="icon icon-alignt"></div>
      <div class="icon icon-alignm"></div>
      <div class="icon icon-alignb"></div>
      <div class="icon icon-orientation"></div>
      <div class="icon icon-alignl"></div>
      <div class="icon icon-alignc"></div>
      <div class="icon icon-alignr"></div>
      <div class="icon icon-indentinc"></div>
      <div class="icon icon-indentdec"></div>
      <div class="wrap-text">
        <div class="icon"></div><span>Wrap Text</span>
      </div>
      <div class="merge-center">
        <div class="icon"></div><span>Merge & Center</span>
      </div>
      <div class="icon-bar__name">Alignment</div>
    </div>
    <div class="icon-bar__number">
      <select class="number-format">
        <option>General</option>
        <option>Number</option>
        <option>Currency</option>
        <option>Accounting</option>
        <option>Short Date</option>
        <option>Long Date</option>
        <option>Time</option>
        <option>Currency</option>
        <option>Percentage</option>
      </select>
      <div class="icon icon-acc"></div>
      <div class="icon icon-percent"></div>
      <div class="icon icon-comma"></div>
      <div class="icon icon-decimalinc"></div>
      <div class="icon icon-decimaldec"></div>
      <div class="icon-bar__name">Number</div>
    </div>
    <div class="icon-bar__styles">
      <div class="conditional">
        <div class="icon"></div>
      </div>
      <div class="format-table">
        <div class="icon"></div>
      </div>
      <div class="cell-style">
        <div class="icon"></div>
      </div>
      <div class="icon-desc">Conditional Formatting</div>
      <div class="icon-desc">Format as Table</div>
      <div class="icon-desc">Cell Styles</div>
      <div class="icon-bar__name">Styles</div>
    </div>
    <div class="icon-bar__cells">
      <div class="cell-insert"> 
        <div class="icon"></div>
      </div>
      <div class="cell-delete">
        <div class="icon"></div>
      </div>
      <div class="cell-format">
        <div class="icon"></div>
      </div>
      <div class="icon-desc">Insert</div>
      <div class="icon-desc">Delete</div>
      <div class="icon-desc">Format</div>
      <div class="icon-bar__name">Cells</div>
    </div>
  </div>
  <div class="cell-content">
    <div>fx</div>
    <div></div>
  </div>
  <div class="cells">
    <div class="cells__spacer"></div>
    <div class="cells__alphabet">A</div>
    <div class="cells__alphabet">B</div>
    <div class="cells__alphabet">C</div>
    <div class="cells__alphabet">D</div>
    <div class="cells__alphabet">E</div>
    <div class="cells__alphabet">F</div>
    <div class="cells__alphabet">G</div>
    <div class="cells__alphabet">H</div>
    <div class="cells__alphabet">I</div>
    <div class="cells__alphabet">J</div>
    <div class="cells__alphabet">K</div>
    <div class="cells__number">1</div>
    <div class="cells__number">2</div>
    <div class="cells__number">3</div>
    <div class="cells__number">4</div>
    <div class="cells__number">5</div>
    <div class="cells__number">6</div>
    <div class="cells__number">7</div>
    <div class="cells__number">8</div>
    <div class="cells__number">9</div>
    <div class="cells__number">10</div>
    <div class="cells__number">11</div>
    <div class="cells__number">12</div>
    <div class="cells__number">13</div>
    <div class="cells__number">14</div>
    <div class="cells__number">15</div>
    <div class="cells__number">16</div>
    <div class="cells__number">17</div>
    <div class="cells__number">18</div>
    <div class="cells__number">19</div>
    <div class="cells__number">20</div>
	 <div class="cells__number">20</div> 
	 <div class="cells__number">21</div> 
	 <div class="cells__number">22</div>
	 <div class="cells__number">23</div>
	 <div class="cells__number">24</div>
	 <div class="cells__number">25</div>
	 <div class="cells__number">26</div>
     @csrf
    <input  class="cells__input"value="Yenileme Aralığı(saniye)"/>
    <input name="interval" class="cells__input"value="{{$interval}}" />
    <input class="cells__input" />
    <input class="cells__input" />
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"value="Canlı yenileme (saniye)" />
    <input name="liveinterval" class="cells__input"value="{{$liveinterval}}"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
	<input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
	    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
	    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
	    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
	    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
	    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
	    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
    <input class="cells__input"/>
	   <input class="cells__input"/>
	      <input class="cells__input"/>
		     <input class="cells__input"/>
			    <input class="cells__input"/>
				   <input class="cells__input"/>
				      <input class="cells__input"/>
    <!-- <input class="input__explanation" value="Part of the CSS Grid Collection 👉🏻"/> -->
    <!-- <div class="input__see-more"><a href="https://codepen.io/collection/DQvYpQ/" target="_blank">Click here!</a></div> -->
    <!-- <div class="input__sm-1"><a href="https://twitter.com/meowlivia_" target="_blank">Twitter</a></div> -->
    <!-- <div class="input__sm-2"><a href="https://github.com/oliviale" target="_blank">GitHub</a></div> -->
    <!-- <div class="input__sm-3"><a href="https://dribbble.com/oliviale" target="_blank">Dribbble</a></div> -->
 </form> </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script type="text/javascript">
      var i = 22;
    @foreach($employees as $employee)
    
    document.getElementsByClassName('cells__input')[i].value = "{{$employee->pc}}";
    document.getElementsByClassName('cells__input')[i].name = "employeepc["+((i/11)-2).toString() +"]";
    document.getElementsByClassName('cells__input')[i+1].name = "employeename["+((i/11)-2).toString()+"]";
    document.getElementsByClassName('cells__input')[i+1].value = "{{$employee->name}}";
    i +=11; 

    @endforeach
  </script>
</body>
</html>