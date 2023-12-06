
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

    public function displayInfo() {
        echo "App ID: " . $this->appid . "<br>";
        echo "Name: " . $this->name . "<br>";
        echo "Image Logo URL: " . $this->img_icon_url . "<br>";
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
    echo "Informazioni del Game " . ($index + 1) . ":<br>";
    $game->displayInfo();
    echo "<br>";
}
?>
