
const inputElement = document.querySelector('input[type="file"]');
const imageColorElement = document.querySelector('#image-color');


document.getElementById("color-p").addEventListener("input", function(e) {
    imageColorElement.style.backgroundImage = "none"
    var palette = document.getElementById("palette");
    var img = document.getElementById("img-svg")
    document.getElementById("image-color").style.backgroundColor = this.value;
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