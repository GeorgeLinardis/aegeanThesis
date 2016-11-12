    <div class="text-center"><h1>Οι διπλωματικές σας </h1></div><br />

    <div class="row">
        <div class="col-sm-3 text-center">
            <a href="<?php echo Yii::$app->createUrl('professor/thesiscreate')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-creation(bluediamondgallery).jpg" alt="Create NEW Thesis">
            </a>
            <div style="text-align: center ;font-weight: bold;"> Δημιουργία νέας διπλωματικής</div>
        </div>

        <div class="col-sm-3 text-center">
            <a href="<?php echo Yii::$app->createUrl('professor/thesisview')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-under-construction(pexels).jpeg" alt="Manage Thesis">
            </a>
            <div style="text-align: center ;font-weight: bold;"> Τρέχουσες διπλωματικές</div>
        </div>

        <div class="col-sm-3 text-center">
            <a href="<?php echo Yii::$app->createUrl('professor/thesiscommittee')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-committee(bluediamondgallery).jpg" alt="Committee Thesis">
            </a>
            <div style="text-align: center ;font-weight: bold;" id="title-diplomatikes"> Προς την Επιτροπή</div>
        </div>

        <div class="col-sm-3 text-center">

            <a href="<?php echo Yii::$app->createUrl('professor/thesispast')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-past-thesis(pixabay).jpg" alt="OLD Thesis">
            </a>
            <div style="text-align: center ;font-weight: bold;" id="title-diplomatikes"> Διπλωματικές στο παρελθόν</div>

        </div>




    </div>


