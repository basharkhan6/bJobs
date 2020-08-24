$(document).ready(function() {
  $(".title > span").each(function(index) {  //incase if you want to use index
    var txt = $(this).text();
    switch(txt) {
      case "Full Time":
        $(this).addClass("label-success");
        break;
      case "Part Time":
        $(this).addClass("label-primary");
        break;
      case "Contractual":
        $(this).addClass("label-warning");
        break;
      case "Frelance":
        $(this).addClass("label-danger");
        break;
      default:
        $(this).addClass("label-info");
    }
  });


  var colors=["red", "green", "blue", "magenta", "yellow", "hotpink", "purple", "lime", "aqua", "dodgerblue", "orange", "orangered", "indigo", "gold", "black", "brown", "blueviolet"];
  var usedColors = [];
  $(".job-box").each(function() {
    var color = randomColor(colors);
    while(1) {
      if(!usedColors.includes(color)) {
        break;
      }
      color = randomColor(colors);
    }
    // console.log(color);
    $(this).css('border-left-color', color);
    usedColors[usedColors.length] = color;
  });
  // console.log(usedColors);
});

function randomColor(colors) {
  var rand = Math.floor(Math.random() * (colors.length));
  return colors[rand];
}
