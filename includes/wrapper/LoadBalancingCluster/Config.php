<?php
/**
 * Manages LoadBalancingCluster Config
 *
 * @category    API wrapper
 * @package     OnApp
 * @subpackage  LoadBalancingCluster
 * @author      Yakubskiy Yuriy
 * @copyright   (c) 2011 OnApp
 * @link        http://www.onapp.com/
 * @see         OnApp
 */

/**
 * Manages OnApp Load Balancing Cluster Config
 *
 * The OnApp_LoadBalancingCluster_Config class uses no basic methods and is nested of OnApp_LoadBalancingCluster class
 *
 */
class OnApp_LoadBalancingCluster_Config extends OnApp {
	public function __construct() {
		parent::__construct();
		$this->className = __CLASS__;
	}

	/**
	 * API Fields description
	 *
	 * @param string|float $version   OnApp API version
	 * @param string       $className current class' name
	 *
	 * @return array
	 */
	public function initFields( $version = null, $className = '' ) {
		switch( $version ) {
			case '2.1':
				$this->fields = array(
					'max_node_amount' => array(
						ONAPP_FIELD_MAP => '_max_node_amount',
						ONAPP_FIELD_TYPE => 'integer',
						ONAPP_FIELD_READ_ONLY => true
					),
					'min_node_amount' => array(
						ONAPP_FIELD_MAP => '_min_node_amount',
						ONAPP_FIELD_TYPE => 'integer',
						ONAPP_FIELD_READ_ONLY => true,
					),
				);
				break;

			case 2.2:
			case 2.3:
				$this->fields = $this->initFields( 2.1 );
				break;

			case 3.0:
				$this->fields = $this->initFields( 2.3 );
				break;
		}

		parent::initFields( $version, __CLASS__ );
		return $this->fields;
	}
}