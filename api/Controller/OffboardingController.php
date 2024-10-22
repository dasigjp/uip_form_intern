<?php

namespace API\Controller;

use API\Model\OffboardingRequest;
use Exception;

class OffboardingController {

    private $reff_id;

    public function store ($data) {

        try {

        $offboarding_creation = OffboardingRequest::create([
            'name' => $data['name'],                                  // Name (Last, First, Middle Initial)
            'email_address' => $data['email'],                        // Email Address
            'application_id' => $data['applicationID'],               // Application ID
            'department' => $data['department'],                      // Department
            'required_hours' => $data['requiredHours'],               // Required Hours
            'completed_hours' => $data['completedHours'],             // Completed Hours
            'google_drive_link' => $data['googleDriveLink'],           // Google Drive Link
            'testimonial_video_link' => $data['testimonialVideoLink'], // Testimonial Video Link
            'fb_page_review_link' => $data['fbPageReviewLink'],        // Facebook Page Review Link
            'certification' => $data['certification'],                // Certification (radio button)
            'eval_form_link' => $data['evalFormLink'],                 // Evaluation Form Link
            'signature_docs_link' => $data['signatureDocsLink'],       // Signature Documents Link
            'forward_email_link' => $data['forwardEmailLink'],         // Forward Email Link
            'status' => 'Pending',                                    // Status default to 'Pending'
            
        ]);

        $id = $offboarding_creation->reff_id;

        $this->reff_id = $id;

        $insertion_status = true;
        return $insertion_status;
        // Since Eloquent is implemented as a standalone, failing the insertion does not cause an error code, therefore,
        // a try and catch with a custom variable will be implemented to force an error code when checked on preboarding.php
        } catch (Exception $e) {
            $insertion_status = false;
            return $insertion_status;
        }

    }

    public function get_reffid () {
        return $this->reff_id;
    }
}