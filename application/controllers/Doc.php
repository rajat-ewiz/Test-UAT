<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doc extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pdf'); // Load library
        $this->pdf->fontpath = 'C:/Program Files (x86)/Zend/Apache2/htdocs/test/system/font/'; // Specify font folder
    }

    public function index() {
        $referral_details = array(
            'referral_unique_id' => 'UDREF131',
            'status' => 'Pending',
            'referred_by_user_name' => 'Javier L Beltran',
            'patient_name'=>'Sunny Sharma',
            'patient_gender' => 'Male',
            'patient_dob' => 'Dec 31, 1969',
            'patient_phone' => '978-244-7604',
            'patient_email' => 'Javier@gmail.com',
            'patient_state' => 'New York',
            'patient_country' => 'USA',
            'patient_address_street' => 'House 1, 52 Street, Roslyn',
            'patient_city' => 'New York',
            'patient_zip_code' => '70510',
            'patient_insurance' => 'AETNA',
            'next_kin' => 'Tom',
            'kin_phone' => '978-244-7604',
             'kin_relationship' => 'Brother',
            'referral_condition_desc'=>'Brucellosis due to Brucella canis',
            'reason_consultation'=>'Brucellosis is an infectious disease caused by a type of bacteria called Brucella.', 
            'referral_description'=>'A233',
            'ssn' => '###-##-7989',
         
          'referred_to_user_name' => 'Jomes Wright',
    'ref_by_hospital' => 'Hospital1',
            'ref_to_hospital' => 'Hospital2',
             'ref_to_city' => 'NEW YORK',
            'ref_by_city' => 'JAIPUR',
            'rfrd_by_cell_phone' => 9879877879,
            'rfrd_by_email' => 'Jomes@uberdok.com',
            'rfrd_to_cell_phone' => 2162555700,
             'rfrd_to_email' => 'Javier@uberdok.com'
            );
        $this->pdf->referral_view($referral_details);
    }

    // More methods goes here
}

?>