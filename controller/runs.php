<?php
require_once("../service/page.service.php");
require_once("../service/runs.service.php");



$pageservice = new PAGESERVICE();
$currentPageID = "Manage Runs";
$navbarlinks = $pageservice->generateNavLinks();
$usefulllinks = $pageservice->generateUsefulLinks(5);
$featuredlinks = $pageservice->generateFeaturedLinks(5);

$runservice = new runservice();

if(isset($_GET["addRun"]) && $_GET["addRun"] == 1 && isset($_POST["runName"]) && isset($_POST["runDate"])){
	if($_POST["runName"] == "" || $_POST["runDate"] == ""){
		//print('Fill in Name and Time');
	}
	else{
		$runservice->addRun($_POST["runName"], $_POST["runDate"]);
	}
	
}

if(isset($_GET["editrun"]) && is_numeric($_GET["editrun"])){
	$runinfo = $runservice->getRunById($_GET["editrun"]);
}

$eventlist = $runservice->listAllEvents();

include("../view/runs.view.php");
?>