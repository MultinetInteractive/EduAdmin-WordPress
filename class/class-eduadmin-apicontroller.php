<?php

// phpcs:disable WordPress.NamingConventions
class EduAdmin_APIController {
	public $namespace;

	public function __construct() {
		$this->namespace = 'edu/v1';
	}

	public function register_routes() {
		register_rest_route( $this->namespace, '/courselist', array(
			'methods'  => 'POST',
			'callback' => 'edu_listview_courselist',
			'args'     => array(
				'city'         => array(),
				'category'     => array(),
				'categorydeep' => array(),
				'subject'      => array(),
				'subjectid'    => array(),
				'courselevel'  => array(),
				'search'       => array(),
				'template'     => array(),
				'eid'          => array(),
				'eventinquiry' => array(),
				'orderby'      => array(),
				'order'        => array(),
				'edu-region'   => array(),
			),
		) );

		register_rest_route( $this->namespace, '/courselist/events', array(
			'methods'  => 'POST',
			'callback' => 'edu_api_listview_eventlist',
			'args'     => array(
				'fetchmonths'    => array(),
				'city'           => array(),
				'category'       => array(),
				'categorydeep'   => array(),
				'subject'        => array(),
				'subjectid'      => array(),
				'courselevel'    => array(),
				'search'         => array(),
				'template'       => array(),
				'numberofevents' => array(),
				'eid'            => array(),
				'eventinquiry'   => array(),
				'orderby'        => array(),
				'order'          => array(),
				'edu-region'     => array(),
			),
		) );

		register_rest_route( $this->namespace, '/eventlist', array(
			'methods'  => 'POST',
			'callback' => 'edu_api_eventlist',
			'args'     => array(
				'objectid'       => array( 'required' => true ),
				'city'           => array(),
				'groupbycity'    => array(),
				'baseUrl'        => array(),
				'courseFolder'   => array(),
				'showmore'       => array(),
				'spotsleft'      => array(),
				'fewspots'       => array(),
				'spotsettings'   => array(),
				'eid'            => array(),
				'numberofevents' => array(),
				'fetchmonths'    => array(),
				'showvenue'      => array(),
				'eventinquiry'   => array(),
				'edu-region'     => array(),
			),
		) );

		register_rest_route( $this->namespace, '/loginwidget', array(
			'methods'  => 'POST',
			'callback' => 'edu_api_loginwidget',
			'args'     => array(
				'logintext'  => array(),
				'logouttext' => array(),
				'guesttext'  => array(),
			),
		) );

		register_rest_route( $this->namespace, '/coupon/check', array(
			'methods'  => 'POST',
			'callback' => 'edu_api_check_coupon_code',
			'args'     => array(
				'code'    => array( 'required' => true ),
				'eventId' => array( 'required' => true ),
			),
		) );

		register_rest_route( $this->namespace, '/coupon/programme/check', array(
			'methods'  => 'POST',
			'callback' => 'edu_api_check_programme_coupon_code',
			'args'     => array(
				'code'    => array( 'required' => true ),
				'programmeStartId' => array( 'required' => true ),
			),
		) );
	}
}
