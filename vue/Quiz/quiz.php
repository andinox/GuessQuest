<section id="mainContainerQuiz">
    <div id="containerQuizInfo">
        <div id="info-quiz">
            <p id="titreQuiz"> <?php echo $titreQuiz; ?></p>
            <p id="idQuiz"> <?php echo $idQuiz; ?></p>
        </div>
    </div>
    <div id="containerQuiz">
        <div id="QuestionQuiz">
            <h2 id="txtQuestion">Je suis la question</h2>
            <!--<img class="imgQuestion" src="data:image/jpeg;base64,..."/>-->
        </div>
        <div id="sectionReponseQuiz">
            <button class="btn-reponse"><p>Reponse 1 :</p></button>
            <button class="btn-reponse"><p>Reponse 2 :</p></button>
            <button class="btn-reponse"><p>Reponse 3</p></button>
            <button class="btn-reponse"><p>Reponse 4</p></button>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="./js/quiz.js"></script>