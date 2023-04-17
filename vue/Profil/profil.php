<div id="particles-js"></div>
<div id="containerProfil">
    <!--Passage du BLOB en base64-->
    <img id="imgProfil" src="data:image/jpeg;base64,<?php echo base64_encode($pp); ?>" />   
    <section id="mainProfil"> 
        <h1 id="pseudo"><?php echo $pseudo ?></h1>
        <div id="div_mdp">
            <p class="pwdProfil">Mot de passe :</p>
            <div id="divModifPwd">
                <input type="password" id="passwordProfil" class="pwdProfil" name="password" value=<?php echo $mdp ?>>   
                <button id="btnModifPwd" class="pwdProfil"></button>
            </div>
        </div>
    </section>
</div>
<script src="./assets/particles.js"></script>
<script src="./assets/app.js"></script>
