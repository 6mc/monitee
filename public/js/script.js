//for 3 4 6 div image
$("#btn_3").click(function () {
  $("#changeDiv .col-md-2").addClass("col-md-4");
  $("#changeDiv .col-md-3").addClass("col-md-4");

  $("#changeDiv .col-md-2").removeClass("col-md-2");
  $("#changeDiv .col-md-3").removeClass("col-md-3");
});
$("#btn_4").click(function () {
  $("#changeDiv .col-md-2").addClass("col-md-3");
  $("#changeDiv .col-md-4").addClass("col-md-3");

  $("#changeDiv .col-md-2").removeClass("col-md-2");
  $("#changeDiv .col-md-4").removeClass("col-md-4");
});

$("#btn_6").click(function () {
  $("#changeDiv .col-md-3").addClass("col-md-2");
  $("#changeDiv .col-md-4").addClass("col-md-2");

  $("#changeDiv .col-md-3").removeClass("col-md-3");
  $("#changeDiv .col-md-4").removeClass("col-md-4");
});



//for range
// const slider = document.getElementById("range");
// const min = slider.min;
// const max = slider.max;
// const value = slider.value;

// slider.style.background = `linear-gradient(to right, red 0%, red ${
//   ((value - min) / (max - min)) * 100
// }%, #DEE2E6 ${((value - min) / (max - min)) * 100}%, #DEE2E6 100%)`;

// slider.oninput = function () {
//   this.style.background = `linear-gradient(to right, red 0%, red ${
//     ((this.value - this.min) / (this.max - this.min)) * 100
//   }%, #DEE2E6 ${
//     ((this.value - this.min) / (this.max - this.min)) * 100
//   }%, #DEE2E6 100%)`;
// };


$('.owl-carousel').owlCarousel({
  loop:true,
  margin:10,
  dots:false,
  nav:true,
  autoplay:true,   
  smartSpeed: 1000, 
  autoplayTimeout:5000,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      1000:{
          items:3
      }
  }
});







