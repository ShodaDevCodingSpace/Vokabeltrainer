<?php
   session_start();
   $maxVocabs = isset($_SESSION['maxVocabs']) ? $_SESSION['maxVocabs'] : 0;
?>

<h1>Vokabeltrainer</h1>
<p>Du hast <?php echo $maxVocabs; ?> Vokabeln ausgewählt.</p>