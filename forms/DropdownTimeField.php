<?php

class DropdownTimeField extends TimeField {
	
	function __construct( $name, $title = null, $value = "", $timeformat = 'H:i a' ){
		parent::__construct( $name, $title, $value, $timeformat );
	}
	
	static function Requirements() {
		Requirements::javascript( 'sapphire/javascript/DropdownTimeField.js' );
		Requirements::css( 'sapphire/css/DropdownTimeField.css' );
	}
	
	static function HTMLField( $id, $name, $val ) {
		return <<<HTML
			<input type="text" id="$id" name="$name" value="$val"/>
			<img src="sapphire/images/clock-icon.gif" id="$id-icon"/>
			<div class="dropdownpopup" id="$id-dropdowntime"></div>
HTML;
	}
	
	function Field() {
		
		self::Requirements();
		
		$field = parent::Field();

		$id = $this->id();
		$val = $this->attrValue();
		
		$innerHTML = self::HTMLField( $id, $this->name, $val );
			
		return <<<HTML
			<div class="dropdowntime">
				$innerHTML
			</div>
HTML;
	}
}