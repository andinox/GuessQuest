<?php
class Model {
	// getter générique
	public function get($attribut) {return $this->$attribut;}

	// setter générique
	public function set($attribut,$valeur) {$this->$attribut = $valeur;}

	// constructeur générique
	public function __construct($donnees = NULL) {
		if (!is_null($donnees)) {
			foreach($donnees as $attribut => $valeur) {
				$this->set($attribut,$valeur);
			}
		}
	}
}