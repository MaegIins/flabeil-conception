<?php

namespace App\views;

use Slim\Container;

class MainView {
    public array $tab;
    public Container $container;
    public string $footerScripts;

    public function __construct(array $tab, Container $container)
    {
        $this->tab = $tab;
        $this->container = $container;
        $this->footerScripts = '';
    }

    public function render($selector): string
    {
        $content = match ($selector) {
            0 => $this->map(),
            1 => $this->collection(),
            2 => $this->scannerQR(),
            3 => $this->flower(),
            default => "selector inconnu de render",
        };

        return <<<HTML
			<!DOCTYPE html>
			<html lang="fr">
				<title>Flabeil</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <link
                    rel="stylesheet"
                    type="text/css"
                    href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css"
                />
                <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
                <style> 
                    .container-fluid.bg-white .col-4 {
                        border: 2px solid #FECE44;
                        background-color: #F9E79F;
                    }

                    .collectionPoint {
                        margin-bottom: 10%;
                    }

                    svg{
                        width: 10%;
                    }
                </style>
				<body>
					<header class="header bg-dark">
                        <div class="row w-100" style="height: 5rem;">
                            <div class="col-10 h-100">
                                <a href="/"><img src="/assets/LogoFlabeil.png" alt="logo" class="h-100 p-2"></a>
                            </div>
                            <div class="col-2 h-100 d-flex justify-content-center align-items-center">
                                <img src="/assets/profil_icon.png" alt="logo" class="h-75">
                            </div>
                        </div>
                    </header>
						$content
				</body>
                <footer>
                    $this->footerScripts
                </footer>
			</html>
HTML;
    }

    private function map(): string
    {
        $collection = json_encode($this->tab[0]);
        $this->footerScripts = <<<HTML
                    <script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js"></script>
                    <script>
                        var collection = $collection;
                            // Map, start position and zoom level
                        var map = L.map("map").setView([48.66, 6.155], 16);
                        // Limit of map
                        map.setMaxBounds([
                        [48.664218, 6.150820],
                        [48.657579, 6.159649]
                        ]);
                        // Minimal zoom level
                        map.setMinZoom(16);

                        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                        attribution:
                            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                        }).addTo(map);

                        let redMarker = L.icon({
                        iconUrl: "https://github.com/pointhi/leaflet-color-markers/blob/master/img/marker-icon-red.png?raw=true",
                        iconSize: [25, 41]
                        });
                
                        collection.forEach(function (doc) {                        
                            L.marker([doc.x_coord, doc.y_coord], {icon: redMarker})
                            .addTo(map)
                            .bindPopup(
                            "<h5>"+doc.nom_fr+"</h5>"
                            +"<div class='d-flex flex-column align-items-center'>"
                            +"<a href='/flowers/"+doc.id_flower+"'>Voir la fiche</a>"
                            +"<br><img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://localhost:8080/flowers/"+doc.id_flower+"' alt='QR code' width=' 70rem'>"
                            +"</div>"
                            );
                        });
                    </script>
HTML;
        return <<<HTML
			    <div id="map" style="height: 80vh; width: 100vw"></div>
HTML;
    }

    private function flower() : string {
        $flower = $this->tab[0];
        return <<<HTML
            <div class="container my-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="/assets/img/$flower->photo" alt="Photo de la fleur" class="img-fluid w-100">
                        <div class="mt-3">
                            <h4>Nom Latin : </h4>
                            <p>$flower->nom_lat</p>
                            <h4>Nom Français</h4>
                            <p>$flower->nom_fr</p>
                            <h4>Hauteur</h4>
                            <p>$flower->hauteur</p>
                            <h4>Floraison Couleur</h4>
                            <p>$flower->flor_coul</p>
                            <h4>Emplacement jardin</h4>
                            <p>$flower->empl_jardin</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collectionPoint mx-3 mb-3">
                <hr style="border-top: 1px solid black;">
                <div class="row">
                    <div class="col-4 text-center">
                        <h5>Miellat</h5> 
                        <p>$flower->miellat</p>
                    </div>
                    <div class="col-4 text-center">
                        <h5>Pollen</h5>
                        <p>$flower->pollen</p>
                    </div>
                    <div class="col-4 text-center">
                        <h5>Nectar</h5>
                        <p>$flower->nectar</p>
                    </div>
                </div>
            </div>


            <div class="container-fluid bg-white">
                <div class="row">
                    <div class="col-4 text-center py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M384 476.1L192 421.2V35.9L384 90.8V476.1zm32-1.2V88.4L543.1 37.5c15.8-6.3 32.9 5.3 32.9 22.3V394.6c0 9.8-6 18.6-15.1 22.3L416 474.8zM15.1 95.1L160 37.2V423.6L32.9 474.5C17.1 480.8 0 469.2 0 452.2V117.4c0-9.8 6-18.6 15.1-22.3z" />
                        </svg>
                        <p class="my-2">Carte</p>
                    </div>
                    <div class="col-4 text-center py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M48 32C21.5 32 0 53.5 0 80v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H48zm80 64v64H64V96h64zM48 288c-26.5 0-48 21.5-48 48v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V336c0-26.5-21.5-48-48-48H48zm80 64v64H64V352h64zM256 80v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H304c-26.5 0-48 21.5-48 48zm64 16h64v64H320V96zm32 352v32h32V448H352zm96 0H416v32h32V448zM416 288v32H352V288H256v96 96h64V384h32v32h96V352 320 288H416z" />
                        </svg>
                        <p class="my-2">QR Code</p>
                    </div>
                    <div class="col-4 text-center py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M256 512C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256s-114.6 256-256 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                        </svg>
                        <p class="my-2">Horloge</p>
                    </div>
                </div>
            </div>
HTML;
    }

    private function scannerQR(): string
    {
        $home = $this->container->router->pathFor('home');
        $launcherJS = $home . "resources/js/launcher.js";
        $action = $this->container->router->pathFor('lecture_qr');
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        //error_reporting(0);
        return <<<HTML
			<h2>Scanner un QR code</h2>
			<div id='QRscanner'>
			<p id='info'><i class="material-icons">info</i>Reculez un peu, seul le centre du flux est utilisé pour la lecture.</p>
			<video id='video'></video>
			<form hidden method='post' id='scanner-form' name='scanner_form' action='$action'>
				<input id='qr-data' type='hidden' name='data' value=''><!-- contiendra le contenu du QR sous forme de tableau serialisé -->
			</form>
			</div>
			<script type="module" src="$launcherJS"></script>
HTML;
    }
}