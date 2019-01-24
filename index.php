<?php include 'db.php';

$giocatori = generaDatabaseGiocatori(10); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="dist/Bootstrap4_1Extension.css">
  <link rel="stylesheet" href="dist/app.css">
  <title>php-Basket</title>
</head>
<body>
  <div id="main-container">
    <header >
      <i class="fas fa-basketball-ball"></i>
      <h1 class="white_text">TOP 100 <span>PLAYERS DATABASE<span></h1>
      <img src="dist/assets/hamburger.svg" class="positionAbsolute_centerRight">
    </header>
    <div class="controls_area">
      <div class="searchBar" onclick="gestisciInterazioneControlliRicerca()">
        <i class="fas fa-search"></i><span>Cerca</span>
      </div>
      <div class="searchAgain" onclick="gestisciInterazioneControlliRicerca()">
        <i class="fas fa-search"></i><span>Cerca di Nuovo</span>
      </div>
    </div>
    <div class="content">
      <div class="full_database" id="db">
        <?php foreach ($giocatori as $giocatore) { ?>
          <div class="player_card">
            <div class="card_header">
              <div class="player_id">
                <h2 class="">ID GIOCATORE: <?php echo $giocatore['id']; ?></h2>
              </div>
            </div>
            <div class="card_body">
              <ul class="player_stats player_<?php echo $giocatore['id']; ?>">
                <?php $statisticheGiocatore = $giocatore['statistiche']; ?>
                <?php foreach ($statisticheGiocatore as $nomeStatistica => $statistica) { ?>
                <li><span class="stat_key "><?php echo $nomeStatistica; ?> :</span> <?php echo $statistica; ?></li>
              <?php } ?>
              </ul>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  </body>
  </html>
