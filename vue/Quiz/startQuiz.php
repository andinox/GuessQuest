<div id="containerStartQuiz">
    <section id="sectionStartQuiz">
        <div id="fondQuiz" style="<?php if (!empty($imgQuiz)) : ?>background-image: url('data:image/jpeg;base64,<?php echo base64_encode($imgQuiz);?>');<?php else : ?>background-color: <?php $couleur;?>; height: 15%<?php endif; ?>"></div>
        <div id="mainStartQuiz">
            <div id="titreStartQuiz">
                <h1><?php echo $titre; ?></h1>
            </div>
            <div id="containerJoueurScore">
                <div id="listeJoueurs">
                    <h2 class="lblJoueurScore">Joueur(s) :</h2>
                    <ul>
                        <li class="profilJoueur"><img class="imgJoueur" src="<?php echo $imgUser; ?>"/><?php echo $pseudo; ?></li>
                    </ul>
                </div>
                <div id="scoreJoueur">
                    <h2 class="lblJoueurScore">Votre score : </h2>
                    <?php echo "<p id='score-question'>".$txtScore."</p>"; ?>
                </div>
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
