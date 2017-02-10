<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\CustomHelpers\UserHelpers;

$this->title = 'Σχετικά';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1><br>
    <div class="row" style="font-size: 15px;">
        <div class="col-sm-6 ">
            <p>
                Το παρών σύστημα διαχείρισης διπλωματικών αποτελεί μέρος της διπλωματικής του <b>Γεώργιου Λιναρδή</b> μεταπτυχιακού φοιτητή στο Πανεπιστήμιο Αιγαίου.<br></p>
            Το Πρόγραμμα Μεταπτυχιακών σπουδών ανήκει στο Τμήμα Μηχανικών Πληροφοριακών και Επικοινωνιακών συστημάτων και έχει τίτλο
            <a href="http://msc.icsd.aegean.gr/academics/pms4-2016/" title="Msc Website" target="_blank">"Πληροφοριακά και Επικοινωνιακά Συστήματα"</a><br>
            . <br>Η δημιουργία της διπλωματικής πραγματοποιήθηκε το ακαδημαΐκό έτος 2016/2017.<br><br>
            Για την ολοκλήρωση της χρησιμοποιήθηκαν οι οι εξής τεχνολογίες:
            <b><ul >
                    <li> <a href="http://www.yiiframework.com/doc-2.0/index.html" title="Yii2 site" target="_blank">Yii 2 framework</a></li>
                    <li> <a href="https://v4-alpha.getbootstrap.com/" title="Bootstrap 4 site" target="_blank">Bootstrap 4</a></li>
                    <li> <a href="https://www.w3.org/TR/html5/" title="W3 Org - Html site" target="_blank">Html 5</a></li>
                    <li> <a href="https://www.mysql.com/" title="Mysql site" target="_blank">Βάσεις δεδομένων - MYSQL</a></li>
                    <li> <a href="https://www.w3.org/TR/2001/WD-css3-roadmap-20010523/" title="W3 Org CSS site" target="_blank">CSS 3</a></li>
                </ul></b>

            <br>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <b>Επιβλέπων καθηγητής:</b><br>
            <ul >
                <li> <b><a href="http://www.icsd.aegean.gr/mmarag/" title="Manolis Maragkoudakis site" target="_blank">Μανώλης Μαραγκουδάκης</a></b>.<br><br></li>
            </ul>

            <b>Μέλη της Επιτροπής ήταν οι κύριοι καθηγητές:</b><br>
            <b><ul >
                    <li> <a href="http://www.icsd.aegean.gr/lecturers/cskianis/" title="Skianis Charalampos site" target="_blank">Σκιάνης Χαράλαμπος</a></li>
                    <li> <a href="http://www.icsd.aegean.gr/mmarag/" title="Maragkoudakis Manolis site" target="_blank">Μαραγκουδάκης Μανώλης</a></li>
                    <li> <a href="http://www.icsd.aegean.gr/ddrosos" title="Drosos Dimitrios site" target="_blank">Δρόσος Δημήτριος</a></li>
                </ul></b>
        </div>
    </div>





</div>
