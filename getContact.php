<?php

ini_set('display_errors', true);
ini_set('error_reporting', E_ALL);
// Load the iContact library
require_once('lib/iContactApi.php');
// Give the API your information
iContactApi::getInstance()->setConfig(array(
     'appId' => 'mpONdWFfsz0fxMvCe0XjbqzDYGgWuxPG',
    'apiPassword' => 'pakistan123',
    'apiUsername' => 'arslanirshad922@gmail.com'
));



if (isset($_POST['contactGet'])) {
// Store the singleton
    $oiContact = iContactApi::getInstance();
// Try to make the call(s)
    try {
        //Get all contacts
        $allContacts = $oiContact->getContacts()->contacts;
        //Form Results for csv
        $results = array(array("Name", "Email"));
        foreach ($allContacts as $contact) {
            $results[] = array($contact->firstName, $contact->email);
        }
        //Generate CSV file
        download_csv_results($results, 'Contacts.csv');
        Exit;
    } catch (Exception $oException) { // Catch any exceptions
        // Dump errors
        var_dump($oiContact->getErrors());
        // Grab the last raw request data
        var_dump($oiContact->getLastRequest());
        // Grab the last raw response data
        var_dump($oiContact->getLastResponse());
    }
}

//Function to genertae CSV file
function download_csv_results($results, $name = NULL) {
    if (!$name) {
        $name = md5(uniqid() . microtime(TRUE) . mt_rand()) . '.csv';
    }
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename=' . $name);
    header('Pragma: no-cache');
    header("Expires: 0");
    $outstream = fopen("php://output", "w");
    foreach ($results as $result) {
        fputcsv($outstream, $result);
    }
    fclose($outstream);
}
