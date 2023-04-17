$("#btnSubmitCreaCompte").click(function(e) {
    var pseudo = $("#pseudo").val();
    const url ="./api/checkPseudo.php?pseudo=" +encodeURIComponent(pseudo);
    fetch(url)
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if(data.valide){
            const options = {
                content: "Pseudo déjà utilisé",
                showOnCreate: true,
                animation: "rotate",
                arrow: true,
                placement:"right",
                theme: 'wrong',
                trigger: 'manual',
                delay: [500, 0],
                duration: 5
            };
            tippy("#pseudo", options);
        }else{
            $(".form_creeCompte").submit();
        }
    })
    .catch(error => {});
})