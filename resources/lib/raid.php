<?php
#
# Grab the latest progression results
#

class raid {

	private $name;
	private $normal;
	private $heroic;
	private $mythic;
	private $max;

	// Constructor
	public function __construct($name, $normal, $heroic, $mythic, $max) {
	  $this->name = $name;
	  $this->normal = $normal;
	  $this->heroic = $heroic;
	  $this->mythic = $mythic;
	  $this->max = $max;
	}

	public function getName() {
		return $this->name;
	}

	public function getNormal() {
		return $this->normal;
	}

	public function getNormalPct() {
		return $this->normal / $this->max * 100;
	}


	public function getHeroic() {
		return $this->heroic;
	}
	
	public function getHeroicPct() {
		return $this->heroic / $this->max * 100;
	}

	public function getMythic() {
		return $this->mythic;
	}

	public function getMythicPct() {
		return $this->mythic / $this->max * 100;
	}

	public function getMax() {
		return $this->max;
	}
}