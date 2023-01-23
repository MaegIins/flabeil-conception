<?php

namespace App\views;

use Slim\Container;

class MainView
{
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
            4 => $this->createaccount(),
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
                        height: 50%;
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
        $flowers = json_encode($this->tab[0]);
        $hives = json_encode($this->tab[1]);
        var_dump($flowers);
        var_dump($hives);

        $this->footerScripts = <<<HTML
                    <script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js"></script>
                    <script>
                        var flowers = $flowers;
                        var hives = $hives;
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

                        let flowerMarker = L.icon({
                        iconUrl: "/assets/fleur.png",
                        iconSize: [35, 41]
                        });

                        let hiveMarker = L.icon({
                        iconUrl: "/assets/ruche.png",
                        iconSize: [35, 41]
                        });
                
                        flowers.forEach(function (doc) {                        
                            L.marker([doc.x_coord, doc.y_coord], {icon: flowerMarker})
                            .addTo(map)
                            .bindPopup(
                            "<h5>"+doc.nom_fr+"</h5>"
                            +"<div class='d-flex flex-column align-items-center'>"
                            +"<a href='/flowers/"+doc.id_flower+"'>Voir la fiche</a>"
                            +"<br><img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://localhost:8080/flowers/"+doc.id_flower+"' alt='QR code' width=' 70rem'>"
                            +"</div>"
                            );
                        });

