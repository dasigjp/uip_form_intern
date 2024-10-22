<?php

declare(strict_types=1);

use Phinx\Db\Action\AddColumn;
use Phinx\Migration\AbstractMigration;

final class OffboardingMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('offboarding_request', ['id' => false, 'primary_key' => ['reff_id']]);
        $table->addColumn('reff_id', 'integer', ['identity' => true])                    // Reference ID as primary key
              ->addColumn('name', 'string', ['limit' => 255, 'null' => false])            // Name
              ->addColumn('email_address', 'string', ['limit' => 255, 'null' => false])   // Email Address
              ->addColumn('application_id', 'integer', ['null' => false])                // Application ID
              ->addColumn('department', 'string', ['limit' => 255, 'null' => false])      // Department
              ->addColumn('required_hours', 'integer', ['null' => false])                // Required Hours
              ->addColumn('completed_hours', 'integer', ['null' => false])               // Completed Hours
              ->addColumn('google_drive_link', 'string', ['limit' => 255, 'null' => false]) // Google Drive Link
              ->addColumn('testimonial_video_link', 'string', ['limit' => 255, 'null' => true]) // Testimonial Video Link (optional)
              ->addColumn('fb_page_review_link', 'string', ['limit' => 255, 'null' => true])   // Facebook Page Review Link (optional)
              ->addColumn('certification', 'enum', ['values' => ['yes', 'no'], 'null' => false]) // Certification (Yes/No)
              ->addColumn('eval_form_link', 'string', ['limit' => 255, 'null' => false])  // Evaluation Form Link
              ->addColumn('signature_docs_link', 'string', ['limit' => 255, 'null' => false]) // Signature Docs Link
              ->addColumn('forward_email_link', 'string', ['limit' => 255, 'null' => false])   // Forward Email Link
              ->addColumn('status', 'string', ['default' => 'Pending', 'null' => false])  // Status (default to Pending)
              ->create();
        

    }


}
