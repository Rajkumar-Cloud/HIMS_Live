<?php
namespace PHPMaker2020\HIMS;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Filter for 'Last Month' (example)
function GetLastMonthFilter($FldExpression, $dbid = 0) {
	$today = getdate();
	$lastmonth = mktime(0, 0, 0, $today['mon']-1, 1, $today['year']);
	$val = date("Y|m", $lastmonth);
	$wrk = $FldExpression . " BETWEEN " .
		QuotedValue(DateValue("month", $val, 1, $dbid), DATATYPE_DATE, $dbid) .
		" AND " .
		QuotedValue(DateValue("month", $val, 2, $dbid), DATATYPE_DATE, $dbid);
	return $wrk;
}

// Filter for 'Starts With A' (example)
function GetStartsWithAFilter($FldExpression, $dbid = 0) {
	return $FldExpression . Like("'A%'", $dbid);
}

// Global user functions
// Database Connecting event
function Database_Connecting(&$info) {

	// Example:
	//var_dump($info);
	//if ($info["id"] == "DB" && CurrentUserIP() == "127.0.0.1") { // Testing on local PC
	//	$info["host"] = "locahost";
	//	$info["user"] = "root";
	//	$info["pass"] = "";
	//}

}

// Database Connected event
function Database_Connected(&$conn) {

	// Example:
	//if ($conn->info["id"] == "DB")
	//	$conn->Execute("Your SQL");

}

