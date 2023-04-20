<div id="particles-js"></div>
<section class="main">
    <section class="question">
        <div class="no-q" id="no-q" style="">
            <p>Pas de question sélectionnée</p>
            <div id="add-q-o">
                <i class="bi bi-plus-lg"></i>
            </div>
            <div>
                
            </div>
        </div>
    </section>
    <section class="quizz">
        <div id="image-color" class="image-color" style="--color:<?php echo $quiz->getCouleur() ?>">
            <div class="quiz-s">
                <div class="img-div">
                    <i id="img-svg" class="bi bi-card-image"></i>
                    <input id="file-i" class="input-f" type="file" name=""  accept="image/*">
                </div>
                <div class="color-div">
                    <i id="palette" class="bi bi-palette"></i>
                    <input id="color-p" class="color-p" type="color" name="">
                </div>
            </div>
            <div class="name-q">
                <input id="name" class="input-n" type="text" value="<?php echo $quiz->getTitreQuiz() ?>">
            </div>
        </div>
        <div class="q-list" id="q-list">
            <div class="q-div-btn none" id="template">
                <div class="img-q-list"></div>
                <div class="img-q-list d"></div>
                <div class="name-q-list">
                    <p >Question sans nom</p>
                </div>
                <div class="del-q-list" id="del">
                    <i class="bi bi-plus-lg"></i>
                </div>
            </div>
        </div>
        
        <div id="add-q">
            <!--<p>Nouvel Question</p>-->
            <i class="bi bi-plus-lg"></i>
        </div>
    </section>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="./js/module.js"></script>
<script src="./js/app_quiz.js"></script>
<script src="./assets/particles.js"></script>
<script src="./assets/app.js"></script>