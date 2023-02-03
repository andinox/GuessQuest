
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

document.getElementById("contenant_conn").addEventListener("click", async () => {
    document.getElementById("contenant_conn").classList.add("none");
    document.getElementById("form_conn").classList.remove("none");
   // await sleep(200)
    document.getElementById("pseudonim").classList.remove("invi");
    await sleep(400);
    document.getElementById("2ndpart").classList.add("test2");
    await sleep(400);
    document.getElementsByClassName("valide")[0].classList.remove("validew")
})