<section id="mainContainerQuiz">
    <div id="containerQuizInfo">
        <div id="info-quiz">
            <p> <?php echo $titre; ?></p>
        </div>
    </div>
    <div id="containerQuiz">
        <div id="QuestionQuiz">
            <h2><?php echo $tabTxtQuestions[0]; ?></h2>
            <img class="imgQuestion" src="data:image/jpeg;base64,<?php echo base64_encode($tabImagesQuestions[0]); ?>"/>
        </div>
        <div id="sectionReponseQuiz">
            <button class="btn-reponse"><p>Reponse 1 : <?php echo $tabTxtReponse[0]; ?></p></button>
            <button class="btn-reponse"><p>Reponse 2 : <?php echo $tabTxtReponse[1]; ?></p></button>
            <button class="btn-reponse"><p>Reponse 3</p></button>
            <button class="btn-reponse"><p>Reponse 4</p></button>
        </div>
    </div>
</section>