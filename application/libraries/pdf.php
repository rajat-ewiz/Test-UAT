<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require('fpdf.php');

class Pdf extends FPDF {

    // Extend FPDF using this class
    // More at fpdf.org -> Tutorials
    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4') {
        // Call parent constructor
        parent::__construct($orientation, $unit, $size);
    }

    function referral_view($ref_data = FALSE) {
//        print_r($ref_data);   
        $this->AddPage();
        $this->set_referral_header();
        $ref_id = $ref_data['referral_unique_id'];
        $status = $ref_data['status'];
        $patient_name = $ref_data['patient_name'];
        $referred_by_user_name = $ref_data['referred_by_user_name'];
        $patient_gender = $ref_data['patient_gender'];
        $patient_address_street = $ref_data['patient_address_street'];
        $patient_dob = $ref_data['patient_dob'];
        $patient_phone = $ref_data['patient_phone'];
        $patient_email = $ref_data['patient_email'];
        $patient_state = $ref_data['patient_state'];
        $patient_country = $ref_data['patient_country'];
        $patient_city = $ref_data['patient_city'];
        $patient_email = $ref_data['patient_email'];
        $patient_zip_code = $ref_data['patient_zip_code'];
        $patient_insurance = $ref_data['patient_insurance'];
        $next_kin = $ref_data['next_kin'];
        $kin_phone = $ref_data['kin_phone'];
        $kin_relationship = $ref_data['kin_relationship'];
        $ssn = $ref_data['ssn'];
        $referral_condition_desc = $ref_data['referral_condition_desc'];
        $reason_consultation = $ref_data['reason_consultation'];
        $referral_description = $ref_data['referral_description']; 

        $referred_to_user_name = $ref_data['referred_to_user_name'];

        $ref_by_hospital = $ref_data['ref_by_hospital'];
         $ref_to_hospital = $ref_data['ref_to_hospital'];
         $ref_to_city = $ref_data['ref_to_city'];
         $ref_by_city = $ref_data['ref_by_city'];
         $rfrd_by_cell_phone = $ref_data['rfrd_by_cell_phone'];
         $rfrd_by_email = $ref_data['rfrd_by_email'];
         $rfrd_to_cell_phone = $ref_data['rfrd_to_cell_phone'];
         $rfrd_to_email = $ref_data['rfrd_to_email'];
         
        {
            $this->SetLineWidth(.5);
            $this->line(10, 37, 200, 37);
            $this->SetFont('Arial', 'B', 15);
            $this->Text(10, 32, 'Referral Id - ' . $ref_id);
            $this->Text(155, 32, 'Status - ' . $status);
        } 
        $this->SetDash(1,1); 
        {
            $this->SetFont('Arial', 'B', 13);

            $this->SetXY(70, 40);
            $this->Cell(60, 7, 'Patient Details ', 1, 1, 'C');
        } {
            $this->SetFont('Arial', 'BI', 10);
            $px = 20;
            $py = 55;
            $pz = 120;
            $this->Text($px, $py, 'Patient Name - ' . $patient_name);
            $this->Text($px, $py + 5, 'Gender - ' . $patient_gender);
            $this->Text($px, $py + 10, 'Date of Birth - ' . $patient_dob);
            $this->Text($px, $py + 15, 'Mobile - ' . $patient_phone);
            $this->Text($px, $py + 20, 'Email - ' . $patient_email);
            $this->Text($pz, $py, 'Address - ' . $patient_address_street);
            $this->Text($pz, $py + 5, 'City - ' . $patient_city);
            $this->Text($pz, $py + 10, 'State - ' . $patient_state);
            $this->Text($pz, $py + 15, 'Country - ' . $patient_country);
            $this->Text($pz, $py + 20, 'Zipcode - ' . $patient_zip_code);
            $this->Text($px, $py + 30, 'Insurance - ' . $patient_insurance);
            $this->Text($px, $py + 35, 'SSN - ' . $ssn);
            $this->Text($px, $py + 40, 'Next of Kin - ' . $next_kin);
            $this->Text($px, $py + 45, 'Kin Phone - ' . $kin_phone);
            $this->Text($px, $py + 50, 'Kin Relation - ' . $kin_relationship);
        } {
            $this->SetFont('Arial', 'B', 13);
            $this->SetXY(70, 115);
            $this->Cell(60, 7, 'Reason/ Patient Condition ', 1, 1, 'C');
        } {
            $this->SetFont('Arial', 'B', 10);
            $px = 20;
            $py = 130;
            $this->Text($px, $py, 'Reason for Consultation - ' . $referral_condition_desc);
            $this->Text($px, $py + 5, 'Brief Description - ' . $reason_consultation);
            $this->Text($px, $py + 10, 'Existing Conditions - ' . $referral_description);
        } {
            $this->SetFont('Arial', 'B', 13);
            $this->SetXY(70, 150);
            $this->Cell(60, 7, 'Referral Details ', 1, 1, 'C');
        } {

            $px = 20;
            $py = 172;
            $this->SetFont('Arial', 'B', 14);
           $this->SetXY(5, 160);
            $this->Cell(60, 7, 'Referred To', 0, 1, 'C');
//            $this->Text($px, $py-2, 'Referred By - ');
              $this->Text($px, $py, $referred_to_user_name);
               $this->SetFont('Arial', 'B', 10);
            $this->Text($px, $py + 5, 'Hospital - ' . $ref_to_hospital);
            $this->Text($px, $py + 10, 'City - ' . $ref_to_city);
            $this->Text($px, $py + 15, 'Phone No - ' . $rfrd_to_cell_phone);
            $this->Text($px, $py + 20, 'Email - ' . $rfrd_to_email);
         
            $this->SetXY(105, 160);
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(60, 7, 'Referred By', 0, 1, 'C');
            
           
 
            $this->Text($pz, $py, $referred_by_user_name);
            $this->SetFont('Arial', 'B', 10);
            $this->Text($pz, $py + 5, 'Hospital - ' . $ref_by_hospital);
            $this->Text($pz, $py + 10, 'City - ' . $ref_by_city);
            $this->Text($pz, $py + 15, 'Phone No - ' . $rfrd_by_cell_phone);
            $this->Text($pz, $py + 20, 'Email - ' . $rfrd_by_email);
        }
        $this->set_referral_footer();
              $this->Output();
    }

    private function set_referral_header() {
        $this->Image('C:/Program Files (x86)/Zend/Apache2/htdocs/test/image/logo.png', 10, 10, 50, 0);
        $this->Image('C:/Program Files (x86)/Zend/Apache2/htdocs/test/image/qr.png', 185, 8, 15, 0);
//        $this->SetLineWidth(.7);
        $this->SetLineWidth(0.7);

        $this->line(10, 25, 200, 25);
    }

    private function set_referral_footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
         $this->SetLineWidth(0.7);
$this->SetDash(0,0); 
        $this->line(10, 270, 200, 270);
        $this->Text(50, 280, 'Electronic referrals by https://kwikconsult.com      Printed On: Sep 23, 2015    Page 1 of 1');
        
     
    }

}
