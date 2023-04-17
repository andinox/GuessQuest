<div id="particles-js"></div>
<div id="containerProfil">
    <!--Passage du BLOB en base64-->
    <img id="imgProfil" src="data:image/jpeg;base64,<?php echo base64_encode($pp); ?>" />   
    <section id="mainProfil"> 
        <div id="pseudo">
            <h1><?php echo $pseudo ?></h1>
        </div>
    </section>
</div>
<script src="./assets/particles.js"></script>
<script src="./assets/app.js"></script>