                        hives.forEach(function (doc) {                        
                            L.marker([doc.x_coord, doc.y_coord], {icon: hiveMarker})
                            .addTo(map)
                        });
                    </script>
HTML;
        return <<<HTML
			    <div id="map" style="height: 80vh; width: 100vw"></div>
HTML;
    }

    private function flower(): string
    {
        $flower = $this->tab[0];
        return <<<HTML
            <div class="container my-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="card">
                            <img src="/assets/img/$flower->photo" alt="Photo de la fleur" class="card-img-top img-fluid w-100">
                            <div class="card-body">
                                <h4 class="card-title">Nom Latin : $flower->nom_lat</h4>
                                <p class="card-text">Nom Français : $flower->nom_fr</p>
                                <p class="card-text">Hauteur : $flower->hauteur</p>
                                <p class="card-text">Floraison Couleur : $flower->flor_coul</p>
                                <p class="card-text">Emplacement jardin : $flower->empl_jardin</p>
                            </div>
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

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>



            <div class="container-fluid bg-white fixed-bottom" >
                <div class="row" style="height:10rem;">
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

    private function createaccount(): string
    {
        return <<<HTML
        
<style>
    :root {
  --color-white: #ffffff;
  --color-light: #f1f5f9;
  --color-black: #121212;
  --color-night: #001632;
  --color-red: #f44336;
  --color-blue: #1a73e8;
  --color-gray: #80868b;
  --color-grayish: #dadce0;
  --shadow-normal: 0 1px 3px 0 rgba(0, 0, 0, 0.1),
  	0 1px 2px 0 rgba(0, 0, 0, 0.06);
  --shadow-medium: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
  	0 2px 4px -1px rgba(0, 0, 0, 0.06);
  --shadow-large: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
  	0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

html {
  font-size: 100%;
  font-size-adjust: 100%;
  box-sizing: border-box;
  scroll-behavior: smooth;
}

*,
*::before,
*::after {
  padding: 0;
  margin: 0;
  box-sizing: inherit;
  list-style: none;
  list-style-type: none;
  text-decoration: none;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  font-size: 1rem;
  font-weight: normal;
  line-height: 1.5;
  color: var(--color-black);
  background: var(--color-light);
}

a,
button {
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
  cursor: pointer;
  border: none;
  outline: none;
  background: none;
  text-decoration: none;
}

img {
  display: block;
  width: 100%;
  height: auto;
  -o-object-fit: cover;
     object-fit: cover;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  max-width: 80rem;
  min-height: 100vh;
  width: 100%;
  padding: 0 2rem;
  margin: 0 auto;
}

.ion-logo-apple {
  font-size: 1.65rem;
  line-height: inherit;
  margin-right: 0.5rem;
  color: var(--color-black);
}
.ion-logo-google {
  font-size: 1.65rem;
  line-height: inherit;
  margin-right: 0.5rem;
  color: var(--color-red);
}
.ion-logo-facebook {
  font-size: 1.65rem;
  line-height: inherit;
  margin-right: 0.5rem;
  color: var(--color-blue);
}

.text {
  font-family: inherit;
  line-height: inherit;
  text-transform: unset;
  text-rendering: optimizeLegibility;
}
.text-large {
  font-size: 2rem;
  font-weight: 600;
  color: var(--color-black);
}
.text-normal {
  font-size: 1rem;
  font-weight: 400;
  color: var(--color-black);
}
.text-links {
  font-size: 1rem;
  font-weight: 400;
  color: var(--color-blue);
}
.text-links:hover {
  text-decoration: underline;
}

.main .wrapper {
  max-width: 28rem;
  width: 100%;
  margin: 2rem auto;
  padding: 2rem 2.5rem;
  border: none;
  outline: none;
  border-radius: 0.25rem;
  color: var(--color-black);
  background: var(--color-white);
  box-shadow: var(--shadow-large);
}
.main .wrapper .form {
  width: 100%;
  height: auto;
  margin-top: 2rem;
}
.main .wrapper .form .input-control {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 1.25rem;
}
.main .wrapper .form .input-field {
  font-family: inherit;
  font-size: 1rem;
  font-weight: 400;
  line-height: inherit;
  width: 100%;
  height: auto;
  padding: 0.75rem 1.25rem;
  border: none;
  outline: none;
  border-radius: 2rem;
  color: var(--color-black);
  background: var(--color-light);
  text-transform: unset;
  text-rendering: optimizeLegibility;
}
.main .wrapper .form .input-submit {
  font-family: inherit;
  font-size: 1rem;
  font-weight: 500;
  line-height: inherit;
  cursor: pointer;
  min-width: 40%;
  height: auto;
  padding: 0.65rem 1.25rem;
  border: none;
  outline: none;
  border-radius: 2rem;
  color: var(--color-white);
  background: var(--color-blue);
  box-shadow: var(--shadow-medium);
  text-transform: capitalize;
  text-rendering: optimizeLegibility;
}
.main .wrapper .striped {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  margin: 1rem 0;
}
.main .wrapper .striped-line {
  flex: auto;
  flex-basis: auto;
  border: none;
  outline: none;
  height: 2px;
  background: var(--color-grayish);
}
.main .wrapper .striped-text {
  font-family: inherit;
  font-size: 1rem;
  font-weight: 500;
  line-height: inherit;
  color: var(--color-black);
  margin: 0 1rem;
}
.main .wrapper .method-control {
  margin-bottom: 1rem;
}
.main .wrapper .method-action {
  font-family: inherit;
  font-size: 0.95rem;
  font-weight: 500;
  line-height: inherit;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: auto;
  padding: 0.35rem 1.25rem;
  outline: none;
  border: 2px solid var(--color-grayish);
  border-radius: 2rem;
  color: var(--color-black);
  background: var(--color-white);
  text-transform: capitalize;
  text-rendering: optimizeLegibility;
  transition: all 0.35s ease;
}
.main .wrapper .method-action:hover {
  background: var(--color-light);
}/*# sourceMappingURL=styleUser.css.map */
</style>
    
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">

    </head>
<main class="main">
	<div class="container">
		<section class="wrapper">
			<div class="heading">
				<h1 class="text text-large">Sign In</h1>
				<p class="text text-normal">New user? <span><a href="#" class="text text-links">Create an account</a></span>
				</p>
			</div>
			<form name="signin" class="form">
				<div class="input-control">
					<label for="email" class="input-label" hidden>Email Address</label>
					<input type="email" name="email" id="email" class="input-field" placeholder="Email Address">
				</div>
				<div class="input-control">
					<label for="password" class="input-label" hidden>Password</label>
					<input type="password" name="password" id="password" class="input-field" placeholder="Password">
				</div>
				<div class="input-control">
					<a href="#" class="text text-links">Forgot Password</a>
					<input type="submit" name="submit" class="input-submit" value="Sign In" disabled>
				</div>
			</form>
			<div class="striped">
				<span class="striped-line"></span>
				<span class="striped-text">Or</span>
				<span class="striped-line"></span>
			</div>
			<div class="method">
				<div class="method-control">
					<a href="#" class="method-action">
						<i class="ion ion-logo-google"></i>
						<span>Sign in with Google</span>
					</a>
				</div>
				<div class="method-control">
					<a href="#" class="method-action">
						<i class="ion ion-logo-facebook"></i>
						<span>Sign in with Facebook</span>
					</a>
				</div>
				<div class="method-control">
					<a href="#" class="method-action">
						<i class="ion ion-logo-apple"></i>
						<span>Sign in with Apple</span>
					</a>
				</div>
			</div>
		</section>
	</div>
</main>
</body>
HTML;
    }
}
