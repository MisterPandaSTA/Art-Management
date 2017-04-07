<?php

require_once ('config/config.php');
require_once ('config/db.php');
require_once('class.oeuvre.php');

$oeuvre= new Oeuvre($_GET['id_oeuvre']);
 echo "<tr>";
 			 echo "<td><img src=img/".$oeuvre->getImgName()."></td>";
            echo "<td>".$oeuvre->getNomArtiste()."</td>";
            echo "<td>".$oeuvre->getNom()."</td>";
            echo "<td>".$oeuvre->getTypeOeuvre()."</td>";
            echo "<td>".$oeuvre->getDimensions()."</td>";
            echo "<td>".$oeuvre->getPoids()."</td>";
            echo "<td>".$oeuvre->getDescriptionOeuvre()."</td>";
            echo "<td>".$oeuvre->getDateCreation()."</td>";
            echo "<td>".$oeuvre->getLivraison()."</td>";
            

            echo "</tr>";