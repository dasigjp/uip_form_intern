<?php

namespace API\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class OffboardingRequest extends Model
{
    protected $table = "offboarding_request";
    protected $primaryKey = "reff_id";
    public $timestamps = false;

    protected $fillable = [
        'name',                                  // Name
        'email_address',                         // Email Address
        'application_id',                        // Application ID
        'department',                            // Department
        'required_hours',                        // Required Hours
        'completed_hours',                       // Completed Hours
        'google_drive_link',                     // Google Drive Link
        'testimonial_video_link',                // Testimonial Video Link
        'fb_page_review_link',                   // Facebook Page Review Link
        'certification',                         // Certification (radio button)
        'eval_form_link',                        // Evaluation Form Link
        'signature_docs_link',                   // Signature Documents Link
        'forward_email_link',                    // Forward Email Link
        'status'                                 // Status (default to 'Pending')
    ];

    
}