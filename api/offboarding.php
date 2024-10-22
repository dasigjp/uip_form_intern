<?php

require "../vendor/autoload.php";
use API\Validation\OffboardingValidation;
use API\Model\OffboardingRequest;
use API\Connection\DatabaseConnection;
use API\Controller\OffboardingController;



if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    foreach ($_POST as $key => $value) {
        if ($value === ''){
            $_POST[$key] = null;
        }
    }
    $validation = new OffboardingValidation();

    $validated = $validation->validate($_POST);

    if ($validated->fails()){
        $errors = $validated->errors()->all();
        http_response_code(422);
        header('Content-Type: application/json');
        echo json_encode(['errors' => $errors]);
    }

    else {
        $database_initialization = new DatabaseConnection();

        $offboarding_controller = new OffboardingController();

        $data_insertion = $offboarding_controller->store($_POST);


        if ($data_insertion){
            $reff_id = $offboarding_controller->get_reffid();


            $response = [
                'reff_id' => $reff_id
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
        }
        else {
            http_response_code(422);
            header('Content-Type: application/json');
            echo json_encode(['database_error' => 'Database Error']);
        }

        


    }   


}   

?>