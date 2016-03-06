<?php

// Pour affichage des caractères accentués sur la page HTML
header('Content-type: text/html; charset=utf-8');

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

echo PHP_SAPI.'<br />';
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** equivalent à 
    if (PHP_SAPI == 'cli') 
    { define ('EOL', PHP_EOL) ;}
    else 
    { define ('EOL', '<br />');}
    
    La constante PHP_SAPI contient la même valeur que le résultat de l'appel de la fonction php_sapi_name().
    Elle détermine le type d'interface utilisé par PHP cad la manière dont PHP est exécuté.
    S'il est exécuté en mode CLI application en Ligne de Commande, en via HTTP....
    Dans notre code, PHP étant exécuté via HTTP, on pourra remplacer "<br />" par EOL  **/

/** Inclusion dans notre code de la bibliothèque PHPExcel.
 *  Penser  à importer les répertoires Classes et Examples dans les répertoires du site **/
 echo getcwd() . "\n";
 require_once dirname(__FILE__) . '/Classes/PHPExcel.php';



/** Récupère le nom du fichier .xls à charger.PHPExcel
 *  Le nom du fichier peut provenir d'une précédente opération d'upload. **/
$inputFileName = $_FILES;

/** teste si présence du fichier .xls dans le répertoire courant du script .php **/
if (!file_exists($inputFileName)) {
    echo "<br>Erreur : fichier $inputFileName introuvable";
    exit();
}

/** Charge le fichier excel $inputFileName dans un objet PHPExcel.
 *  Les méthodes de la bibliothèque PHPExcel sont celles de cet objet.**/
$objPHPExcel = PHPExcel_IOFactory::load($inputFileName); 

/**Récupère les DERNIERS numéros des lignes et colonnes remplies de l'objet tableur PHPExcel:
 * méthodes getHighestRow() ou getHighestDataRow()       : retournent le NUMéRO de ligne, 
 *                                                         la première ligne étant la ligne 1
 * méthodes getHighestColumn() ou getHighestDataColumn() : retournent le NOM de colonne,
 *                                                         la première colonne étant la colonne A
 * méhode PHPExcel_Cell::columnIndexFromString($lastColumn) : retourne l'INDICE de la dernière colonne
 *                                                            le premier index étant 0
**/

$lastRowNumber = $objPHPExcel->getActiveSheet()->getHighestRow();
$lastColumnName= $objPHPExcel->getActiveSheet()->getHighestColumn();
$lastColumnIndex= PHPExcel_Cell::columnIndexFromString($lastColumnName); 

echo "Affichage des numeros de ligne et de colonne ---- ".EOL;
echo $lastRowNumber.EOL.$lastColumnName."<br />".$lastColumnIndex."<br />"; 
echo "---- ".EOL.EOL;


/** Parcours des cellules remplies du tableur PHPExcel et récupération des contenus
 *  --------------------------------------------------
 *  Il existe plusieurs façons de parcourir les cellules du tableur PHPExcel.
 *  -A- Soit avec des structures de contrôle répétitives 'classiques' :
 *      2 boucles 'for' imbriquées, où l'on doit alors expliciter la ligne 
 *      (respectivement la colonne) courante à l'aide d'une variable $ligne 
 *      (respectivement $colonne).
 *  -B- Soit avec des itérateurs, et l'on pourra travailler :
 *      - avec la ligneCourante (itérateur getRowIterator())
 *      - ou la celluleCourante (itérateur getCellIterator())
 *  Les exemples ci-dessous montrent ces différents types de parcours.
 *  Attention : comportement parfois erratiques avec les itérateurs (cf. exécution avec fichier test1XLS.xls) :
 *              le programme affiche des cellules qui pourtant sont vides....
**/

/**  Lecture de cellules contenant des dates : fonction PHPExcel_Shared_Date::ExcelToPHP () 
 *   ---------------------------------------
 *   Les fichiers excel stockent les données en format numérique, correspondant au nombre de 
 *   jours écoulés depuis le 01/01/1900.
 *   Exemple : la date du 05/01/1900 est codée 5.
 *   Pour les lire, PHPExcel utilise la fonction PHPExcel_Shared_Date::ExcelToPHP () qui 
 *   transforme la date excel en date au format php.
 *   Utilisation :
 *   //récupération d'un objet cellule
     $cell = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($colonne, $ligne);
     //récupération de la valeur de la cellule
     $valCell = $cell->getValue();
     //si la cellule est de type date (au format excel), son contenu est transform en date au format PHP
     if (PHPExcel_Shared_Date::isDateTime($cell)) {
        $valCell = date($format, PHPExcel_Shared_Date::ExcelToPHP($valCell)); 
     }
    
    où $format est le format PHP souhaité :
       $format = 'd.m.Y'; ou encore $format = 'd/m/Y';
**/



//////////////////////////////////////
// Exemples de Parcours simples d'un objet tableur
//////////////////////////////////////

echo EOL."Parcours ligne a ligne - Option A---- ".EOL;
/** Option A 
 *  Avec 2 variables $ligne et $colonne **/
$format='d/m/Y';    // pour la transformation des cellules 'dates' excel en format 'date' de PHP

for ($ligne=1; $ligne<=$lastRowNumber; $ligne++)
{
    for ($colonne=0; $colonne<$lastColumnIndex; $colonne++)
    {
        // objet cellule
        $cellCourante = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($colonne, $ligne); 
        // valeur de la cellule
        $valCellCourante = $cellCourante->getValue();
        // si nécessaire, transformation de la date au format date PHP
        if(PHPExcel_Shared_Date::isDateTime($cellCourante)) {
            $valCellCourante = date($format, PHPExcel_Shared_Date::ExcelToPHP($valCellCourante)); 
        }
        echo $valCellCourante." - ";
    }
    echo EOL;  // exemple d'utilisation de EOL : équivalent à : echo "<br />";
}
echo "---- ".EOL;

