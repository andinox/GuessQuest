<?php
class Connexion {
  // les attributs static caractéristiques de la connexion
  static private $hostname = "localhost";//"projets.iut-orsay.fr";
  static private $database = "prj-s4-guestquest";
  static private $login = "prj-s4-guestquest";
  static private $password = "LFHVaNViNAOOwMaf";

  static private $tabUTF8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

  // l'attribut static qui matérialisera la connexion
  static private $pdo;

  // le getter public de cet attribut
  static public function pdo() {return self::$pdo;}

  // la fonction static de connexion qui initialise $pdo et lance la tentative de connexion
  static public function connect()  {
    $h = self::$hostname; $d = self::$database; $l = self::$login; $p = self::$password; $t = self::$tabUTF8;
    try {
    	self::$pdo = new PDO("mysql:host=$h;dbname=$d",$l,$p,$t);
    	self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    	echo "erreur de connexion : ".$e->getMessage()."<br>";
    }
  }
}
?>