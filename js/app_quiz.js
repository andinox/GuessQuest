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

$("#color-p").on("focusout",function (e) {
    var url = new URL(window.location.href);
    var id = url.searchParams.get("id");
    var form = $("<form></form>", {
        action: "index.php?controleur=controleurNewQuiz&action=mondifQuiz&id="+id,
        method: "post"
    });
    $("<input></input>", {
        type: "text",
        name: "type",
        value: "quizcolor"
    }).appendTo(form);

    $("<input></input>", {
        type: "text",
        name: "valeur",
        value: this.value
    }).appendTo(form);
    form.appendTo("body");
    form.submit()
})


$("#file-i").on("change",function (e) {
    var url = new URL(window.location.href);
    var id = url.searchParams.get("id");
    if (e.target.files[0].type.indexOf("image/") !== 0) {
        console.log("Le fichier sélectionné n'est pas une image");
        return;
    }
    var form = $("<form></form>", {
        action: "index.php?controleur=controleurNewQuiz&action=mondifQuiz&id="+id,
        method: "post"
    });
    $("<input></input>", {
        type: "text",
        name: "type",
        value: "changeimg"
    }).appendTo(form);
    form.append($("#file-i"))
    form.submit()
})

$(".input-n").on('focusout',function () {
    const name = $(this).val();
    console.log(name);
    var url = new URL(window.location.href);
    var id = url.searchParams.get("id");
    if (name != "") {
        var form = $("<form></form>", {
            action: "index.php?controleur=controleurNewQuiz&action=mondifQuiz&id="+id,
            method: "post"
        });

        $("<input></input>", {
            type: "text",
            name: "type",
            value: "quizname"
        }).appendTo(form);

        $("<input></input>", {
            type: "text",
            name: "name",
            value: name
        }).appendTo(form);
        form.appendTo("body");
        form.submit()
    }

})















document.getElementById("add-q-o").addEventListener("click", (e) => {
    document.getElementById("no-q").remove();
    first = false;
    add_q(e)
});