/** Option B.1
    Itérateur getRowIterator() : permet de parcourir le tableau ligne à ligne.
    A chaque itération, c'est une ligne entière ($ligneCourante) qui est considérée.
    On applique à cette ligne courante la méthode getCell("nomDeColonne".$rowIndex) pour 
    accéder à chacune de ses cellules. 
**/
echo EOL."Parcours ligne a ligne - Option B.1---- ".EOL;
$rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();
foreach($rowIterator as $ligneCourante) {
    // récupération de l'indice de la ligne courante
    $indexLigneCourante = $ligneCourante->getRowIndex ();
   
    /** accès explicite mais à la main de toutes les colonnes de la ligne courante **/
    
    // objet cellule
 	$cellA=$objPHPExcel->getActiveSheet()->getCell("A".$indexLigneCourante);
 	// valeur de la cellule
 	$valCellA = $cellA->getValue();
 	// si date excel, transformation en date PHP
 	if(PHPExcel_Shared_Date::isDateTime($cellA)) {
            $valCellA= date($format, PHPExcel_Shared_Date::ExcelToPHP($valCellA)); 
    }

    // objet cellule 	
 	$cellB=$objPHPExcel->getActiveSheet()->getCell("B".$indexLigneCourante);
    // valeur de la cellule	
 	$valCellB = $cellB->getValue();
 	// si date excel, transformation en date PHP 	
 	if(PHPExcel_Shared_Date::isDateTime($cellB)) {
            $valCellB= date($format, PHPExcel_Shared_Date::ExcelToPHP($valCellB));  	
 	}

    // objet cellule
 	$cellC=$objPHPExcel->getActiveSheet()->getCell("C".$indexLigneCourante);
    // valeur de la cellule 	
 	$valCellC = $cellC->getValue();
 	// si date excel, transformation en date PHP 	
 	if(PHPExcel_Shared_Date::isDateTime($cellC)) {
            $valCellC= date($format, PHPExcel_Shared_Date::ExcelToPHP($valCellC));  	
 	}

    // objet cellule 	
 	$cellD=$objPHPExcel->getActiveSheet()->getCell("D".$indexLigneCourante);
    // valeur de la cellule
 	$valCellD = $cellD->getValue();
 	// si date excel, transformation en date PHP 	
 	if(PHPExcel_Shared_Date::isDateTime($cellD)) {
            $valCellD= date($format, PHPExcel_Shared_Date::ExcelToPHP($valCellD));  	
 	}
 	
    // objet cellule 	
 	$cellE=$objPHPExcel->getActiveSheet()->getCell("E".$indexLigneCourante);
    // valeur de la cellule 	
 	$valCellE = $cellE->getValue();
 	// si date excel, transformation en date PHP 	
 	if(PHPExcel_Shared_Date::isDateTime($cellE)) {
            $valCellE= date($format, PHPExcel_Shared_Date::ExcelToPHP($valCellE));  	
 	}
 	
    // objet cellule
 	$cellF=$objPHPExcel->getActiveSheet()->getCell("F".$indexLigneCourante);
    // valeur de la cellule 	
 	$valCellF = $cellF->getValue();
 	// si date excel, transformation en date PHP
 	if(PHPExcel_Shared_Date::isDateTime($cellF)) {
            $valCellF= date($format, PHPExcel_Shared_Date::ExcelToPHP($valCellF));  	
 	}

    /** Concaténation des contenus des cellules de la ligne courante dans une même variable
        pour affichage sur la page html, terminé par un sautDeLigne **/
		$contenuLigneCourante=$valCellA." - ".$valCellB." - ".$valCellC." - ".$valCellD." - ".$valCellE." - ".$valCellF;
		echo $contenuLigneCourante."<br />";
}
echo "---- ".EOL;


/** Option B.2
    Itérateur getRowIterator() : permet de parcourir le tableau ligne à ligne.
    A chaque itération, c'est une ligne entière ($ligneCourante) qui est considérée.
    On applique à cette ligne courante un second iterateur (getCellIterator()) pour accéder à 
    chaque cellule. 
    L'usage de 2 itérateurs nous évite d'avoir à gérer les numéros de ligne et de colonne.
**/
echo EOL."Parcours ligne a ligne - Option B.2---- ".EOL;
// Affichage des valeurs dans une table 
echo '<table border="1">';
$rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();
foreach($rowIterator as $ligneCourante){
    echo '<tr>';
    // 2ème itérateur permettant d'accéder à toutes les cellules de la ligne courante
    $cellIterator = $ligneCourante->getCellIterator() ;
    foreach($cellIterator as $cellCourante) {
        // valeur de l'objet cellule
 	    $valCellCourante = $cellCourante->getValue();
 	    // si date excel, transformation en date PHP
 	    if(PHPExcel_Shared_Date::isDateTime($cellCourante)) {
             $valCellCourante= date($format, PHPExcel_Shared_Date::ExcelToPHP($valCellCourante));  	
    	}

        echo '<td>';
        print_r($valCellCourante);
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';
echo "---- ".EOL;


///////////////////////////////////////////////////////////////////
// Parcours d'un fichier tableur pour insertion des valeurs dans BD
///////////////////////////////////////////////////////////////////

echo EOL."Parcours ligne a ligne - Ajout dans la Bas de Donnees---- ".EOL;
echo "---- ".EOL;
//à faire
echo 'Traitements terminés <br/>';
?>