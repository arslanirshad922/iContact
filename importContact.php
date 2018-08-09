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



if (isset($_POST['importContact'])) {
    //Validate CSV file
    $fileName = explode('.', $_FILES['csvFile']['name']);
    $extension = end($fileName);

    if ($extension == 'csv') {
        $FileToRead = fopen($_FILES['csvFile']['tmp_name'], 'r+');
        //Save file into Array() 
        $csv = array();
        while (($row = fgetcsv($FileToRead, 9999)) !== FALSE) {
            $csv[] = $row;
        }

        $countRow = count($csv);
        $oiContact = iContactApi::getInstance();
        try {
            for ($i = 1; $i < $countRow; $i++) {
                $fname = $csv[$i][0];
                $email = $csv[$i][1];
                //$oiContact->addContact($email, null, null, $fname, null, null, '123 Somewhere Ln', 'Apt 12', 'Somewhere', 'NW', '12345', '123-456-7890', '123-456-7890', null);
                $oiContact->addContact($email, null, null, $fname, null, null, '123 Somewhere Ln', 'Apt 12', 'Somewhere', 'NW', '12345', '123-456-7890', '123-456-7890', null);
            }
             die("<div style='width:100%; text-align:center;'><b>Contact imported Successfully..</b></br></br> <a href='index.php'>Go Back</a></div>");
        } catch (Exception $oException) { // Catch any exceptions
            // Dump errors
            var_dump($oiContact->getErrors());
            // Grab the last raw request data
            var_dump($oiContact->getLastRequest());
            // Grab the last raw response data
            var_dump($oiContact->getLastResponse());
        }
    }else{
        die("<div style='width:100%; text-align:center;'><b>Only CSV file can be uploaded.</b></br></br> <a href='index.php'>Try Again</a></div>");
    }
}else{
    die("<div style='width:100%; text-align:center;'><h3><b>Something wrong ...</b></h3></br> <a href='index.php'>Go Back</a></div>");
}