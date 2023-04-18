<div id="containerStartQuiz">
    <section id="sectionStartQuiz">
        <div id="fondQuiz"><img id="imgFond" src=""></div>
        <div id="mainStartQuiz">
            <div id="titreStartQuiz">
                <h1><?php echo $titre; ?></h1>
            </div>
            <div id="listeJoueurs">
                <h2>Joueur(s) :</h2>
                <ul>
                    <li><img class="imgJoueur" src="data:image/jpeg;base64,<?php echo $imgUser; ?>" /><?php echo $pseudo; ?></li>
                </ul>
            </div>
        </div>
    </section>
    <div id="menuBtnStartQuiz">
        <button class="btnStartQuiz" id="startBtnStartQuiz">Commencer <i class="bi bi-skip-start-fill"></i></button>
        <button class="btnStartQuiz" id="exitBtnStartQuiz">Quitter <i class="bi bi-x-circle"></i></button>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="./js/startQuiz.js"></script>
