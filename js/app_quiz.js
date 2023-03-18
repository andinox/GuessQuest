const inputElement = $('input[type="file"]');
const imageColorElement = $('#image-color');
let nb_question = 0;
first = true;

$("#color-p").on("input", function(e) {
  $("#image-color").css("background-image", "none");
  var palette = $("#palette");
  var img = $("#img-svg");
  $("#image-color").css("background-color", this.value);
  if (hexToRgb(this.value).b <= 50) {
      $("#name").css("color", "white");
  } else {
      $("#name").css("color", "black");
  }
});





add_q = (event) => {
  nb_question++;
  var question_list = $("#q-list");
  var unknow_q = $("#template").clone(true);
  unknow_q.children().eq(1).css("backgroundColor", getRandomHexColor());
  unknow_q.removeClass("none");
  unknow_q.on("click", (event) => {
      console.log(event.target);
      if ($(event.target).hasClass("bi")) {
          unknow_q.remove();
      } else {
          var t = $(".choised");
          if (t.length != 0) {
              t.removeClass("choised");
          }
          unknow_q.addClass("choised");
      }
  });
  question_list.append(unknow_q);
}


$("#add-q").click((event)=>{
  if (first) {
    $("#no-q").hide();
    first = false;
  }
  add_q(event);
});



inputElement.on("change", (event) => {
  const file = event.target.files[0];
  if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = () => {
          // Mettre à jour l'arrière-plan de l'élément avec l'ID "image-color"
          $("#image-color").css("background-image", `url(${reader.result})`);
      };
  }
});






document.getElementById("add-q-o").addEventListener("click", (e) => {
    document.getElementById("no-q").remove();
    first = false;
    add_q(e)
});