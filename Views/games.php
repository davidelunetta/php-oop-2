

<?php

class Games {
    public $appid;
    public $name;
    public $img_icon_url;

    public function __construct($appid, $name, $img_icon_url) {
        $this->appid = $appid;
        $this->name = $name;
        $this->img_icon_url = $img_icon_url;
    }
    public function displayCard() {
        echo '<div class="row">';
        echo '<div class="col-md-4">';
        echo '<div class="card" style="width: 18rem; margin-bottom: 20px;">'; // Aggiunto l'apice mancante
        echo '<img src="' . $this->img_icon_url . '" alt="' . $this->name . ' Logo">'; // Corretto lo spazio dopo l'URL dell'immagine
        echo '<div class="card-info">';
        echo '<h2>ID: ' . $this->appid . '</h2>';
        echo '<p>Name: ' . $this->name . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
}
}
// Leggi il file JSON
$json_data = file_get_contents('./Model/steam_db.json');

// Decodifica il JSON in un array associativo
$games_array = json_decode($json_data, true);

// Creazione degli oggetti Games dal JSON
$games = [];
foreach ($games_array as $game_data) {
    $game = new Games($game_data['appid'], $game_data['name'], $game_data['img_icon_url']);
    $games[] = $game;
}

// Stampare le informazioni dei giochi
foreach ($games as $index => $game) {
    // echo "Informazioni del Game " . ($index + 1) . ":<br>";
    $game->displayCard();
    echo "<br>";
}
?>
