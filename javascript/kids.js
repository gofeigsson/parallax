//parallax effect
const parallax = document.getElementById("one");
window.addEventListener("scroll", function() 
{
let offset = window.pageYOffset; 
parallax.style.backgroundPositionY = offset * 0.6 + "px";
});

$(document).ready(function(){
    $("button").click(function(){
      $("p").hide();
    });
  });
