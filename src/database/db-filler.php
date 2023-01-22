<?php 
$flowers = [];

$db = (new MongoDB\Client('mongodb://mongo'))->selectDatabase('flabeilDB');
$db->createCollection('flowers');
$db = $db->selectCollection('flowers');

    $flowers[] =
    [
      'id_flower'=> 1,
      'x_coord'=> 48.661263,
      'y_coord'=> 6.154048,
      'nom_lat'=> 'Acer campestris',
      'nom_fr'=> 'érable champêtre',
      'hauteur'=> '15m',
      'nectar'=> 3,
      'pollen'=> 2,
      'miellat'=> 'M',
      'flor_coul'=> ',avril,mai,vert clair',
      'empl_jardin'=> 'collection historique',
      'photo'=> 'acer_campestre.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 2,
      'x_coord'=> 48.659963,
      'y_coord'=> 6.156221,
      'nom_lat'=> 'Acer pseudoplatanus',
      'nom_fr'=> 'érable sycomore',
      'hauteur'=> '25m',
      'nectar'=> 2,
      'pollen'=> 2,
      'miellat'=> '',
      'flor_coul'=> 'mai,jaunâtre',
      'empl_jardin'=> 'forêt',
      'photo'=> 'acer_pseudoplatanus.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 3,
      'x_coord'=> 48.662204,
      'y_coord'=> 6.155286,
      'nom_lat'=> 'Alnus glutinosa',
      'nom_fr'=> 'aulne glutineux',
      'hauteur'=> '25m',
      'nectar'=> 1,
      'pollen'=> 2,
      'miellat'=> 'M',
      'flor_coul'=> 'mars avril,jaune',
      'empl_jardin'=> 'étang',
      'photo'=> 'alnus_glutinosa.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 4,
      'x_coord'=> 48.661444,
      'y_coord'=> 6.153969,
      'nom_lat'=> 'Aquilegia vulgaris',
      'nom_fr'=> 'ancolie',
      'hauteur'=> '0.50m',
      'nectar'=> 2,
      'pollen'=> 3,
      'miellat'=> '',
      'flor_coul'=> 'mai,juin bleu',
      'empl_jardin'=> 'collection historique',
      'photo'=> 'aquilegia_vulgaris.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 5,
      'x_coord'=> 48.66108,
      'y_coord'=> 6.154309,
      'nom_lat'=> 'Asclépias syriaca',
      'nom_fr'=> 'herbe à la ouate',
      'hauteur'=> '1,50m',
      'nectar'=> 3,
      'pollen'=> 1,
      'miellat'=> '',
      'flor_coul'=> 'juin,juillet,août mauve',
      'empl_jardin'=> 'collection ornementale',
      'photo'=> 'asclepias_syriaca.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 6,
      'x_coord'=> 48.66112,
      'y_coord'=> 6.154344,
      'nom_lat'=> 'Berberis vulgaris',
      'nom_fr'=> 'épine vinette',
      'hauteur'=> '2m',
      'nectar'=> 2,
      'pollen'=> 1,
      'miellat'=> '',
      'flor_coul'=> ',juin,juillet,jaune',
      'empl_jardin'=> 'secteur arboretum Chine',
      'photo'=> 'berberis_vulgaris.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 7,
      'x_coord'=> 48.661363,
      'y_coord'=> 6.154031,
      'nom_lat'=> 'Borago officinalis',
      'nom_fr'=> 'bourrache officinalis',
      'hauteur'=> '0.5m',
      'nectar'=> 3,
      'pollen'=> 2,
      'miellat'=> '',
      'flor_coul'=> 'juin,juillet,août,bleu tendre',
      'empl_jardin'=> 'collection historique',
      'photo'=> 'borago_officinalis.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 8,
      'x_coord'=> 48.661634,
      'y_coord'=> 6.15427,
      'nom_lat'=> 'brassica arvensis',
      'nom_fr'=> 'moutarde des champs',
      'hauteur'=> '0.6 m                   3',
      'nectar'=> 3,
      'pollen'=> 1,
      'miellat'=> '',
      'flor_coul'=> 'juin,juillet,août jaune',
      'empl_jardin'=> 'collection historique',
      'photo'=> 'brassica_arvensis.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 9,
      'x_coord'=> 48.659513,
      'y_coord'=> 6.155451,
      'nom_lat'=> 'Calluna vulgaris',
      'nom_fr'=> 'bruyère commune callune',
      'hauteur'=> '0.15,0.30m',
      'nectar'=> 2,
      'pollen'=> 1,
      'miellat'=> '',
      'flor_coul'=> 'août,blanc,rose',
      'empl_jardin'=> 'secteur terre de bruyère',
      'photo'=> 'calluna_vulgaris.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 10,
      'x_coord'=> 48.661911,
      'y_coord'=> 6.157033,
      'nom_lat'=> 'Corylus colurna',
      'nom_fr'=> 'noisetier de Bysance',
      'hauteur'=> '10,15m',
      'nectar'=> 0,
      'pollen'=> 1,
      'miellat'=> '',
      'flor_coul'=> 'fevrier,mars,jaune',
      'empl_jardin'=> 'secteur arboretum Europe',
      'photo'=> 'corylus_colurna.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 11,
      'x_coord'=> 48.660346,
      'y_coord'=> 6.156125,
      'nom_lat'=> 'Cotoneaster horizontalis',
      'nom_fr'=> 'cotoneaster',
      'hauteur'=> '2,3m',
      'nectar'=> 3,
      'pollen'=> 2,
      'miellat'=> '',
      'flor_coul'=> 'juin,juillet,rose',
      'empl_jardin'=> 'arboretum,secteur chine',
      'photo'=> 'cotoneaster_horizontalis.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 12,
      'x_coord'=> 48.662252,
      'y_coord'=> 6.155973,
      'nom_lat'=> 'Crocus vernus',
      'nom_fr'=> 'crocus de printemps',
      'hauteur'=> '',
      'nectar'=> 1,
      'pollen'=> 2,
      'miellat'=> '',
      'flor_coul'=> 'fevrier,mars toutes couleurs',
      'empl_jardin'=> 'pelouses',
      'photo'=> 'crocus_vernus.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 13,
      'x_coord'=> 48.661923,
      'y_coord'=> 6.155104,
      'nom_lat'=> 'Dalhia variabilis',
      'nom_fr'=> 'dalhia CV',
      'hauteur'=> '0;5,2m',
      'nectar'=> 0,
      'pollen'=> 2,
      'miellat'=> '',
      'flor_coul'=> 'juillet,août,septembre toutes couleurs',
      'empl_jardin'=> 'collection de dahlias',
      'photo'=> 'dalhia_variabilis.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 14,
      'x_coord'=> '',
      'y_coord'=> '',
      'nom_lat'=> 'Epilobium angustifolium',
      'nom_fr'=> 'epilobe en épis',
      'hauteur'=> '2m',
      'nectar'=> 3,
      'pollen'=> 2,
      'miellat'=> '',
      'flor_coul'=> 'juillet,août rose',
      'empl_jardin'=> 'ruisseau',
      'photo'=> 'epilobium_angustifolium.JPG'
    ];
    $flowers[] =
    [
      'id_flower'=> 15,
      'x_coord'=> 48.661503,
      'y_coord'=> 6.154044,
      'nom_lat'=> 'Fagopyrum esculentum',
      'nom_fr'=> 'sarrasin ou blé noir',
      'hauteur'=> '1m',
      'nectar'=> 2,
      'pollen'=> 1,
      'miellat'=> '',
      'flor_coul'=> 'juin,juillet,août blanc',
      'empl_jardin'=> 'collection historique',
      'photo'=> 'fagopyrum_esculentum.jpeg'
    ];
    $flowers[] =
    [
      'id_flower'=> 16,
      'x_coord'=> 48.661718,
      'y_coord'=> 6.15715,
      'nom_lat'=> 'Fraxinus ornus',
      'nom_fr'=> 'frêne à fleurs',
      'hauteur'=> '10m',
      'nectar'=> 1,
      'pollen'=> 2,
      'miellat'=> '',
      'flor_coul'=> 'mai, juin blanche',
      'empl_jardin'=> 'secteur arboretum Europe',
      'photo'=> 'fraxinus_ornus.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 17,
      'x_coord'=> 48.662158,
      'y_coord'=> 6.157476,
      'nom_lat'=> 'Gleditsia triacanthos',
      'nom_fr'=> 'févier',
      'hauteur'=> '20m',
      'nectar'=> 2,
      'pollen'=> 0,
      'miellat'=> '',
      'flor_coul'=> 'juin,juillet,jaune,vertearboretum secteur Amérique du nord',
      'empl_jardin'=> '',
      'photo'=> 'gleditsia_triacanthos.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 18,
      'x_coord'=> 48.659248,
      'y_coord'=> 6.153968,
      'nom_lat'=> 'Hedera helix',
      'nom_fr'=> 'lierre',
      'hauteur'=> 'rampant',
      'nectar'=> 3,
      'pollen'=> 3,
      'miellat'=> '',
      'flor_coul'=> 'septembre, octobre',
      'empl_jardin'=> 'vert tendre,forêt',
      'photo'=> 'hedera_helix.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 19,
      'x_coord'=> 48.660986,
      'y_coord'=> 6.153347,
      'nom_lat'=> 'Lavandula officinale',
      'nom_fr'=> '',
      'hauteur'=> '',
      'nectar'=> 3,
      'pollen'=> 1,
      'miellat'=> '',
      'flor_coul'=> 'juillet,août,bleu lilas',
      'empl_jardin'=> 'potager',
      'photo'=> 'lavande_officinale.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 20,
      'x_coord'=> 48.660825,
      'y_coord'=> 6.156621,
      'nom_lat'=> 'Lonicera tartarica',
      'nom_fr'=> 'chèvrefeuille',
      'hauteur'=> '3m',
      'nectar'=> 2,
      'pollen'=> 2,
      'miellat'=> '',
      'flor_coul'=> 'mai,juin,blanc',
      'empl_jardin'=> 'collection historique',
      'photo'=> 'lonicera_tartarica.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 21,
      'x_coord'=> 48.661293,
      'y_coord'=> 6.153911,
      'nom_lat'=> 'Médicago sativa',
      'nom_fr'=> 'luzerne cultivée',
      'hauteur'=> '0.50m',
      'nectar'=> 3,
      'pollen'=> 1,
      'miellat'=> '',
      'flor_coul'=> 'juin,juillet,août mauve',
      'empl_jardin'=> 'collection historique',
      'photo'=> 'medicago_sativa.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 22,
      'x_coord'=> 48.661395,
      'y_coord'=> 6.153903,
      'nom_lat'=> 'Phacelia tanacetifolia',
      'nom_fr'=> 'phacelie à feuilles de tanaisie',
      'hauteur'=> '0.50m',
      'nectar'=> '',
      'pollen'=> '3      2',
      'miellat'=> '',
      'flor_coul'=> 'juillet,oût,septembre jardin écologique bleu clair',
      'empl_jardin'=> 'potager écologique',
      'photo'=> 'phacelia_tanacetifolia.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 23,
      'x_coord'=> 48.660229,
      'y_coord'=> 6.156639,
      'nom_lat'=> 'Prunus avium',
      'nom_fr'=> 'merisier',
      'hauteur'=> '10,15m',
      'nectar'=> 2,
      'pollen'=> 3,
      'miellat'=> 'M',
      'flor_coul'=> 'avril,mai,blanche',
      'empl_jardin'=> 'forêt',
      'photo'=> 'prunus_avium.jpeg'
    ];
    $flowers[] =
    [
      'id_flower'=> 24,
      'x_coord'=> '',
      'y_coord'=> '',
      'nom_lat'=> 'Prunus spinosa',
      'nom_fr'=> 'prunellier',
      'hauteur'=> '3,4m',
      'nectar'=> 2,
      'pollen'=> 2,
      'miellat'=> '',
      'flor_coul'=> 'avril,mai,blanc',
      'empl_jardin'=> 'roseraie',
      'photo'=> 'prunus_spinosa.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 25,
      'x_coord'=> 48.66291,
      'y_coord'=> 6.155547,
      'nom_lat'=> 'Pyracantha coccinéa',
      'nom_fr'=> 'buisson ardent',
      'hauteur'=> '2,3m',
      'nectar'=> 2,
      'pollen'=> 3,
      'miellat'=> '',
      'flor_coul'=> ',juin,juillet,blanc',
      'empl_jardin'=> 'roseraie',
      'photo'=> 'pyracantha_coccinea.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 26,
      'x_coord'=> 48.66218,
      'y_coord'=> 6.155799,
      'nom_lat'=> 'Robinia pseudoacacia',
      'nom_fr'=> 'robinier faux acacia',
      'hauteur'=> '20m',
      'nectar'=> 3,
      'pollen'=> 2,
      'miellat'=> '',
      'flor_coul'=> 'juin,blanche',
      'empl_jardin'=> 'étang pavillon d\'accueil',
      'photo'=> 'robinia_pseudoacacia.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 27,
      'x_coord'=> 48.660979,
      'y_coord'=> 6.154249,
      'nom_lat'=> 'Rudbeckia laciniata',
      'nom_fr'=> 'rudbeckia lacinié',
      'hauteur'=> '1,50m',
      'nectar'=> 0,
      'pollen'=> 3,
      'miellat'=> '',
      'flor_coul'=> 'juillet août jaune',
      'empl_jardin'=> 'collection historique ornementale',
      'photo'=> 'rudbeckia_laciniata.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 28,
      'x_coord'=> '',
      'y_coord'=> '',
      'nom_lat'=> 'Salix capréa',
      'nom_fr'=> 'saule marsault',
      'hauteur'=> '',
      'nectar'=> 2,
      'pollen'=> 3,
      'miellat'=> '',
      'flor_coul'=> 'mars avril,jaune,vert',
      'empl_jardin'=> 'ruisseau',
      'photo'=> 'salix_caprea.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 29,
      'x_coord'=> 48.66122,
      'y_coord'=> 6.153894,
      'nom_lat'=> 'Solidago virgaurea',
      'nom_fr'=> 'verge d\'or',
      'hauteur'=> '1.50m',
      'nectar'=> 2,
      'pollen'=> 2,
      'miellat'=> '',
      'flor_coul'=> 'août,septembre,octobre jaune',
      'empl_jardin'=> 'collection historique',
      'photo'=> 'solidago_virgaurea.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 30,
      'x_coord'=> 48.662458,
      'y_coord'=> 6.157181,
      'nom_lat'=> 'Sophora japonica',
      'nom_fr'=> 'sophora du japon',
      'hauteur'=> '15 20m',
      'nectar'=> 3,
      'pollen'=> 1,
      'miellat'=> '',
      'flor_coul'=> 'août,septembre,blanc crème',
      'empl_jardin'=> '',
      'photo'=> 'sophora_japonica.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 31,
      'x_coord'=> 48.660814,
      'y_coord'=> 6.154629,
      'nom_lat'=> 'Taraxacum officinalis',
      'nom_fr'=> 'pissenlit',
      'hauteur'=> '',
      'nectar'=> 3,
      'pollen'=> 3,
      'miellat'=> '',
      'flor_coul'=> 'avril,mai,juin,juillet jaune',
      'empl_jardin'=> 'pelouse prairie',
      'photo'=> 'taraxacum_officinale.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 32,
      'x_coord'=> 48.661993,
      'y_coord'=> 6.154415,
      'nom_lat'=> 'Thymus vulgaris',
      'nom_fr'=> 'thym',
      'hauteur'=> '0,20m',
      'nectar'=> 3,
      'pollen'=> 0,
      'miellat'=> '',
      'flor_coul'=> 'juin,juillet,août,mauve',
      'empl_jardin'=> 'jardin écologique,potager',
      'photo'=> 'thymus_vulgaris.JPG'
    ];
    $flowers[] =
    [
      'id_flower'=> 33,
      'x_coord'=> 48.661908,
      'y_coord'=> 6.155647,
      'nom_lat'=> 'Tilia henryana',
      'nom_fr'=> 'tilleul de Henry',
      'hauteur'=> '12m',
      'nectar'=> 3,
      'pollen'=> 2,
      'miellat'=> '',
      'flor_coul'=> ',septembre,jaunâtre',
      'empl_jardin'=> 'étang pavillon d\'accueil',
      'photo'=> 'tilia_henryana.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 34,
      'x_coord'=> 48.662386,
      'y_coord'=> 6.156995,
      'nom_lat'=> 'Tilia platyphillos',
      'nom_fr'=> 'tilleul à larges feuilles',
      'hauteur'=> '20m',
      'nectar'=> 3,
      'pollen'=> 2,
      'miellat'=> '',
      'flor_coul'=> 'juin,janâtre',
      'empl_jardin'=> 'parcelle Emile Gallé',
      'photo'=> 'tilia_platyphyllos.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 35,
      'x_coord'=> '',
      'y_coord'=> '',
      'nom_lat'=> 'Trifolium repens',
      'nom_fr'=> 'trèfle blanc',
      'hauteur'=> '',
      'nectar'=> 3,
      'pollen'=> 2,
      'miellat'=> '',
      'flor_coul'=> 'mai,juin,juillet,août,septembre',
      'empl_jardin'=> 'pelouse',
      'photo'=> 'trifolium_repens.jpg'
    ];
    $flowers[] =
    [
      'id_flower'=> 36,
      'x_coord'=> 48.6618,
      'y_coord'=> 6.157049,
      'nom_lat'=> 'Vinca minor',
      'nom_fr'=> 'petite pervenche',
      'hauteur'=> '0,30m',
      'nectar'=> 2,
      'pollen'=> 0,
      'miellat'=> '',
      'flor_coul'=> 'mars, avril bleu',
      'empl_jardin'=> 'arboretum',
      'photo'=> 'vinca_minor.jpg'
    ];
  

if (count($flowers) > 0) {
  $res = $db->insertMany($flowers);
}