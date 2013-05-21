<?php
/**
 * Manages LoadBalancingCluster Nodes
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
 * Manages OnApp Load Balancing Cluster Node
 *
 * The OnApp_LoadBalancingCluster_Node class uses no basic methods and is nested of OnApp_LoadBalancingCluster class
 *
 */
class OnApp_LoadBalancingCluster_Node extends OnApp {
	public function __construct() {
		parent::__construct();
		$this->className = __CLASS__;
	}

	/**
	 * root tag used in the API request
	 *
	 * @var string
	 */
	var $_tagRoot = 'load_balancing_cluster_node';

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
					'cluster_id' => array(
						ONAPP_FIELD_MAP => '_cluster_id',
						ONAPP_FIELD_TYPE => 'integer',
						ONAPP_FIELD_READ_ONLY => true
					),
					'ip_address_id' => array(
						ONAPP_FIELD_MAP => '_ip_address_id',
						ONAPP_FIELD_TYPE => 'integer',
						ONAPP_FIELD_READ_ONLY => true,
					),
					'updated_at' => array(
						ONAPP_FIELD_MAP => '_updated_at',
						ONAPP_FIELD_TYPE => 'string',
						ONAPP_FIELD_READ_ONLY => true,
					),
					'created_at' => array(
						ONAPP_FIELD_MAP => '_created_at',
						ONAPP_FIELD_TYPE => 'string',
						ONAPP_FIELD_READ_ONLY => true,
					),
					'created_at' => array(
						ONAPP_FIELD_MAP => '_created_at',
						ONAPP_FIELD_TYPE => 'string',
						ONAPP_FIELD_READ_ONLY => true,
					),
					'id' => array(
						ONAPP_FIELD_MAP => '_id',
						ONAPP_FIELD_TYPE => 'integer',
						ONAPP_FIELD_READ_ONLY => true,
					),
					'virtual_machine_id' => array(
						ONAPP_FIELD_MAP => '_virtual_machine_id',
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