function MenuItem_Adding($item) {

	//var_dump($item);
	// Return FALSE if menu item not allowed

if ($item->Text == "Create Bill")
{
	$item->Url = "view_billing_voucheradd.php?showdetail=view_patient_services";
}
if ($item->Text == "Create Advance")
{
	$item->Url = "billing_other_voucheradd.php";
}
if ($item->Text == "Refund")
{
	$item->Url = "billing_refund_voucheradd.php";
}
if ($item->Text == "CreateTill")
{
	$item->Url = "depositdetailsadd.php";
}
		if(CurrentUserLevel() == '-1')   ////  Administrator
		{
				if ($item->Text == "Till")
				{
					return TRUE;
				}
					if ($item->Text == "Billing")
				{
					return TRUE;
				}
				if ($item->Text == "Deposit")
				{
					return TRUE;
				}
				if ($item->Text == "Monitor Treatment Plan")
				{
					return TRUE;
				}
				if ($item->Text == "Bill Collection Report")
				{
					return TRUE;
				}
				if ($item->Text == "Collection Summary")
				{
					return TRUE;
				}
				if ($item->Text == "Patient")
				{
					return TRUE;
				}
				if ($item->Text == "Service")
				{
					return TRUE;
				}
				if ($item->Text == "Collection")
				{
					return TRUE;
				}
				if ($item->Text == "Help")
				{
					return TRUE;
				}
				if ($item->Text == "SMS")
				{
					return TRUE;
				}
				if ($item->Text == "Purchase Approve")
				{
					return TRUE;
				}
				if ($item->Text == "Dash Board")
				{
					return TRUE;
				}
		}
		if(CurrentUserLevel() == '1')   ////  Admin
		{
				if ($item->Text == "Till")
				{
					return TRUE;
				}
					if ($item->Text == "Billing")
				{
					return TRUE;
				}
				if ($item->Text == "Deposit")
				{
					return TRUE;
				}
				if ($item->Text == "Monitor Treatment Plan")
				{
					return TRUE;
				}
				if ($item->Text == "Bill Collection Report")
				{
					return TRUE;
				}
				if ($item->Text == "Collection Summary")
				{
					return TRUE;
				}
				if ($item->Text == "Patient")
				{
					return TRUE;
				}
				if ($item->Text == "Service")
				{
					return TRUE;
				}
				if ($item->Text == "Collection")
				{
					return TRUE;
				}
				if ($item->Text == "Help")
				{
					return TRUE;
				}
				if ($item->Text == "SMS")
				{
					return TRUE;
				}
				if ($item->Text == "Purchase Approve")
				{
					return TRUE;
				}
				if ($item->Text == "Dash Board")
				{
					return TRUE;
				}
		}
			if(CurrentUserLevel() == '2')   ////  AFDutydoctor
		{
				if ($item->Text == "IP Admission")
				{
					return true;
				}
		}
		if(CurrentUserLevel() == '4')   ////  Reception
		{
				if ($item->Text == "Till")
				{
					return TRUE;
				}
					if ($item->Text == "Billing")
				{
					return TRUE;
				}
				if ($item->Text == "Deposit")
				{
					return TRUE;
				}
								if ($item->Text == "Till")
				{
					return TRUE;
				}
					if ($item->Text == "Billing")
				{
					return TRUE;
				}
				if ($item->Text == "Deposit")
				{
					return TRUE;
				}
				if ($item->Text == "Monitor Treatment Plan")
				{
					return TRUE;
				}
				if ($item->Text == "Bill Collection Report")
				{
					return TRUE;
				}
				if ($item->Text == "Collection Summary")
				{
					return TRUE;
				}
				if ($item->Text == "Patient")
				{
					return TRUE;
				}
				if ($item->Text == "Service")
				{
					return TRUE;
				}
				if ($item->Text == "Collection")
				{
					return TRUE;
				}
				if ($item->Text == "Help")
				{
					return TRUE;
				}
				if ($item->Text == "SMS")
				{
					return TRUE;
				}
				if ($item->Text == "Purchase Approve")
				{
					return TRUE;
				}
				if ($item->Text == "Dash Board")
				{
					return TRUE;
				}
				if ($item->Text == "Login")
				{
					return false;
				}
				if ($item->Text == "System")
				{
					return false;
				}
				if ($item->Text == "SMS")
				{
					return false;
				}
		}
		if(CurrentUserLevel() == '5')   ////  Billing
		{
				if ($item->Text == "Till")
				{
					return TRUE;
				}
					if ($item->Text == "Billing")
				{
					return TRUE;
				}
				if ($item->Text == "Deposit")
				{
					return TRUE;
				}
		}
		if(CurrentUserLevel() == '6')   ////  Accounts
		{
				if ($item->Text == "Till")
				{
					return TRUE;
				}
					if ($item->Text == "Billing")
				{
					return TRUE;
				}
				if ($item->Text == "Deposit")
				{
					return TRUE;
				}
					if ($item->Text == "Till")
				{
					return TRUE;
				}
					if ($item->Text == "Billing")
				{
					return TRUE;
				}
				if ($item->Text == "Deposit")
				{
					return TRUE;
				}
				if ($item->Text == "Monitor Treatment Plan")
				{
					return TRUE;
				}
				if ($item->Text == "Bill Collection Report")
				{
					return TRUE;
				}
				if ($item->Text == "Collection Summary")
				{
					return TRUE;
				}
				if ($item->Text == "Patient")
				{
					return TRUE;
				}
				if ($item->Text == "Service")
				{
					return TRUE;
				}
				if ($item->Text == "Collection")
				{
					return TRUE;
				}
				if ($item->Text == "Help")
				{
					return TRUE;
				}
				if ($item->Text == "SMS")
				{
					return TRUE;
				}
				if ($item->Text == "Purchase Approve")
				{
					return TRUE;
				}
				if ($item->Text == "Dash Board")
				{
					return TRUE;
				}
					if ($item->Text == "Collection")
				{
					return TRUE;
				}
				if ($item->Text == "Help")
				{
					return TRUE;
				}
				if ($item->Text == "SMS")
				{
					return TRUE;
				}
				if ($item->Text == "Purchase Approve")
				{
					return TRUE;
				}
				if ($item->Text == "Dash Board")
				{
					return TRUE;
				}
				if ($item->Text == "Login")
				{
					return false;
				}
				if ($item->Text == "System")
				{
					return false;
				}
				if ($item->Text == "SMS")
				{
					return false;
				}
								if ($item->Text == "Bill Collection Report")
				{
					return TRUE;
				}
								if ($item->Text == "Diff Bills")
				{
					return TRUE;
				}
								if ($item->Text == "Collection Summary")
				{
					return TRUE;
				}
				if ($item->Text == "Patient")
				{
					return TRUE;
				}
				if ($item->Text == "Service")
				{
					return TRUE;
				}
				if ($item->Text == "Collection")
				{
					return TRUE;
				}
				if ($item->Text == "Diff Bills")
				{
					return TRUE;
				}
		}
		if(CurrentUserLevel() == '9')   ////  Nursing coordinator
		{
			if ($item->Text == "Till")
				{
					return TRUE;
				}
					if ($item->Text == "Billing")
				{
					return TRUE;
				}
				if ($item->Text == "Deposit")
				{
					return TRUE;
				}
				if ($item->Text == "Monitor Treatment Plan")
				{
					return TRUE;
				}
				if ($item->Text == "Bill Collection Report")
				{
					return TRUE;
				}
				if ($item->Text == "Collection Summary")
				{
					return TRUE;
				}
				if ($item->Text == "Patient")
				{
					return TRUE;
				}
				if ($item->Text == "Service")
				{
					return TRUE;
				}
				if ($item->Text == "Collection")
				{
					return TRUE;
				}
				if ($item->Text == "Help")
				{
					return TRUE;
				}
				if ($item->Text == "SMS")
				{
					return TRUE;
				}
				if ($item->Text == "Purchase Approve")
				{
					return TRUE;
				}
				if ($item->Text == "Dash Board")
				{
					return TRUE;
				}
				if ($item->Text == "Monitor Treatment Plan")
				{
					return TRUE;
				}
				if ($item->Text == "Bill Collection Report")
				{
					return TRUE;
				}
				if ($item->Text == "Collection Summary")
				{
					return TRUE;
				}
				if ($item->Text == "Procedure Registered")
				{
					return TRUE;
				}
				if ($item->Text == "Delivery Registered")
				{
					return TRUE;
				}
				if ($item->Text == "ICSI Advised")
				{
					return TRUE;
				}
				if ($item->Text == "Review Date")
				{
					return TRUE;
				}
				if ($item->Text == "Employee")
				{
					return TRUE;
				}
				if ($item->Text == "SMS")
				{
					return TRUE;
				}
				if ($item->Text == "Billing")
				{
					return TRUE;
				}
		}
		if(CurrentUserLevel() == '14')   ////  Lab Technician
		{
		if ($item->Text == "Procedure Registered")
				{
					return false;
				}
				if ($item->Text == "Delivery Registered")
				{
					return false;
				}
				if ($item->Text == "ICSI Advised")
				{
					return false;
				}
				if ($item->Text == "Review Date")
				{
					return false;
				}
				if ($item->Text == "Procedure List")
				{
					return false;
				}
				if ($item->Text == "Appointment")
				{
					return false;
				}
				if ($item->Text == "IUI Excel")
				{
					return false;
				}
				if ($item->Text == "Patient Registration")
				{
					return false;
				}
				if ($item->Text == "Discharge Summary")
				{
					return false;
				}
				if ($item->Text == "Fertility")
				{
					return false;
				}
if ($item->Text == "Pharmacy")
				{
					return false;
				}
				if ($item->Text == "Doctor Notes")
				{
					return false;
				}
			if ($item->Text == "Doctor Notes")
				{
					return false;
				}
			if ($item->Text == "Embryology")
				{
					return false;
				}
			if ($item->Text == "Andrology")
				{
					return false;
				}
			if ($item->Text == "Employee")
				{
					return false;
				}
			if ($item->Text == "Reports")
				{
					return false;
				}
			if ($item->Text == "Prescription")
				{
					return false;
				}
			if ($item->Text == "Master")
			{
				return false;
			}
			if ($item->Text == "Settings")
			{
				return false;
			}
			if ($item->Text == "Login")
			{
				return false;
			}
			if ($item->Text == "System")
			{
				return false;
			}
			if ($item->Text == "Stores")
			{
				return false;
			}
				if ($item->Text == "Till")
				{
					return TRUE;
				}
					if ($item->Text == "Billing")
				{
					return TRUE;
				}
				if ($item->Text == "Deposit")
				{
					return TRUE;
				}
		}
		if(CurrentUserLevel() == '27')   ////  AFLab
		{
				if ($item->Text == "Procedure Registered")
				{
					return false;
				}
				if ($item->Text == "Delivery Registered")
				{
					return false;
				}
				if ($item->Text == "ICSI Advised")
				{
					return false;
				}
				if ($item->Text == "Review Date")
				{
					return false;
				}
				if ($item->Text == "Procedure List")
				{
					return false;
				}
				if ($item->Text == "Appointment")
				{
					return false;
				}
				if ($item->Text == "IUI Excel")
				{
					return false;
				}
				if ($item->Text == "Patient Registration")
				{
					return false;
				}
				if ($item->Text == "Discharge Summary")
				{
					return false;
				}
				if ($item->Text == "Fertility")
				{
					return false;
				}
if ($item->Text == "Pharmacy")
				{
					return false;
				}
				if ($item->Text == "Doctor Notes")
				{
					return false;
				}
			if ($item->Text == "Doctor Notes")
				{
					return false;
				}
			if ($item->Text == "Embryology")
				{
					return false;
				}
			if ($item->Text == "Andrology")
				{
					return false;
				}
			if ($item->Text == "Employee")
				{
					return false;
				}
			if ($item->Text == "Reports")
				{
					return false;
				}
			if ($item->Text == "Prescription")
				{
					return false;
				}
			if ($item->Text == "Master")
			{
				return false;
			}
			if ($item->Text == "Settings")
			{
				return false;
			}
			if ($item->Text == "Login")
			{
				return false;
			}
			if ($item->Text == "System")
			{
				return false;
			}
			if ($item->Text == "Stores")
			{
				return false;
			}
				if ($item->Text == "Till")
				{
					return TRUE;
				}
					if ($item->Text == "Billing")
				{
					return TRUE;
				}
				if ($item->Text == "Deposit")
				{
					return TRUE;
				}
		}
			if(CurrentUserLevel() == '17')   ////  AFDutydoctor
		{
			if ($item->Text == "Pharmacy")
				{
					return false;
				}
			if ($item->Text == "Appointment")
				{
					return false;
				}
			if ($item->Text == "Till")
				{
					return false;
				}
			if ($item->Text == "Employee")
				{
					return false;
				}
				if ($item->Text == "Billing")
				{
					return false;
				}
				if ($item->Text == "Lab")
				{
					return false;
				}
			if ($item->Text == "Reports")
				{
					return false;
				}
			if ($item->Text == "Prescription")
				{
					return false;
				}
			if ($item->Text == "Master")
			{
				return false;
			}
			if ($item->Text == "Settings")
			{
				return false;
			}
			if ($item->Text == "Login")
			{
				return false;
			}
			if ($item->Text == "System")
			{
				return false;
			}
			if ($item->Text == "Stores")
			{
				return false;
			}
		}
		if(CurrentUserLevel() == '18')   ////  Andrology
		{
				if ($item->Text == "New Patient")
				{
					return false;
				}
				if ($item->Text == "Patient Registration")
				{
					return false;
				}
				if ($item->Text == "IP Admission")
				{
					return false;
				}
				if ($item->Text == "Doctor Notes")
				{
					return false;
				}
				if ($item->Text == "Doctor Notes")
				{
					return false;
				}
			if ($item->Text == "Pharmacy")
				{
					return false;
				}
			if ($item->Text == "Appointment")
				{
					return false;
				}
			if ($item->Text == "Till")
				{
					return false;
				}
			if ($item->Text == "Employee")
				{
					return false;
				}
				if ($item->Text == "Billing")
				{
					return false;
				}
				if ($item->Text == "Lab")
				{
					return false;
				}
			if ($item->Text == "Reports")
				{
					return false;
				}
			if ($item->Text == "Prescription")
				{
					return false;
				}
			if ($item->Text == "Master")
			{
				return false;
			}
			if ($item->Text == "Settings")
			{
				return false;
			}
			if ($item->Text == "Login")
			{
				return false;
			}
			if ($item->Text == "System")
			{
				return false;
			}
			if ($item->Text == "Stores")
			{
				return false;
			}
		}
		if(CurrentUserLevel() == '19')   ////  Embryology
		{
				if ($item->Text == "New Patient")
				{
					return false;
				}
				if ($item->Text == "Patient Registration")
				{
					return false;
				}
				if ($item->Text == "IP Admission")
				{
					return false;
				}
				if ($item->Text == "Doctor Notes")
				{
					return false;
				}
				if ($item->Text == "Doctor Notes")
				{
					return false;
				}
			if ($item->Text == "Pharmacy")
				{
					return false;
				}
			if ($item->Text == "Appointment")
				{
					return false;
				}
			if ($item->Text == "Till")
				{
					return false;
				}
			if ($item->Text == "Employee")
				{
					return false;
				}
				if ($item->Text == "Billing")
				{
					return false;
				}
				if ($item->Text == "Lab")
				{
					return false;
				}
			if ($item->Text == "Reports")
				{
					return false;
				}
			if ($item->Text == "Prescription")
				{
					return false;
				}
			if ($item->Text == "Master")
			{
				return false;
			}
			if ($item->Text == "Settings")
			{
				return false;
			}
			if ($item->Text == "Login")
			{
				return false;
			}
			if ($item->Text == "System")
			{
				return false;
			}
			if ($item->Text == "Stores")
			{
				return false;
			}
		}
		if(CurrentUserLevel() == '21')   ////  AFFrontoffice
		{
				if ($item->Text == "Doctor Notes")
				{
					return false;
				}
				if ($item->Text == "Embryology")
				{
					return false;
				}
				if ($item->Text == "Andrology")
				{
					return false;
				}
				if ($item->Text == "Employee")
				{
					return false;
				}
				if ($item->Text == "Reports")
				{
					return false;
				}
				if ($item->Text == "Prescription")
				{
					return false;
				}
			if ($item->Text == "Master")
			{
				return false;
			}
			if ($item->Text == "Settings")
			{
				return false;
			}
			if ($item->Text == "Login")
			{
				return false;
			}
			if ($item->Text == "System")
			{
				return false;
			}
			if ($item->Text == "Stores")
			{
				return false;
			}
				if ($item->Text == "Till")
				{
					return TRUE;
				}
					if ($item->Text == "Billing")
				{
					return TRUE;
				}
				if ($item->Text == "Deposit")
				{
					return TRUE;
				}
		}
			if(CurrentUserLevel() == '28')   ////  AFAccountant
		{
				if ($item->Text == "Doctor Notes")
				{
					return false;
				}
				if ($item->Text == "Embryology")
				{
					return false;
				}
				if ($item->Text == "Andrology")
				{
					return false;
				}
				if ($item->Text == "Employee")
				{
					return false;
				}
				if ($item->Text == "Reports")
				{
					return false;
				}
				if ($item->Text == "Prescription")
				{
					return false;
				}
			if ($item->Text == "Master")
			{
				return false;
			}
			if ($item->Text == "Settings")
			{
				return false;
			}
			if ($item->Text == "Login")
			{
				return false;
			}
			if ($item->Text == "System")
			{
				return false;
			}
			if ($item->Text == "Stores")
			{
				return false;
			}
				if ($item->Text == "Till")
				{
					return TRUE;
				}
					if ($item->Text == "Billing")
				{
					return TRUE;
				}
				if ($item->Text == "Deposit")
				{
					return TRUE;
				}

				//================================
				//================================
				//=================================

				if ($item->Text == "Fertility")
				{
					return false;
				}
				if ($item->Text == "Pharmacy")
				{
					return false;
				}
				if ($item->Text == "Batch Master")
				{
					return false;
				}
				if ($item->Text == "Transfer")
				{
					return false;
				}
				if ($item->Text == "Lab")
				{
					return false;
				}
				if ($item->Text == "Fertility")
				{
					return false;
				}
				if ($item->Text == "Follow Ups")
				{
					return false;
				}
				if ($item->Text == "Discharge Summary")
				{
					return false;
				}
				if ($item->Text == "Issue")
				{
					return false;
				}
				if ($item->Text == "Patient Registration")
				{
					return false;
				}
				if ($item->Text == "IUI Excel")
				{
					return false;
				}
				if ($item->Text == "IP Admission")
				{
					return false;
				}
				if ($item->Text == "Review Date")
				{
					return false;
				}
				if ($item->Text == "ICSI Advised")
				{
					return false;
				}
				if ($item->Text == "Delivery Registered")
				{
					return false;
				}
				if ($item->Text == "Procedure Registered")
				{
					return false;
				}
								if ($item->Text == "Appointment")
				{
					return false;
				}
								if ($item->Text == "New Patient")
				{
					return false;
				}
				if ($item->Text == "Bill Collection Report")
				{
					return true;
				}
				if ($item->Text == "Collection Summary")
				{
					return true;
				}

				//========================
				//========================

		}
		if(CurrentUserLevel() == '24')  ////AFPharmacy    ------  pharmacy@a4fertility.com
		{
				if ($item->Text == "Doctor Notes")
				{
					return false;
				}
				if ($item->Text == "Embryology")
				{
					return false;
				}
				if ($item->Text == "Andrology")
				{
					return false;
				}
				if ($item->Text == "Employee")
				{
					return false;
				}
				if ($item->Text == "Reports")
				{
					return false;
				}
				if ($item->Text == "Prescription")
				{
					return false;
				}
			if ($item->Text == "Master")
			{
				return false;
			}
			if ($item->Text == "Settings")
			{
				return false;
			}
			if ($item->Text == "Login")
			{
				return false;
			}
			if ($item->Text == "System")
			{
				return false;
			}
			if ($item->Text == "Stores")
			{
				return false;
			}
			if ($item->Text == "Fertility")
			{
				return false;
			}
			if ($item->Text == "Lab")
			{
				return false;
			}
			if ($item->Text == "Procedure List")
			{
				return false;
			}
			if ($item->Text == "Appointment")
			{
				return false;
			}
			if ($item->Text == "Patient Registration")
			{
				return false;
			}
			if ($item->Text == "Discharge Summary")
			{
				return false;
			}
			if ($item->Text == "Billing")
			{
				return false;
			}
				if ($item->Text == "Till")
				{
					return TRUE;
				}
				if ($item->Text == "Deposit")
				{
					return TRUE;
				}
		}
		if(CurrentUserLevel() == '22')  ////AFPC    ------  
		{
				if ($item->Text == "Monitor Treatment Plan")
				{
					return TRUE;
				}
				if ($item->Text == "Billing")
				{
					return TRUE;
				}
		}
				if ($item->Text == "Till")
				{
					return false;
				}
					if ($item->Text == "Billing")
				{
					return false;
				}
				if ($item->Text == "Deposit")
				{
					return false;
				}
				if ($item->Text == "Monitor Treatment Plan")
				{
					return false;
				}
				if ($item->Text == "Bill Collection Report")
				{
					return false;
				}
				if ($item->Text == "Collection Summary")
				{
					return false;
				}
				if ($item->Text == "Patient")
				{
					return false;
				}
				if ($item->Text == "Service")
				{
					return false;
				}
				if ($item->Text == "Collection")
				{
					return false;
				}
				if ($item->Text == "Help")
				{
					return false;
				}
				if ($item->Text == "SMS")
				{
					return false;
				}
				if ($item->Text == "Purchase Approve")
				{
					return false;
				}
				if ($item->Text == "Dash Board")
				{
					return false;
				}
	return TRUE;
	return TRUE;
}

