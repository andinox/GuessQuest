function hexToRgb(hex) {
    // Supprime le dièse (#) de la couleur hexadécimale
    hex = hex.replace('#', '');

    // Sépare la couleur hexadécimale en ses composants rouge, vert et bleu
    var r = parseInt(hex.substring(0, 2), 16);
    var g = parseInt(hex.substring(2, 4), 16);
    var b = parseInt(hex.substring(4, 6), 16);

    // Retourne la valeur RVB sous forme d'objet
    return { r: r, g: g, b: b };
}


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