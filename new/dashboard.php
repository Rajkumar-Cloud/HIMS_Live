<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$_dashboard = new _dashboard();

// Run the page
$_dashboard->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>




<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>15</h3>

				<p>Active Doctors</p>
			</div>
			<div class="icon">
				<i class="fa fa-user-md" aria-hidden="true"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					53
				  
				</h3>

				<p>Active OP Patients</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>44</h3>

				<p>Active IP Patients</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>20</h3>

				<p>Active Nurses</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
</div>



<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box" style="color: #ffffff; background-color: #AE0505">
			<div class="inner">
				<h3>2</h3>

				<p>Pharmachist</p>
			</div>
			<div class="icon">
				<i class="fa fa-heartbeat" aria-hidden="true"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box" style="color: #ffffff; background-color: #AE7005">
			<div class="inner">
				<h3>
					2

				</h3>

				<p>Labratorist</p>
			</div>
			<div class="icon">
				<i class="fa fa-flask" aria-hidden="true"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box" style="color: #ffffff; background-color: #AE0597">
			<div class="inner">
				<h3>2</h3>

				<p>Accountant</p>
			</div>
			<div class="icon">
				<i class="fa fa-braille" aria-hidden="true"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box" style="color: #ffffff; background-color: #0556AE">
			<div class="inner">
				<h3>2</h3>

				<p>Receptionist</p>
			</div>
			<div class="icon">
				<i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
</div>





<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$_dashboard->terminate();
?>