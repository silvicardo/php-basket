
<?php
#PHP DATABASE

function generaStatistiche() {
  $statistiche = [
    "rimbalzi" => rand(1,30),
    "falli" => rand(0, 5)
  ];

  $statisticaCreata = false;

  while ($statisticaCreata != true) {
    //Genero Punteggio Totale Casuale
    $statistiche['punteggioPartita'] = rand(20,80);

    //Genero una percentuale tiri da 3 riuscita
    $percentualeTiriDa3Casuale = rand(30,60);

    //Calcolo punti fatti con tiri da 3 e 2 ad Intero
    $puntiTiriDa3ConPerScelta = intval($statistiche['punteggioPartita'] / 100 * $percentualeTiriDa3Casuale);
    $tiriDa2Sottratti = $statistiche['punteggioPartita'] - $puntiTiriDa3ConPerScelta;

    if ($puntiTiriDa3ConPerScelta % 3 == 0) {
      if ($tiriDa2Sottratti % 2 == 0) {
        $statisticaCreata = true;
      }
    }
  }

  $statistiche["tiriDa3Riusciti"] = ($puntiTiriDa3ConPerScelta / 3);
  $statistiche["tiriDa2Riusciti"] = ($tiriDa2Sottratti / 2);
  $statistiche["puntiConTiriDa3Riusciti"] = ($puntiTiriDa3ConPerScelta);
  $statistiche["puntiConTiriDa2Riusciti"] = ($tiriDa2Sottratti);
  $statistiche["percentualeTiriDa3InPartita"] = ($percentualeTiriDa3Casuale .'%');
  $statistiche["percentualeTiriDa2InPartita"] = ((100 - $percentualeTiriDa3Casuale) . '%');

  return $statistiche;


}



?>
