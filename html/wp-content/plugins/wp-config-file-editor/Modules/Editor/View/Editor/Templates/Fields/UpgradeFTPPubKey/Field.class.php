<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\UpgradeFTPPubKey;

# Input field base
use WCFE\Modules\Editor\View\Editor\Fields\InputField;

/**
* 
*/
class Field extends InputField {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $class = 'path long-input';

	/**
	* put your comment there...
	* 
	*/
	public function getText() {
		return $this->__( 'Public Key' );
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return $this->__( 'The full path to your SSH public key' );
	}

}
