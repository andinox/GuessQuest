<div id="particles-js"></div>
<div id="containerProfil">
    <!--Passage du BLOB en base64-->
    <!--<img id="imgProfil" src="data:image/jpeg;base64,<?php echo base64_encode($pp); ?>" />   -->
    <img id="imgProfil" src="./img/profil.png">
    <section id="mainProfil">  
        <h1 id="pseudo"><?php echo $pseudo ?></h1>
        <div id="div_mdp">
            <div id="divLabelPwd">
                <p class="pwdProfil">Mot de passe :</p>
            </div>
            <div id="divModifPwd">
                <p id="passwordProfil"> ********* </p> 
                <button id="btnModifPwd">
                    <i class="bi bi-pencil-fill"></i>
                </button>
            </div>
        </div>
    </section>
</div>
<script src="./assets/particles.js"></script>
<script src="./assets/app.js"></script>