function Menu_Rendering($menu) {

	// Change menu items here
}

function Menu_Rendered($menu) {

	// Clean up here
}

// Page Loading event
function Page_Loading() {

	//echo "Page Loading";
}

// Page Rendering event
function Page_Rendering() {

	//echo "Page Rendering";
}

// Page Unloaded event
function Page_Unloaded() {

	//echo "Page Unloaded";
}

// AuditTrail Inserting event
function AuditTrail_Inserting(&$rsnew) {

	//var_dump($rsnew);
	return TRUE;
}

// Personal Data Downloading event
function PersonalData_Downloading(&$row) {

	//echo "PersonalData Downloading";
}

// Personal Data Deleted event
function PersonalData_Deleted($row) {

	//echo "PersonalData Deleted";
}

function ActiveStatusbit()
{
	return 1;
}

function profilepic()
{
   	return "hims\profile-picture.png";
}

function HospitalID()
{
	$UserProfile = new UserProfile();
	$HospID =  $UserProfile->Profile['HospID'];
	return $HospID;
}

function PharmacyID()
{
	$UserProfile = new UserProfile();
	$PharID =  $UserProfile->Profile['PharID'];
	return $PharID;
}

function GetUserID()
{
	$UserProfile = new UserProfile();
	$UserID =  $UserProfile->Profile['id'];
	return $UserID;
}

