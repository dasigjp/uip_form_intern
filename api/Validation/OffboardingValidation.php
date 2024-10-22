<?php

namespace Api\Validation;

use Rakit\Validation\Validator;

class OffboardingValidation {
    private $validator;

    public function __construct()
    {
        $this->validator = new Validator(); 
    }

    public function validate($data){
        $rules = [
                'name' => 'required',                                  // Name
                'email_address' => 'required',                          // Email Address
                'application_id' => 'required',                        // Application ID
                'department' => 'required',                            // Department
                'required_hours' => 'required',                               // Required Hours
                'completed_hours' => 'required',                              // Completed Hours
                'google_drive_link' => 'required',                        // Google Drive Link
                'testimonial_video_link' => 'nullable',                   // Testimonial Video Link 
                'fb_page_review_link' => 'nullable',                      // Facebook Page Review Link 
                'certification' => 'required',                              // Certification (radio button, required yes/no)
                'eval_form_link' => 'required',                           // Evaluation Form Link
                'signature_docs_link' => 'required',                      // Signature Documents Link
                'forward_email_link' => 'required',                       // Forward Email Link
        ];

        $validation = $this->validator->make($data, $rules);

        $validation->validate();

        return $validation;
        
    }

}