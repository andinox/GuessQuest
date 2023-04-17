function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

let contentLastTest = ""
let typeOfConnection = false; //1 = connection 2=invited
$(".btn-c").click(async () => {
    typeOfConnection = 1
    anime({
        targets: ".btn-i",
        height: 100,
        opacity: 0,
        easing: 'easeInOutExpo',
        duration: 300
    })
    anime({
        targets: ".btn-c",
        opacity: 0,
        delay: 300,
        duration: 100,
        easing: 'linear'
    })
    await sleep(500)
    $(".btn-i").addClass("none")
    $(".btn-c").addClass("none")
    $(".name-i").removeClass("none")
    $(".pass-i").removeClass("none")
    $(".valide").removeClass("none")
    anime({
        targets: ".name-i",
        opacity: 1,
        easing: 'linear',
        duration: 100
    })
    anime({
        targets: ".pass-i",
        translateX: {
            value: '-50%',
            duration: 1
        },
        opacity: 1,
        translateY: '58%',
        easing: 'easeInOutExpo',
        duration: 500,
        delay: 100
    })
    anime({
        targets: ".valide",
        translateX: {
            value: '-50%',
            duration: 1
        },
        opacity: 1,
        translateY: '165%',
        easing: 'easeInOutExpo',
        duration: 500,
        delay: 100
    })


})
$(".btn-i").click(async () => {
    typeOfConnection = 2
    anime({
        targets: ".btn-i",
        height: 100,
        opacity: 0,
        easing: 'easeInOutExpo',
        duration: 300
    })
    anime({
        targets: ".btn-c",
        opacity: 0,
        delay: 300,
        duration: 100,
        easing: 'linear'
    })

    await sleep(500)
    $(".btn-i").addClass("none")
    $(".btn-c").addClass("none")
    $(".name-i").removeClass("none")
    $(".valide").removeClass("none")
    anime({
        targets: ".name-i",
        opacity: 1,
        easing: 'linear',
        duration: 100
    })
    anime({
        targets: ".valide",
        translateX: {
            value: '-50%',
            duration: 1
        },
        opacity: 1,
        translateY: '58%',
        easing: 'easeInOutExpo',
        duration: 500,
        delay: 100
    })
})

$(".valide").click(
    async () => {
        var mdp = $("#mdp-c").val()
        var name = $("#name-c").val()
        switch (typeOfConnection) {
            case 1:
                const url = './api/checkmdp.php?name=' + encodeURIComponent(name) + '&mdp=' + encodeURIComponent(mdp);

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        // Traiter la réponse JSON
                        if (data.valide) {
                            var form = $('<form></form>');
                            form.attr('method', 'post');
                            form.attr('action', './index.php?controleur=ControleurConnexion&action=connecterUtilisateur');

                            var inputPseudo = $(`<input type="text" name="pseudo" value=${name}>`);
                            var inputMdp = $(`<input type="password" name="mdp" value=${mdp}>`);
                            form.append(inputPseudo);
                            form.append(inputMdp);
                            $("body").append(form)
                            form.submit();
                        } else {
                            const options = {
                                content: "C'est Incorrect !",
                                showOnCreate: true,
                                animation: "rotate",
                                arrow: true,
                                theme: 'wrong',
                                trigger: 'manual',
                                placement: 'bottom',
                                delay: [500, 0],
                                duration: 5
                            };
                            tippy(".valide", options);
                        }
                    })
                    .catch(error => {
                        // Gérer les erreurs de requête
                        console.error(error);
                    });
                break
            case 2:
                console.log(mdp,name)
                break
        }
    }
)