function GetUserName()
{
	$UserProfile = new UserProfile();
	$UserName =  $UserProfile->Profile['User_Name'];
	return $UserName;
}

function GetMaleDonor()
{
	return '0';
}

function getPatientID($HospID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT(DATE_FORMAT(CURDATE(), '%y'), DATE_FORMAT(CURDATE(), '%m'), LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.patient
where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getAPPID($HospID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT(DATE_FORMAT(CURDATE(), '%y'), DATE_FORMAT(CURDATE(), '%m'), LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.patient_app
where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getmrnNo($HospID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT(DATE_FORMAT(CURDATE(), '%y'), DATE_FORMAT(CURDATE(), '%m'), DATE_FORMAT(CURDATE(), '%d') , LPAD(CAST((count(*) + 1 ) as CHAR(50)), 3, '0')) as COUNT
FROM ganeshkumar_bjhims.ip_admission
where createddatetime between CURDATE() and CURDATE() + INTERVAL 1 DAY and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getLABServiceID($HospID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT (count(LabTest) + 1) as COUNT
FROM ganeshkumar_bjhims.billing_voucher
where HospID='".$HospID."'   and LabTest = 'LabTest';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getBillNo($HospID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.billing_voucher
where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getBillNoOP($HospID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.billing_voucher
where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."'  and BillType='OP';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getBillNoIP($HospID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.billing_voucher
where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."'  and BillType='IP';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getIPBillNo($HospID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.view_ip_billing
where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getPharIDBillNo($PharID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.pharmacy_billing_voucher
where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and PharID='".$PharID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getPharIDISSNo($PharID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.pharmacy_billing_issue
where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and PharID='".$PharID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getPharIDRNBillNo($PharID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.pharmacy_billing_return
where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and PharID='".$PharID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getAdvanceNo($HospID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.billing_other_voucher
where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getReFundNo($HospID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.billing_refund_voucher
where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getPONo($HospID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.pharmacy_po
where DT between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getGRNNo($HospID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.pharmacy_grn
where DT between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getPropic($pID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT profilePic FROM ganeshkumar_bjhims.patient where id='".$pID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[profilePic];
	if($IIDD == '')
	{
		$IIDD = "hims\profile-picture.png";
	}
	return $IIDD;
}

function getSRefer($pID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT  * FROM ganeshkumar_bjhims.view_appointment where PId='".$pID."' order by  createdDateTime DESC limit 1 ;";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[Referal];
	return $IIDD;
}

function getYearGRNNo($HospID)
{
	if (date('m') <= 3) {//Upto June 2014-2015

		//$financial_year = (date('Y')-1) . '-' . date('Y');
		$FromYear =	(date('Y')-1);
		$ToYear = date('Y');
	} else {//After June 2015-2016

		//$financial_year = date('Y') . '-' . (date('Y') + 1);
		$FromYear =	date('Y');
		$ToYear = (date('Y') + 1);
	}
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.pharmacy_grn
where DT between
concat('".$FromYear."','-', '04','-','01')
and
concat('".$ToYear."','-', '04','-','01')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getYearPAYNo($HospID)
{
	if (date('m') <= 3) {//Upto June 2014-2015

		//$financial_year = (date('Y')-1) . '-' . date('Y');
		$FromYear =	(date('Y')-1);
		$ToYear = date('Y');
	} else {//After June 2015-2016

		//$financial_year = date('Y') . '-' . (date('Y') + 1);
		$FromYear =	date('Y');
		$ToYear = (date('Y') + 1);
	}
	$dbhelper = &DbHelper();
	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.pharmacy_payment
where DT between
concat('".$FromYear."','-', '04','-','01')
and
concat('".$ToYear."','-', '04','-','01')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getCoupleID($HospID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT  (LPAD(CAST((count(*) + 1 ) as CHAR(50)), 5, '0')) as COUNT  FROM ganeshkumar_bjhims.ivf where HospID='".$HospID."' and Male != '0';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getDonorID($HospID)
{
	$dbhelper = &DbHelper();
	$sql =   "SELECT  (LPAD(CAST((count(*) + 1 ) as CHAR(50)), 5, '0')) as COUNT  FROM ganeshkumar_bjhims.ivf where HospID='".$HospID."' and Male = '0';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getHospitalDetails($HospID)
{
	if($HospID != null)
	{
		try{
			$UserProfile = new UserProfile();
			$dbhelper = &DbHelper();
			$sql = "SELECT * FROM ganeshkumar_bjhims.hospital where id = ".$HospID." ;";
			$rs = $dbhelper->LoadRecordset($sql);
			$html .= "";
			while (!$rs->EOF) {
				$row = &$rs->fields;
				$hospital_id = $row[id];
				$hospital_hospital = $row[hospital];
				$hospital_street = $row[street];
				$hospital_area = $row[area];
				$hospital_town = $row[town];
				$hospital_state = $row[province];
				$hospital_pincode = $row[postal_code];
				$hospital_contactno = $row[phone_no];
				$hospital_mobileno = $row[phone_no];
				$hospital_PreFixCode = $row[PreFixCode];
				$hospital_logo = $row[logo];
				$UserProfile->SetValue("hospital_id",$hospital_id);
				$UserProfile->SetValue("hospital_hospital",$hospital_hospital);
				$UserProfile->SetValue("hospital_street",$hospital_street);
				$UserProfile->SetValue("hospital_area",$hospital_area);
				$UserProfile->SetValue("hospital_town",$hospital_town);
				$UserProfile->SetValue("hospital_state",$hospital_state);
				$UserProfile->SetValue("hospital_pincode",$hospital_pincode);
				$UserProfile->SetValue("hospital_contactno",$hospital_contactno);
				$UserProfile->SetValue("hospital_mobileno",$hospital_mobileno);
				$UserProfile->SetValue("hospital_PreFixCode",$hospital_PreFixCode);
				$UserProfile->SetValue("hospital_logo",$hospital_logo);
				$UserProfile->Save();
				$rs->MoveNext();
			}
		}catch (Exception  $g){}
	}
}

function getPharIDDetails($PharID)
{
	if($PharID != null)
	{
		try{
			$UserProfile = new UserProfile();
			$dbhelper = &DbHelper();
			$sql = "SELECT * FROM ganeshkumar_bjhims.hospital_pharmacy where id = ".$PharID." ;";
			$rs = $dbhelper->LoadRecordset($sql);
			$html .= "";
			while (!$rs->EOF) {
				$row = &$rs->fields;
				$PharID_id = $row[id];
				$PharID_hospital = $row[pharmacy];
				$PharID_street = $row[street];
				$PharID_area = $row[area];
				$PharID_town = $row[town];
				$PharID_state = $row[province];
				$PharID_pincode = $row[postal_code];
				$PharID_contactno = $row[phone_no];
				$PharID_mobileno = $row[phone_no];
				$PharID_PreFixCode = $row[PreFixCode];
				$PharID_logo = $row[logo];
				$UserProfile->SetValue("PharID_id",$PharID_id);
				$UserProfile->SetValue("PharID_hospital",$PharID_hospital);
				$UserProfile->SetValue("PharID_street",$PharID_street);
				$UserProfile->SetValue("PharID_area",$PharID_area);
				$UserProfile->SetValue("PharID_town",$PharID_town);
				$UserProfile->SetValue("PharID_state",$PharID_state);
				$UserProfile->SetValue("PharID_pincode",$PharID_pincode);
				$UserProfile->SetValue("PharID_contactno",$PharID_contactno);
				$UserProfile->SetValue("PharID_mobileno",$PharID_mobileno);
				$UserProfile->SetValue("PharID_PreFixCode",$PharID_PreFixCode);
				$UserProfile->SetValue("PharID_logo",$PharID_logo);
				$UserProfile->Save();
				$rs->MoveNext();
			}
		}catch (Exception  $g){}
	}
}

function AgeCalculationb($APatIDdob)
{
	if($APatIDdob == null)
	{
		$AddAge =  ' ';
	}else{
		try{
			$bday = new \DateTime($APatIDdob); // Your date of birth
			$today = new \Datetime(date('Y-m-d'));
			$diff = $today->diff($bday);
			if( $diff->y <= 1)
			{
				$years = ' year, ';
			}else {
				$years = ' years, ';
			}
			if( $diff->m <= 1)
			{
				$months = ' month';
			}else {
				$months = ' months';
			}
			if( $diff->d <= 1)
			{
				$days = ' day old.';
			}else {
				$days = ' days old.';
			}
			if($diff->y < 5)
			{
				$AddAge = $diff->y .$years. $diff->m . $months.' , and '. $diff->d . $days;
			}else{
				$AddAge = $diff->y .$years. $diff->m . $months .' old.';
			}
		}
		catch (Exception $e){
		}
	}
	return $AddAge;
}

function SendSMS($mobileNumber,$message)
{

//$message = urlencode($message);
$postData = array(
	'dest' => $mobileNumber,
	'msg' => $message
);

//API URL
//$url="https://hp.dial4sms.com/SendSMS/sendmsg.php?uname=afourh&pass=afourh&send=AFOURH";

$url="https://hp.dial4sms.com/SendSMS/sendmsg.php?uname=afourh&pass=afourh&send=AFOURH";

//$url="https://hp.dial4sms.com/SendSMS/sendmsg.php?uname=afourh&pass=afourh&send=HEALTH";
// init the resource

$ch = curl_init();
curl_setopt_array($ch, array(
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POST => true,
	CURLOPT_POSTFIELDS => $postData

	//,CURLOPT_FOLLOWLOCATION => true
));

//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
	return 'error:' . curl_error($ch);
}
curl_close($ch);
return $output;
}

function getfromTodate()
{
$dbhelper = &DbHelper();
$Typpe = $view_bill_collection_report->createddate->AdvancedSearch->SearchOperator; //$_GET["z_createddate"];
$fromdte = $view_bill_collection_report->createddate->AdvancedSearch->SearchValue; //$_GET["z_createddate"];
$todate = $view_bill_collection_report->createddate->AdvancedSearch->SearchValue2; //$_GET["x_createddate"]
	$fromdte =  explode("/",$fromdte);
	if(count($fromdte)!=3)
	{
		 $fromdte =  explode("-",$fromdte);        
	}
	 $todate =  explode("/",$todate);
	if(count($todate)!=3)
	{
		 $todate =  explode("-",$todate);        
	}
	$fromdte =   $fromdte[2]."-".$fromdte[1]."-".$fromdte[0];
	$todate = $todate[2]."-".$todate[1]."-".$todate[0];
	if($fromdte == "--")
	{
	   $fromdte = date("Y-m-d");
	   $todate = date("Y-m-d");
	}	
	if($todate == "--")
	{

	  // $fromdte = $fromdte;
	   $todate = $fromdte;
	}	
return "createddate between '".$fromdte."' and '".$todate."'";
}
?>