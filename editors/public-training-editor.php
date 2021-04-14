    <link rel="icon" href="images/RS_icon.png" type="image/png">
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/style.css">
	
	<?php

// Tables for this example.php see file: 'test.sql'

session_start();
require_once("mte/mte.php");
include '../dbdetails.php';
include '../header-common.php';

//remove menu for now to cut out cookie banner issues
//include '../menu.php';

#blank lines to move content below menu
echo '<br><br>';

$tabledit = new MySQLtabledit();


		#####################
		# required settings #
		#####################


# database settings:
$tabledit->database = $pdo_dbname;
$tabledit->host = 'localhost';
$tabledit->user = $pdo_user;
$tabledit->pass = $pdo_password;


# table of the database you want to edit:
$tabledit->table = 'PublicTrainingSchedule';


# the primary key of the table (must be AUTO_INCREMENT):
$tabledit->primary_key = 'ID';


# the fields you want to see in "list view"
# Always add the primary key
$tabledit->fields_in_list_view = array('ID','Title','DescriptionLink','Location','Date','Time','BookingText','BookingLink','Visible');



		#####################
		# optional settings #
		#####################


# Head of the page (<h1>head_1<h1>):
$tabledit->head_1 = "Public Training Editor";


# language (en=English, de=German, fr=French, nl=Dutch, sv=Swedish):
$tabledit->language = 'en';


# numbers of rows/records in "list view": 
$tabledit->num_rows_list_view = 100;


# required fields in edit or add record: 
$tabledit->fields_required = array('Title','DescriptionLink','Location','Date','Time','BookingText','BookingLink', 'Visible');


# Fields you want to edit (remove this to edit all the fields).
# $tabledit->fields_to_edit = array('lastName','email','job');


# help texts: 
$tabledit->help_text = array(
	'ID' => "Don't edit this field",
	'Title' => 'Use standard title from course list',
	'DescriptionLink' => 'Use full link e.g. https://www.regsol.ie/training-courses.php#GDPR',
	'Location' => 'City first (helps for sorting)',
	'Date' => 'e.g. 2019-02-28',
	'Time' => 'e.g. 09:00 - 11:00',
	'BookingText' => 'Text to appear on web page',
	'BookingLink' => 'EventBrite link',
	'Visible' => '1 or 0'
);


# visible name of the fields: 
/*
$tabledit->show_text = array(
	'ID' => 'Number',
	'active' => 'Active',
	'firstName' => 'First name',
	'lastName' => 'Last name',
	'email' => 'Email',
	'job' => 'Job'
);


# visible name of the fields in list view: 
$tabledit->show_text_listview = array(
	'employeeNumber' => 'Number',
	'active' => 'Active',
	'firstName' => 'First name',
	'lastName' => 'Last name',
	'email' => 'Email',
	'job' => 'Job'
);


# Make selectlist on inputfield based on another table
# in this example: `employees`.`job` is based on `jobs`.`jobname`: 
$tabledit->lookup_table = array(
	'job' => array(
		'query' => "SELECT `id`, `jobname` FROM `jobs`;",
		'option_value' => 'id',
		'option_text' => 'jobname'
	)
);
*/

$tabledit->width_editor = '100%';
$tabledit->width_input_fields = '500px';
$tabledit->width_text_fields = '498px';
$tabledit->height_text_fields = '200px';


# warning no .htaccess ('on' or 'off'): 
$tabledit->no_htaccess_warning = 'off';



		####################################
		# connect, show editor, disconnect #
		####################################


$tabledit->database_connect();

echo "<!DOCTYPE html>
<html lang='en'>
<head>

	<meta charset='utf-8'>

	<title>MySQL table edit</title>
	</head>
	<body>
";

$tabledit->do_it();


echo "
	</body>
	</html>"
;

$tabledit->database_disconnect();
?>

<script type="text/javascript">

	//Hide cookie prefs while we set it up			
	$('#sidebar').toggleClass('active');
	$('#overlay').toggleClass('active');
	
</script>
