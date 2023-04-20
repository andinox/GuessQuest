<div id="particles-js"></div>
<div id="containerProfil">
    <!--Passage du BLOB en base64-->
    <img id="imgProfil" class="profil-img" src="<?php echo $imgData; ?>"/>
    <section id="mainProfil">  
        <h1 id="pseudoProfil"><?php echo $pseudo ?></h1>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="./js/profil.js"></script>
<script src="./assets/particles.js"></script>
<script src="./assets/app.js"></script>
