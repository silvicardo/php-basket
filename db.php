
<?php
#PHP DATABASE

function generaDatabaseGiocatori($nrGiocatori) {
  $arrayGiocatori = [];

  $arrayId = generaIdCasualiDifferentiPer($nrGiocatori);

  for ($i = 0; $i < count($arrayId); $i++) {

    $arrayGiocatori[] = generaNuovoOggettoGiocatoreRandomCon($arrayId[$i]);

  }

  return $arrayGiocatori;
}


function databaseContiene($database, $id) {

  for ($i = 0; $i < count($database); $i++) {
    if ($database[$i]["id"] == $id) {
      return $i;
    }
  }

  return -1;
}

function generaIdCasualiDifferentiPer($totaleId) {

  $arrayId = [];

  while (count($arrayId) <= ($totaleId - 1)) {
    $numeriCasuali = rand(100, 999);
    $stringaCasuale = generaStringaConLettereCasuali(3);

    $idCandidato = $stringaCasuale . $numeriCasuali;

    if (in_array($idCandidato, $arrayId) === false) {
      $arrayId[] = $idCandidato;
    }
  }

  return $arrayId;
}

function generaStringaConLettereCasuali($numeroCaratteri) {
  $alfabeto = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","u","v","w","x","y","z"];

  $stringaRisultato = "";

  for ($i = 0; $i < $numeroCaratteri; $i++) {
    $indice = rand(0, (count($alfabeto) - 1));
    $stringaCasuale = $alfabeto[$indice];
    $letteraCasualeUppercased = ucwords($stringaCasuale);
    $stringaRisultato = $stringaRisultato . $letteraCasualeUppercased ;

  }
  return $stringaRisultato;
}

function generaNuovoOggettoGiocatoreRandomCon($id) {

  $nuovoGiocatore = [
    "id" => $id,
  ];

  $nuovoGiocatore['statistiche'] = generaStatistiche();

  return $nuovoGiocatore;
}

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
