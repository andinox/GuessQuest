
const inputElement = document.querySelector('input[type="file"]');
const imageColorElement = document.querySelector('#image-color');
let nb_question = 0;

document.getElementById("color-p").addEventListener("input", function(e) {
    imageColorElement.style.backgroundImage = "none"
    var palette = document.getElementById("palette");
    var img = document.getElementById("img-svg")
    document.getElementById("image-color").style.backgroundColor = this.value;
    if (hexToRgb(this.value).b <= 50) {
      document.getElementById("name").style.color = "white"
    } else {
      document.getElementById("name").style.color = "black"
    }
})

document.getElementById("add-q").addEventListener('click', (event)=> {
    nb_question++
    var question_list = document.getElementById("q-list");
    var unknow_q = document.getElementById("template").cloneNode(true)
    console.log(unknow_q.childNodes[1])
    unknow_q.childNodes[1].style.backgroundColor = getRandomHexColor()
    unknow_q.style.display = "flex";
    unknow_q.addEventListener("click", (event)=>{
      console.log(event.target)
      if (event.target.classList != null && event.target.classList.contains("bi")) {
        unknow_q.remove();
      } else {
        var t = document.getElementsByClassName("choised");
        if (t.length != 0) {
          t[0].classList.remove("choised");
        }
        unknow_q.classList.add("choised")
        
      }
    })

    question_list.appendChild(unknow_q);
})

function hexToRgb(hex) {
  // Supprime le dièse (#) de la couleur hexadécimale
  hex = hex.replace('#', '');

  // Sépare la couleur hexadécimale en ses composants rouge, vert et bleu
  var r = parseInt(hex.substring(0, 2), 16);
  var g = parseInt(hex.substring(2, 4), 16);
  var b = parseInt(hex.substring(4, 6), 16);

  // Retourne la valeur RVB sous forme d'objet
  return {r: r, g: g, b: b};
}




inputElement.addEventListener('change', (event) => {
  const file = event.target.files[0];

  if (file && file.type.startsWith('image/')) {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
      // Mettre à jour l'arrière-plan de l'élément avec l'ID "image-color"
      imageColorElement.style.backgroundImage = `url(${reader.result})`;
    };
  }
});


function getRandomHexColor() {
  // Génère une couleur hexadécimale de manière aléatoire
  var hex = Math.floor(Math.random() * 16777215).toString(16);
  // Ajoute des zéros à gauche si nécessaire pour avoir 6 chiffres hexadécimaux
  while (hex.length < 6) {
    hex = "0" + hex;
  }
  // Retourne la couleur hexadécimale
  return "#" + hex;
}