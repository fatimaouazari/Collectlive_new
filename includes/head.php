<?php // fichier includes/header.php

//on recupere le chemin vers le script
$filepath = $_SERVER['PHP_SELF'];

//on decoupe selon le /
$filepath = explode('/', $filepath);

//on recupere la derniere case du tableau
$filename = array_pop($filepath);

?>
<!-- fichier includes/head.php -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, intial-scale=1">
    <title>Collect'Live</title>
	  <link rel="stylesheet" href="css/reset.css">
   	<link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v0.0.4/css/unicons.css">
    <link rel="stylesheet" href="https://use.typekit.net/ayg7ody.css">

    <script src="js/jquery-3.4.1.min.js"></script>

    <script>
      jQuery(function($){

          //on defini une variable pour le temps, le nombre total de travaux, le numero du travaux actuel, le numéro du précédente et interval de fonction
          var nbTotal = $('#retours div article').length, n = 1, old = nbTotal;

          //on cree une fonction qui slide sur l'image suivante par rapport a un sens
          function slide(sens){
              //si le parametre a ete oublie
              if(sens == undefined){
                //on le fixe au sens positif
                  sens = 1;
                //fin du test
              }
              //on met a jour le numero de l'image precedante
                old = n;
              //on met a jour le numero de l'image actuelle (par rapport au sens)
                n = n + sens;
                if(n > nbTotal)
                  n = 1;
                if(n == 0)
                  n = nbTotal;
              //on set tous les articles en display none
                $('#retours div article').removeClass('active');
              //on place l'article actuel en display block
                $('#retours div article:nth-child('+n+')').addClass('active');
          //fin de fonction
          };

          //on gère le clic des buttons

              $('#next').click(function(){
                slide(1);
                console.log('Actuel :'+n+'. Précédente :'+old);
              });

              $('#prev').click(function(){
                slide(-1);
                console.log('Actuel :'+n+'. Précédente :'+old);
              });
      });
    </script>
