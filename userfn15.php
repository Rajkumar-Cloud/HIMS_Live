<?php
namespace PHPMaker2019\HIMS;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Global user functions
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

function StoreID()
{
	$UserProfile = new UserProfile();
	$PharID =  $UserProfile->Profile['StoreID'];
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

//	$sql =   "SELECT CONCAT(DATE_FORMAT(CURDATE(), '%y'), DATE_FORMAT(CURDATE(), '%m'), LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
//FROM ganeshkumar_bjhims.patient
//where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
//and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";

	$sql =   "SELECT CONCAT(DATE_FORMAT(CURDATE(), '%y'), DATE_FORMAT(CURDATE(), '%m'), LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
 FROM ganeshkumar_bjhims.patient
 where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
 and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getAPPID($HospID)
{
	$dbhelper = &DbHelper();

//	$sql =   "SELECT CONCAT(DATE_FORMAT(CURDATE(), '%y'), DATE_FORMAT(CURDATE(), '%m'), LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
// FROM ganeshkumar_bjhims.patient_app
// where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
// and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";

	$sql =   "SELECT CONCAT(DATE_FORMAT(CURDATE(), '%y'), DATE_FORMAT(CURDATE(), '%m'), LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
 FROM ganeshkumar_bjhims.patient_app
 where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
 and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and HospID='".$HospID."';";
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

//	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
// FROM ganeshkumar_bjhims.billing_voucher
// where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
// and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";
//	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
// FROM ganeshkumar_bjhims.billing_voucher
// where createddatetime between
// concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
 //and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and HospID='".$HospID."';";

 	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
 FROM ganeshkumar_bjhims.billing_voucher
 where createddatetime between
case when DATE_FORMAT(CURDATE(), '%m') <4 then concat(DATE_FORMAT(CURDATE() + INTERVAL -1  YEAR, '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
else concat(DATE_FORMAT(CURDATE() , '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01') end
 and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getBillNoOP($HospID)
{
	$dbhelper = &DbHelper();

//	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
//FROM ganeshkumar_bjhims.billing_voucher
//where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
//and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."'  and BillType='OP';";

	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.billing_voucher
where createddatetime between
case when DATE_FORMAT(CURDATE(), '%m') <4 then concat(DATE_FORMAT(CURDATE() + INTERVAL -1  YEAR, '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
else concat(DATE_FORMAT(CURDATE() , '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01') end
and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and HospID='".$HospID."'  and BillType='OP';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getBillNoIP($HospID)
{
	$dbhelper = &DbHelper();

//	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
//FROM ganeshkumar_bjhims.billing_voucher
//where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
//and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."'  and BillType='IP';";

	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.billing_voucher
where createddatetime between
case when DATE_FORMAT(CURDATE(), '%m') <4 then concat(DATE_FORMAT(CURDATE() + INTERVAL -1  YEAR, '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
else concat(DATE_FORMAT(CURDATE() , '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01') end
and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and HospID='".$HospID."'  and BillType='IP';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getBillNoPH($HospID)
{
	$dbhelper = &DbHelper();

//	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
//FROM ganeshkumar_bjhims.billing_voucher
//where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
//and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."'  and BillType='PH';";

	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.billing_voucher
where createddatetime between
case when DATE_FORMAT(CURDATE(), '%m') <4 then concat(DATE_FORMAT(CURDATE() + INTERVAL -1  YEAR, '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
else concat(DATE_FORMAT(CURDATE() , '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01') end
and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and HospID='".$HospID."'  and BillType='PH';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getIPBillNo($HospID)
{
	$dbhelper = &DbHelper();

//	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
//FROM ganeshkumar_bjhims.view_ip_billing
//where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
//and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";

	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.view_ip_billing
where createddatetime between
case when DATE_FORMAT(CURDATE(), '%m') <4 then concat(DATE_FORMAT(CURDATE() + INTERVAL -1  YEAR, '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
else concat(DATE_FORMAT(CURDATE() , '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01') end
and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getPharIDBillNo($PharID)
{
	$dbhelper = &DbHelper();

//	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
//FROM ganeshkumar_bjhims.pharmacy_billing_voucher
//where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
//and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and PharID='".$PharID."';";

	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.pharmacy_billing_voucher
where createddatetime between
case when DATE_FORMAT(CURDATE(), '%m') <4 then concat(DATE_FORMAT(CURDATE() + INTERVAL -1  YEAR, '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
else concat(DATE_FORMAT(CURDATE() , '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01') end
and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and PharID='".$PharID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getPharIDISSNo($PharID)
{
	$dbhelper = &DbHelper();

//	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
//FROM ganeshkumar_bjhims.pharmacy_billing_issue
//where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
//and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and PharID='".$PharID."';";

	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.pharmacy_billing_issue
where createddatetime between
case when DATE_FORMAT(CURDATE(), '%m') <4 then concat(DATE_FORMAT(CURDATE() + INTERVAL -1  YEAR, '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
else concat(DATE_FORMAT(CURDATE() , '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01') end
and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and PharID='".$PharID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getPharIDRNBillNo($PharID)
{
	$dbhelper = &DbHelper();

//	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
//FROM ganeshkumar_bjhims.pharmacy_billing_return
//where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
//and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and PharID='".$PharID."';";

	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.pharmacy_billing_return
where createddatetime between
case when DATE_FORMAT(CURDATE(), '%m') <4 then concat(DATE_FORMAT(CURDATE() + INTERVAL -1  YEAR, '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
else concat(DATE_FORMAT(CURDATE() , '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01') end
and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and PharID='".$PharID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getAdvanceNo($HospID)
{
	$dbhelper = &DbHelper();

//	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
//FROM ganeshkumar_bjhims.billing_other_voucher
//where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
//and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";

	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.billing_other_voucher
where createddatetime between
case when DATE_FORMAT(CURDATE(), '%m') <4 then concat(DATE_FORMAT(CURDATE() + INTERVAL -1  YEAR, '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
else concat(DATE_FORMAT(CURDATE() , '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01') end
and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getReFundNo($HospID)
{
	$dbhelper = &DbHelper();

//	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
//FROM ganeshkumar_bjhims.billing_refund_voucher
//where createddatetime between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
//and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";

	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.billing_refund_voucher
where createddatetime between
case when DATE_FORMAT(CURDATE(), '%m') <4 then concat(DATE_FORMAT(CURDATE() + INTERVAL -1  YEAR, '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
else concat(DATE_FORMAT(CURDATE() , '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01') end
and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getPONo($HospID)
{
	$dbhelper = &DbHelper();

//	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
//FROM ganeshkumar_bjhims.pharmacy_po
//where DT between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
//and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";

	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.pharmacy_po
where DT between
case when DATE_FORMAT(CURDATE(), '%m') <4 then concat(DATE_FORMAT(CURDATE() + INTERVAL -1  YEAR, '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
else concat(DATE_FORMAT(CURDATE() , '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01') end
and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getGRNNo($HospID)
{
	$dbhelper = &DbHelper();

//	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
//FROM ganeshkumar_bjhims.pharmacy_grn
//where DT between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
//and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";

	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.pharmacy_grn
where DT between
case when DATE_FORMAT(CURDATE(), '%m') <4 then concat(DATE_FORMAT(CURDATE() + INTERVAL -1  YEAR, '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
else concat(DATE_FORMAT(CURDATE() , '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01') end
and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and HospID='".$HospID."';";
	$rs = $dbhelper->LoadRecordset($sql);
	$row = &$rs->fields;
	$IIDD = $row[COUNT];
	return $IIDD;
}

function getYearSTGRNNo($HospID)
{
	$dbhelper = &DbHelper();

//	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
//FROM ganeshkumar_bjhims.store_grn
//where DT between concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
//and  concat(DATE_FORMAT(CURDATE(), '%Y'),'-', DATE_FORMAT((CURDATE()+ INTERVAL 1 MONTH), '%m'),'-','01')   and HospID='".$HospID."';";

	$sql =   "SELECT CONCAT( '/', UPPER (DATE_FORMAT(CURDATE(), '%b')) ,'', DATE_FORMAT(CURDATE(), '%y'),'/', LPAD(CAST((count(*) + 1 ) as CHAR(50)), 4, '0')) as COUNT
FROM ganeshkumar_bjhims.store_grn
where DT between
case when DATE_FORMAT(CURDATE(), '%m') <4 then concat(DATE_FORMAT(CURDATE() + INTERVAL -1  YEAR, '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01')
else concat(DATE_FORMAT(CURDATE() , '%Y'),'-', DATE_FORMAT(CURDATE(), '%m'),'-','01') end
and  concat(DATE_FORMAT(CURDATE() + INTERVAL 1  YEAR , '%Y'),'-', DATE_FORMAT((CURDATE()), '%m'),'-','31')   and HospID='".$HospID."';";
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
//$postData = array(
//	'dest' => $mobileNumber,
//	'msg' => $message
//);
//API URL
//$url="https://hp.dial4sms.com/SendSMS/sendmsg.php?uname=afourh&pass=afourh&send=AFOURH";
//$url="https://hp.dial4sms.com/SendSMS/sendmsg.php?uname=afourh&pass=afourh&send=AFOURH";  --- last working
//$url="https://hp.dial4sms.com/SendSMS/sendmsg.php?uname=afourh&pass=afourh&send=HEALTH";

$mobileNumber = '91'. $mobileNumber;

//$url="http://sms.dial4sms.com:6005/api/v2/SendSMS?SenderId=AFOURH&Is_Unicode=false&Is_Flash=false&ApiKey=sbPmtzQfqZXXqXfxZ/VK04xhUjI2uBQpNIxSC8EDEzU=&ClientId=457495e7-b9dc-489c-9375-3e91f2635b7d";
//$postData = array(
//	'MobileNumbers' => $mobileNumber,
//	'Message' => $message
//);
// init the resource
//$ch = curl_init();
//curl_setopt_array($ch, array(
//	CURLOPT_URL => $url,
//	CURLOPT_RETURNTRANSFER => true,
//	CURLOPT_POST => true,
//	CURLOPT_POSTFIELDS => $postData
	//,CURLOPT_FOLLOWLOCATION => true
//));
//Ignore SSL certificate verification
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	$numbers = urlencode($mobileNumber);
	$message = rawurlencode($message);
	$data = 'SenderId=AFOURH&Is_Unicode=false&Is_Flash=false&Message='.$message.'&MobileNumbers='.$numbers.'&ApiKey=sbPmtzQfqZXXqXfxZ/VK04xhUjI2uBQpNIxSC8EDEzU=&ClientId=457495e7-b9dc-489c-9375-3e91f2635b7d';
	 $ch = curl_init('http://sms.dial4sms.com:6005/api/v2/SendSMS?' . $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

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