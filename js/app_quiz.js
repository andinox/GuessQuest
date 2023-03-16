
const inputElement = document.querySelector('input[type="file"]');
const imageColorElement = document.querySelector('#image-color');


document.getElementById("color-p").addEventListener("input", function(e) {
    imageColorElement.style.backgroundImage = "none"
    var palette = document.getElementById("palette");
    var img = document.getElementById("img-svg")
    document.getElementById("image-color").style.backgroundColor = this.value;
})

document.getElementById("add-q").addEventListener('click', (event)=> {
    var question_list = document.getElementById("q-list");
    var unknow_q = document.getElementById("template").cloneNode(true)
    console.log(unknow_q.childNodes[1])
    unknow_q.childNodes[1].style.backgroundColor = getRandomHexColor()
    unknow_q.style.display = "flex";
    question_list.appendChild(unknow_q);
})




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