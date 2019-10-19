<?php

//Require autoload file
require_once('vendor/autoload.php');

session_start();

/*
 * Name: Maxwell Lee
 * Date: 10/9/2019
 * File: index.php use for routing and store session data
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Get validation functions
//require_once ('model/validation.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Establish connection to database

//If the cart is not created yet, then initialize it
/*
if(!isset($_SESSION['user']))
{
    $_SESSION['user'] = new Guest();
}
*/

//define a default route
$f3->route('GET /', function()
{
    $view = new Template();
    echo $view->render('views/FSGtrainingDescription.html');
});

//portal route
$f3->route('GET /portal', function()
{
    $view = new Template();
    echo $view->render('portal/index.html');
});

$f3->route('GET|POST /personal_information', function($f3)
{
    if(!empty($_POST))
    {
        // get data from form
        $first = $_POST['first'];
        $last = $_POST['last'];
        $pronouns = $_POST['pronouns'];
        $address = $_POST['inputAddress'];
        $address2 = $_POST['inputAddress2'];
        $city = $_POST['inputCity'];
        $state = $_POST['inputState'];
        $zip = $_POST['inputZip'];
        $primaryPhone = $_POST['primary'];
        $primaryTime = $_POST['primary_time'];
        $alternatePhone = $_POST['alternate'];
        $alternateTime = $_POST['alternate_time'];
        $email = $_POST['email'];
        $preference = $_POST['preference'];
        $affiliate = $_POST['affiliate'];
        $member = $_POST['member'];
        $emergency_name = $_POST['emergency_name'];
        $emergency_phone = $_POST['emergency_phone'];

        // add data to hive
        $f3->set('fname', $first);
        $f3->set('lname', $last);
        $f3->set('pronouns', $pronouns);
        $f3->set('address', $address);
        $f3->set('address2', $address2);
        $f3->set('city', $city);
        $f3->set('state', $state);
        $f3->set('zip', $zip);
        $f3->set('primary_phone', $primaryPhone);
        $f3->set('primary_time', $primaryTime);
        $f3->set('alternate_phone', $alternatePhone);
        $f3->set('alternate_time', $alternateTime);
        $f3->set('affiliate', $affiliate);
        $f3->set('member', $member);
        $f3->set('emergency_name', $emergency_name);
        $f3->set('emergency_phone', $emergency_phone);

        // validate data

        $_SESSION['PersonalInfo'] = new PersonalInfo($first, $last, $pronouns, $address, $address2, $city, $state, $zip,
            $primaryPhone, $primaryTime, $alternatePhone, $alternateTime, $email, $preference, $affiliate, $member,
            $emergency_name, $emergency_phone);
        $f3->reroute('/additional_information');
    }

   $view = new Template();
   echo $view->render('views/form1.html');
});

$f3->route('GET|POST /additional_information', function($f3)
{
    if(!empty($_POST))
    {
        // get data from form
        $specialNeeds = $_POST['specialNeeds'];
        $serviceAnimal = $_POST['serviceAnimal'];
        $movementDisability = $_POST['movementDisability'];
        $noAccommodations = $_POST['noAccommodations'];
        $needRoom = $_POST['needRoom'];
        $daysRooming = $_POST['daysRooming'];
        $roommate = $_POST['roommate'];
        $gender = $_POST['gender'];
        $roommateGender = $_POST['roommateGender'];
        $cpap = $_POST['cpap'];
        $cpapRoommate = $_POST['cpapRoommate'];
        $singleRoom = $_POST['singleRoom'];

        // add data to hive
        $f3->set('specialNeeds', $specialNeeds);
        $f3->set('serviceAnimal', $serviceAnimal);
        $f3->set('movementDisability', $movementDisability);
        $f3->set('noAccommodations', $noAccommodations);
        $f3->set('needRoom', $needRoom);
        $f3->set('daysRooming', $daysRooming);
        $f3->set('roommate', $roommate);
        $f3->set('gender', $gender);
        $f3->set('roommateGender', $roommateGender);
        $f3->set('cpap', $cpap);
        $f3->set('cpapRoommate', $cpapRoommate);
        $f3->set('singleRoom', $singleRoom);

        // validate data

        $_SESSION['AdditionalInfo'] = new AdditionalInfo($specialNeeds, $serviceAnimal, $movementDisability,
            $noAccommodations, $needRoom, $daysRooming, $roommate, $gender, $roommateGender, $cpap, $cpapRoommate,
            $singleRoom);
        $f3->reroute('/long_answer');
    }

    $view = new Template();
    echo $view->render('views/form2.html');
});

$f3->route('GET|POST /long_answer', function($f3)
{
    if(!empty($_POST))
    {
        // get data from form
        $relativeMentalIllness = $_POST['relativeMentalIllness'];
        $heardAboutTraining = $_POST['heardAboutTraining'];
        $convict = $_POST['convict'];
        $whyFacilitator = $_POST['whyFacilitator'];
        $experience = $_POST['experience'];
        $trained = $_POST['trained'];
        $trainedText = $_POST['trainedText'];
        $certified = $_POST['certified'];
        $certifiedText = $_POST['certifiedText'];
        $coFacWhom = $_POST['coFacWhom'];
        $coFacWhomText = $_POST['coFacWhomText'];
        $coFacWhere = $_POST['coFacWhere'];
        $coFacWhereText = $_POST['coFacWhereText'];

        // add data to hive
        $f3->set('relativeMentalIllness', $relativeMentalIllness);
        $f3->set('heardAboutTraining', $heardAboutTraining);
        $f3->set('convict', $convict);
        $f3->set('whyFacilitator', $whyFacilitator);
        $f3->set('experience', $experience);
        $f3->set('trained', $trained);
        $f3->set('trainedText', $trainedText);
        $f3->set('certified', $certified);
        $f3->set('certifiedText', $certifiedText);
        $f3->set('coFacWhom', $coFacWhom);
        $f3->set('coFacWhomText', $coFacWhomText);
        $f3->set('coFacWhere', $coFacWhere);
        $f3->set('coFacWhereText', $coFacWhereText);

        // validate data

        $_SESSION['LongAnswers'] =  new LongAnswers($relativeMentalIllness, $heardAboutTraining, $convict,
            $whyFacilitator, $experience, $trained, $trainedText, $certified, $certifiedText, $coFacWhom, $coFacWhomText,
            $coFacWhere, $coFacWhereText);
        $f3->reroute('/review');
    }

    $view = new Template();
    echo $view->render('views/longAnswer.html');
});

$f3->route('GET|POST /review', function()
{
    $view = new Template();
    echo $view->render('views/review.html');
});

$f3->route('GET|POST /performance_agreement', function() {
    $view = new Template();
    echo $view->render('views/performanceAgreement.html');
});

//test route
$f3->route('GET|POST /test', function()
{
    $view = new Template();
    echo $view->render('views/FSGtrainingDescription.html');
});

//Run fat-free
$f3->run();
