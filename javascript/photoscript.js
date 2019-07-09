//GET MODAL
var modal = document.getElementById('myModal');
//GET IMAGE AND PLACE IN MODAL
    var img = $('.myImg');
    var modalImg = $("#img01");
    $('.myImg').click(function(){
        modal.style.display = "block";
        var newSrc = this.src;
        modalImg.attr('src', newSrc);
    });
// GET SPAN ELEMENT TO CLOSE MODAL
var span = document.getElementsByClassName("close")[0];
// CLICK SPAN AND CLOSE MODAL
    span.onclick = function() {
      modal.style.display = "none";
    };
//CLICK OUTSIDE MODAL AND CLOSE
window.onclick = function(event) {
  if (event.target == modal) {
      modal.style.display = "none";
  }
};



