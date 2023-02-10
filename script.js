
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

document.getElementById("contenant_conn").addEventListener("click", async () => {
    document.getElementById("btn-invite").classList.add("disparait");
    await sleep(400)
    document.getElementById("btn-invite").classList.add("none");
    document.getElementById("contenant_conn").classList.add("disparait");
    await sleep(300)
    document.getElementById("contenant_conn").classList.add("none");
    document.getElementById("form_conn").classList.remove("none");
    await sleep(10)
    document.getElementById("pseudonim").classList.add("apparaitre");
    await sleep(600);
    document.getElementById("2ndpart").classList.remove("none");
    await sleep(50);
    document.getElementById("2ndpart").classList.add("apparaitre");
    await sleep(700);
    document.getElementById("btn-submit").classList.add("apparaitre")
    document.getElementById("btn-retour").classList.add("apparaitre")
    
    
})

document.getElementById("btn-retour").addEventListener("click", async function() {
    document.getElementById("btn-retour").classList.remove("apparaitre")
    document.getElementById("btn-submit").classList.remove("apparaitre")
    document.getElementById("2ndpart").classList.remove("apparaitre");
    document.getElementById("2ndpart").classList.add("none");
    document.getElementById("pseudonim").classList.remove("apparaitre");
    document.getElementById("form_conn").classList.add("none");
    document.getElementById("contenant_conn").classList.remove("none");
    document.getElementById("contenant_conn").classList.remove("disparait");
    document.getElementById("btn-invite").classList.remove("none");
    document.getElementById("btn-invite").classList.remove("disparait");
})