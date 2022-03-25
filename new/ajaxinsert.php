<?php include_once "ajaxdb.php" ?>
<?php

$flatid = $_GET['flatid'];
$houseNo = $_GET['houseNo'];




$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

							//$sqlS="SELECT * FROM kfowa.owner_address where `flatid` = '".$flatid."' and `houseNo`='".$houseNo."' and `statusbit`='1'" ;
							//$result=$conn->query($sqlS);
							//if ($result->num_rows > 0)
							//{
							//    while($row = $result->fetch_assoc())
							//    {
							//      echo $row["owner_name"];
							//    }
							//}




$control =  $_POST["control"];

if($control == null)
{
	$control =  $_GET["control"];
}

if($control == "schedulerpro")
{
	$data = $_POST['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {
		$Scheduleid = $item['Scheduleid'];

		$start_date = $item['start_date'];
		$end_date = $item['end_date'];
		$text = $item['text'];
		$Player = $item['Player'];
		$Coach = $item['Coach'];
		$Section = $item['Section'];
		$status = $item['status'];

		if($Scheduleid==null)
		{
			$sql = "INSERT INTO appointment_scheduler  ( start_date ,end_date ,patientID ,patientName ,DoctorID ,DoctorName ,status) VALUES ('".$start_date."' ,'".$end_date."' ,'".$text."' ,'".$Player."' ,'".$Coach."' ,'".$Section."' ,'".$status."')  ; ";
		}else{
			$sql = "UPDATE  appointment_scheduler  SET  start_date='".$start_date."' ,end_date='".$end_date."',text='".$text."' ,Player='".$Player."' ,Coach='".$Coach."' ,Section='".$Section."' ,status='".$status."' WHERE id='".$Scheduleid."'  ; ";
		}
		$result=$conn->query($sql);
		//$result = sqlsrv_query($conn,$sql);
		//$row = sqlsrv_fetch_array($result);
	}
}


if($control == "selectTemplatePRE")
{
	$data = $_POST['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {
		$CustomerName = $item['CustomerName'];

		$start_date = $item['start_date'];


	//	$sql = "SELECT * FROM ganeshkumar_bjhims.mas_template_prescription_type where createdby='".$CustomerName."';";

	$sql = "SELECT * FROM ganeshkumar_bjhims.mas_template_prescription_type ;";

		$result=$conn->query($sql);
		//$result = sqlsrv_query($conn,$sql);
		//$row = sqlsrv_fetch_array($result);

		 $products_arr["records"]=array();

		 if ($result->num_rows > 0) {
		 // output data of each row
		 	while($row = $result->fetch_assoc()) {

		 	$product_item=array(
			"id" => $row["id"],
			"TemplateName" => $row["TemplateName"] );
				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
				array_push($products_arr["records"], $product_item);
			}
		}

		echo json_encode($products_arr);
	}
}

if($control == "selectTemplatePREItem")
{
	$data = $_POST['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {
		$CustomerName = $item['CustomerName'];

		$TemplateName = $item['TemplateName'];
		$sql = "SELECT * FROM ganeshkumar_bjhims.mas_user_template_prescription where TemplateName='".$TemplateName."' and CreatedBy='".$CustomerName."';";


		$result=$conn->query($sql);

		$products_arr["records"]=array();

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {

				$product_item=array(
			   "id" => $row["id"],
			   "TemplateName" => $row["TemplateName"] ,

				"Medicine" => $row["Medicine"] ,
  "M" => $row["M"] ,
  "A" => $row["A"] ,
  "N" => $row["N"] ,
  "NoOfDays" => $row["NoOfDays"] ,
  "PreRoute" => $row["PreRoute"] ,
  "TimeOfTaking" => $row["TimeOfTaking"] ,
  "Type" => $row["Type"] );



				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
				array_push($products_arr["records"], $product_item);
			}
		}

		echo json_encode($products_arr);
	}
}



if($control == "selectActivityCardGroup")
{
	$data = $_POST['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {
		$ActivityCard = $item['ActivityCard'];

		$sql = "SELECT department FROM ganeshkumar_bjhims.mas_billing_department;";


		$result=$conn->query($sql);

		$products_arr["records"]=array();

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {

				$product_item=array(

				"Type" => $row["department"]
				 );

				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
				array_push($products_arr["records"], $product_item);
			}
		}

		echo json_encode($products_arr);
	}
}


if($control == "selectActivityCard")
{
	$data = $_POST['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {
		$ActivityCard = $item['ActivityCard'];

		$sql = "SELECT * FROM ganeshkumar_bjhims.mas_services_billing where DEPARTMENT='".$ActivityCard."';";


		$result=$conn->query($sql);

		$products_arr["records"]=array();

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {

				$product_item=array(
				"id" => $row["id"],
				"SERVICE" => $row["SERVICE"] ,
				"Type" => $row["SERVICE_TYPE"] ,
				"Selected" => $row["Selected"] ,
				"Units" => $row["UNITS"] ,

					"serviceID" => $row["Id"] ,
					"ItemCode" => $row["CODE"] ,
						"Service_Type" => $row["SERVICE_TYPE"] ,
						"Service_Department" => $row["DEPARTMENT"] ,
						
						"Amount" => $row["AMOUNT"] );
						
				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
				array_push($products_arr["records"], $product_item);
			}
		}

		echo json_encode($products_arr);
	}
}


if($control == "patientProPicture")
{

	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {
		$patientId = $item['patientId'];
			$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$patientId."';";

		$result=$conn->query($sql);

		$products_arr["records"]=array();

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {

				$product_item=array(
				"id" => $row["id"],
				"profilePic" => $row["profilePic"] ,
				"PatientID" => $row["PatientID"] ,
				"first_name" => $row["first_name"] ,
				"blood_group" => $row["blood_group"] ,

				"Age" => $row["Age"] ,  // age
				"PEmail" => $row["PEmail"] ,  // email
				"gender" => $row["gender"] ,  // gender
				
				"mobile_no" => $row["mobile_no"] );
				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
				array_push($products_arr["records"], $product_item);
			}
		}

		echo json_encode($products_arr);
	}
}









if($control == "patientProPictureprocedurenotes")
{

	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {
		$patientId = $item['patientId'];
			$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$patientId."';";

		$result=$conn->query($sql);

		$products_arr["records"]=array();


		





		$sql = "SELECT * FROM ganeshkumar_bjhims.view_follow_up_tracking where PatientId='".$patientId."' ORDER BY createddatetime DESC; ";
		$results3 = $conn->query($sql);
	   //for ($i=0;$i< count($results3) ;$i++)
		if ($results3->num_rows > 0) {
			   // output data of each row
			while($row = $results3->fetch_assoc()) {


				   $printd .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$row["createdUserName"].'</span>
							<span class="direct-chat-timestamp float-right">'.$row["createddatetime"].'</span>
						</div>
						<div class="direct-chat-text">
							'.$row["MReadMore"].'
						</div>
					</div>';
			   }
		   }
	  // echo $printd;


	  // for ($i=0;$i< count($results3) ;$i++)
	  // {

		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_opd_follow_up where PatientId='".$patientId."' ORDER BY id DESC; ";
		$results3 = $conn->query($sql);
		if ($results3->num_rows > 0) {
			   // output data of each row
			while($row = $results3->fetch_assoc()) {
				   if($row["ICSIAdvised"] != null)
				   {
					   $printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$row["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">'.$row["ICSIDate"].'</span>
						</div>
						<div class="direct-chat-text">
							'.$row["ICSIAdvised"].'
						</div>
					</div>';
				   }

				   if($row["EDD"] != null)
				   {
					   $printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$row["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">'.$row["EDD"].'</span>
						</div>
						<div class="direct-chat-text">
							EDD
						</div>
					</div>';
				   }

				   if($row["LMP"] != null)
				   {
					   $printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$row["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">'.$row["LMP"].'</span>
						</div>
						<div class="direct-chat-text">
							LMP
						</div>
					</div>';
				   }

				   if($row["ProcedureDateTime"] != null)
				   {
					   $printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$row["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">'.$row["ProcedureDateTime"].'</span>
						</div>
						<div class="direct-chat-text">
							'.$row["Procedure"].'
						</div>
					</div>';
				   }

				   if($row["Allergy"] != null)
				   {
					   $printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$row["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">Allergy</span>
						</div>
						<div class="direct-chat-text">
							'.$row["Allergy"].'
						</div>
					</div>';
				   }

				   if($row["SerologyPositive"] != null)
				   {
					   $printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$row["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">Serology Positive</span>
						</div>
						<div class="direct-chat-text">
							Serology Positive
						</div>
					</div>';
				   }


			   }
		   }
//echo $printda   $printd;












		
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {

				$product_item=array(
				"id" => $row["id"],
				"profilePic" => $row["profilePic"] ,
				"PatientID" => $row["PatientID"] ,
				"first_name" => $row["first_name"] ,
				"blood_group" => $row["blood_group"] ,

				"Age" => $row["Age"] ,  // age
				"PEmail" => $row["PEmail"] ,  // email
				"gender" => $row["gender"] ,  // gender

				"iidprocedurenotes" => $printd,

				"iidICSIDate" => $printda,
				
				"mobile_no" => $row["mobile_no"] );
				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
				array_push($products_arr["records"], $product_item);
			}
		}

		echo json_encode($products_arr);
	}
}








if($control == "selectServices")
{

	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {
		$Services = $item['Services'];
		$HospitalID =   $item['HospitalID'];
			$sql = "SELECT * FROM ganeshkumar_bjhims.mas_services_billing where SERVICE='".$Services."' and HospID='".$HospitalID."';";

		$result=$conn->query($sql);

		$products_arr["records"]=array();

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {

				$product_item=array(
				"id" => $row["Id"],


				"SERVICE_TYPE" => $row["SERVICE_TYPE"] ,
				"DEPARTMENT" => $row["DEPARTMENT"] ,
				"TestType" => $row["TestType"] ,
				

"CODE" => $row["CODE"] ,
"SERVICE" => $row["SERVICE"] ,
"UNITS" => $row["UNITS"] ,
"AMOUNT" => $row["AMOUNT"] ,


"ItemCode" => $row["CODE"] ,

"SERVICE_TYPE" => $row["SERVICE_TYPE"] ,
"DEPARTMENT" => $row["DEPARTMENT"] ,
"DrShareAmount" => $row["DrShareAmount"] ,
"HospShareAmount" => $row["HospShareAmount"] ,
"DrSharePer" => $row["DrSharePer"] ,
"HospSharePer" => $row["HospSharePer"]);

				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
				array_push($products_arr["records"], $product_item);
			}
		}

		echo json_encode($products_arr);
	}
}





if($control == "ivfCoupleReg")
{

	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {
		$RIDNo = $item['RIDNo'];
		$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$RIDNo."';";
		$result=$conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			$Partner =	$row["Male"];
			$Patient = $row["Female"];
				}
		}

		
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Patient."';";
		$result=$conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$Patientid = $row["id"];
				$PatientprofilePic = $row["profilePic"];
				$PatientPatientID = $row["PatientID"];
				$Patientfirst_name = $row["first_name"];
				$Patientblood_group = $row["blood_group"];
				$PatientAge = $row["Age"];
				$PatientPEmail = $row["PEmail"];
				$Patientgender = $row["gender"] ;			
				$Patientmobile_no = $row["mobile_no"];
					$ReferA4TreatingConsultant = $row["ReferA4TreatingConsultant"];
			}
		}

		$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Partner."';";
		$result=$conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$Partnerid = $row["id"];
				$PartnerprofilePic = $row["profilePic"];
				$PartnerPatientID = $row["PatientID"];
				$Partnerfirst_name = $row["first_name"];
				$Partnerblood_group = $row["blood_group"] ;
				$PartnerAge = $row["Age"];
				$PartnerPEmail = $row["PEmail"] ;
				$Partnergender = $row["gender"];
				$Partnermobile_no = $row["mobile_no"];				
			}
		}

		
				$products_arr["records"]=array();

				$product_item=array(
				"id" => $Patientid,
				"profilePic" => $PatientprofilePic ,
				"PatientID" => $PatientPatientID ,
				"first_name" => $Patientfirst_name ,
				"blood_group" => $Patientblood_group ,
				"Age" => $PatientAge ,  // age
				"PEmail" => $PatientPEmail ,  // email
				"gender" => $Patientgender ,  // gender				
				"mobile_no" => $Patientmobile_no,

"ReferA4TreatingConsultant" => $ReferA4TreatingConsultant,
				
				"Partnerid" => $Partnerid,
				"PartnerprofilePic" => $PartnerprofilePic ,
				"PartnerPatientID" => $PartnerPatientID ,
				"Partnerfirst_name" => $Partnerfirst_name ,
				"Partnerblood_group" => $Partnerblood_group ,
				"PartnerAge" => $PartnerAge ,  // age
				"PartnerPEmail" => $PartnerPEmail ,  // email
				"Partnergender" => $Partnergender ,  // gender				
				"Partnermobile_no" => $Partnermobile_no
				);					
				array_push($products_arr["records"], $product_item);

		echo json_encode($products_arr);
	}
}





if($control == "FindivfCoupleReg")
{

	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {
		$PatId = $item['PatId'];
		$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where Female='".$PatId."';";
		$result=$conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			$Partner =	$row["Male"];
			$Patient = $row["Female"];
			$ReferedBy = $row["ReferedBy"];
			
						$DrID = $row["DrID"];
						$DrDepartment = $row["DrDepartment"];
						$Doctor = $row["Doctor"];
					 	
				}
		}else{

				$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where Male='".$PatId."';";
				$result=$conn->query($sql);
				if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						$Partner =	$row["Female"];
						$Patient = $row["Male"];
						$ReferedBy = $row["ReferedBy"];

						$DrID = $row["DrID"];
						$DrDepartment = $row["DrDepartment"];
						$Doctor = $row["Doctor"];
					 	
					}
				}
		}

		
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Patient."';";
		$result=$conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$Patientid = $row["id"];
				$PatientprofilePic = $row["profilePic"];
				$PatientPatientID = $row["PatientID"];
				$Patientfirst_name = $row["first_name"];
				$Patientblood_group = $row["blood_group"];
				$PatientAge = $row["Age"];
				$PatientPEmail = $row["PEmail"];
				$Patientgender = $row["gender"] ;			
				$Patientmobile_no = $row["mobile_no"];
			}
		}

		$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Partner."';";
		$result=$conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$Partnerid = $row["id"];
				$PartnerprofilePic = $row["profilePic"];
				$PartnerPatientID = $row["PatientID"];
				$Partnerfirst_name = $row["first_name"];
				$Partnerblood_group = $row["blood_group"] ;
				$PartnerAge = $row["Age"];
				$PartnerPEmail = $row["PEmail"] ;
				$Partnergender = $row["gender"];
				$Partnermobile_no = $row["mobile_no"];				
			}
		}



	if($Patientid == '')
		{
			$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$PatId."';";
			$result=$conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$Patientid = $row["id"];
					$PatientprofilePic = $row["profilePic"];
					$PatientPatientID = $row["PatientID"];
					$Patientfirst_name = $row["first_name"];
					$Patientblood_group = $row["blood_group"];
					$PatientAge = $row["Age"];
					$PatientPEmail = $row["PEmail"];
					$Patientgender = $row["gender"] ;
					$Patientmobile_no = $row["mobile_no"];
				}
			}
		}


		
		{
			$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where patient_id='".$Patientid."' order by id desc limit 1;";
		$result=$conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {

				if($ReferedBy == null)
				{
					$Partnerid = $row["id"];

					$ReferedBy = $row["ReferedByDr"];
				}
				$typeRegsisteration = $row["typeRegsisteration"];

				$Procedure = $row["Procedure"];


			}
		}
		}
		
				$products_arr["records"]=array();

				$product_item=array(
				"id" => $Patientid,
				"profilePic" => $PatientprofilePic ,
				"PatientID" => $PatientPatientID ,
				"first_name" => $Patientfirst_name ,
				"blood_group" => $Patientblood_group ,
				"Age" => $PatientAge ,  // age
				"PEmail" => $PatientPEmail ,  // email
				"gender" => $Patientgender ,  // gender				
				"mobile_no" => $Patientmobile_no,

				"Partnerid" => $Partnerid,
				"PartnerprofilePic" => $PartnerprofilePic ,
				"PartnerPatientID" => $PartnerPatientID ,
				"Partnerfirst_name" => $Partnerfirst_name ,
				"Partnerblood_group" => $Partnerblood_group ,
				"PartnerAge" => $PartnerAge ,  // age
				"PartnerPEmail" => $PartnerPEmail ,  // email
				"Partnergender" => $Partnergender ,  // gender				
				"Partnermobile_no" => $Partnermobile_no,
				"ReferedBy" => $ReferedBy ,

				"DrID" => $DrID,
				"DrDepartment" => $DrDepartment,
				"Doctor" => $Doctor,
				"typeRegsisteration" => $typeRegsisteration,
				"Procedure" => $Procedure

					 	
				);					
				array_push($products_arr["records"], $product_item);

		echo json_encode($products_arr);
	}
}









if($control == "patientProPictureMRN")
{

	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {


		$IpAdmissionId = $item['patientId'];
			$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where id='".$IpAdmissionId."';";

		$result=$conn->query($sql);

		$products_arr["records"]=array();

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
			$Reception = $row["id"];
			$patientId = $row["patient_id"];
			$mrnNo = $row["mrnNo"];
			}
		}






	
		//$patientId = $item['patientId'];
			$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$patientId."';";

		$result=$conn->query($sql);

		$products_arr["records"]=array();

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {

				$product_item=array(
				"id" => $row["id"],
				"Reception" => $Reception,
				"patientIdOne" => $patientId,
				"mrnNo" => $mrnNo,
				"profilePic" => $row["profilePic"] ,
				"PatientID" => $row["PatientID"] ,
				"first_name" => $row["first_name"] ,
				"blood_group" => $row["blood_group"] ,

				"Age" => $row["Age"] ,  // age
				"PEmail" => $row["PEmail"] ,  // email
				"gender" => $row["gender"] ,  // gender
				
				"mobile_no" => $row["mobile_no"] );
				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
				array_push($products_arr["records"], $product_item);
			}
		}

		echo json_encode($products_arr);
	}
}


















if($control == "ivffnameLocation")
{

	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {
		$patientId = $item['patientId'];
		$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_embryology_chart where DidNO='".$patientId."';";

		$result=$conn->query($sql);

		$products_arr["records"]=array();

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {

				$product_item=array(
				"id" => $row["id"],
				"Incubator" => $row["Incubator"] ,
				"location" => $row["location"] ,
				"Remarks" => $row["Remarks"] ,
				"ICSiIVFDateTime" => $row["ICSiIVFDateTime"] ,

					"vitrificationDate" => $row["vitrificationDate"] ,
						"vitriPrimaryEmbryologist" => $row["vitriPrimaryEmbryologist"] ,
							"vitriSecondaryEmbryologist" => $row["vitriSecondaryEmbryologist"] ,
								"vitriFertilisationDate" => $row["vitriFertilisationDate"] ,


				"thawDate" => $row["thawDate"] ,
				"thawPrimaryEmbryologist" => $row["thawPrimaryEmbryologist"] ,
				"thawSecondaryEmbryologist" => $row["thawSecondaryEmbryologist"] ,



				"ETComments" => $row["ETComments"] ,
				"ETDoctor" => $row["ETDoctor"] ,
				"ETEmbryologist" => $row["ETEmbryologist"] ,
				"ETDate" => $row["ETDate"] ,
  

				"PrimaryEmbrologist" => $row["PrimaryEmbrologist"] ,  // age
				"SecondaryEmbrologist" => $row["SecondaryEmbrologist"] );  // email
					array_push($products_arr["records"], $product_item);
			}
		}

		echo json_encode($products_arr);
	}
}














if($control == "GetOPAdvance")
{

	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {
		$patientId = $item['patientId'];

		$HospID = $item['HospID'];
		
		$sql = "SELECT sum(Amount) as TotalAdvance  FROM ganeshkumar_bjhims.billing_other_voucher where PatID='".$patientId."'   and HospID='".$HospID."';";

		$result=$conn->query($sql);

		$products_arr["records"]=array();

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {

			$TotalAdvance = $row["TotalAdvance"];
			
			}
		}	

		$sql = "SELECT  sum(Amount) as TotalBill  FROM ganeshkumar_bjhims.billing_voucher where PatID='".$patientId."'   and HospID='".$HospID."'    and  AdjustmentAdvance='Yes';";

		$result=$conn->query($sql);

		$products_arr["records"]=array();

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
			
			$TotalBill = $row["TotalBill"];
			
			}
		}

		$BalanceAmount = $TotalAdvance - $TotalBill;
		
		$sql = "SELECT * FROM ganeshkumar_bjhims.billing_other_voucher where PatID='".$patientId."'  and HospID='".$HospID."';";

		$result=$conn->query($sql);

		$products_arr["records"]=array();

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {

				$product_item=array(
				"id" => $row["id"],
				"Amount" => $row["Amount"] ,
				"AdvanceNo" => $row["AdvanceNo"] ,
				"Date" => substr($row["Date"],0,11) ,
				"Remarks" => $row["Remarks"] ,
		"TotalAdvance" =>  $TotalAdvance  ,
		"TotalBill" =>  $TotalBill  ,
		"BalanceAmount" =>   $BalanceAmount ,
				"ModeofPayment" => $row["ModeofPayment"] );  // email
					array_push($products_arr["records"], $product_item);
			}
		}

		echo json_encode($products_arr);
	}
}









if($control == "TillSearch")
{

	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {

	
		$FromDate = $item['FromDate'];
		$ToDate = $item['ToDate'];
		$CurrentUserName = $item['CurrentUserName'];
		$CurrentUserID = $item['CurrentUserID'];

$sql = "SELECT sum(amount) as Amount ,ModeofPayment FROM ganeshkumar_bjhims.view_till_search
where createdby='".$CurrentUserName."'
 and  createddatetime between '".$FromDate."' and '".$ToDate."' and HospID='".$CurrentUserID."'
 group by ModeofPayment
;";		


		$result=$conn->query($sql);

		$products_arr["records"]=array();

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {

				$product_item=array(

				"Amount" => $row["Amount"] ,  // age
				"ModeofPayment" => $row["ModeofPayment"] );  // email
					array_push($products_arr["records"], $product_item);
			}
		}

		echo json_encode($products_arr);
	}
}
























if($control == "IPPatientSearch")
{

	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {	
		$patientId = $item['patientId'];
		$HospID = $item['HospID'];
		$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where patient_id='".$patientId."' and HospID='".$HospID."'  and BillClosing is null  or BillClosing != 'Yes'  ;";		
		$result=$conn->query($sql);
		$products_arr["records"]=array();
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
			   $Reception = $row["id"];
			   $Amound = $row["Amound"];
			   $Procedure = $row["Procedure"];	
			}
		}

		$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$Reception."' and BILLNO is null;";		
		$result=$conn->query($sql);
		$products_arr["records"]=array();
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$product_item=array(
"BRCODE" => $row["BRCODE"] ,
"iiiddd" => $row["id"] ,
"PRC" => $row["PRC"] ,
"IQ" => $row["IQ"] ,
"BATCHNO" => $row["BATCHNO"] ,
"EXPDT" => $row["EXPDT"] ,
"RT" => $row["RT"] ,
"DAMT" => $row["DAMT"] ,   
"SiNo" => $row["SiNo"] ,
"Product" => $row["Product"] ,
"Mfg" => $row["Mfg"] ,
"HosoID" => $row["HosoID"] ,
"createdby" => $row["createdby"] ,
"createddatetime" => $row["createddatetime"] ,
"modifiedby" => $row["modifiedby"] ,
"modifieddatetime" => $row["modifieddatetime"] ,
"MFRCODE" => $row["MFRCODE"] ,
"Reception" => $row["Reception"] ,
"PatID" => $row["PatID"] ,
"mrnno" => $row["mrnno"] ,
"Amound" =>$Amound,
"Procedure" =>$Procedure,
"BRNAME" => $row["BRNAME"]);

					array_push($products_arr["records"], $product_item);
			}
		}



					$sql = "SELECT * FROM ganeshkumar_bjhims.patient_services where Reception='".$Reception."' and Vid is null;";
		$result=$conn->query($sql);
	//	$products_arr["records"]=array();
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$product_item=array(
"BRCODE" => '',
"iiiddd" => $row["serviceID"] ,
"PRC" => $row["ItemCode"] ,
"IQ" => $row["Quantity"] ,
"BATCHNO" => '',
"EXPDT" => '',
"RT" => $row["amount"] ,
"DAMT" => $row["SubTotal"] ,
"SiNo" => $row["id"] ,
"Product" => $row["Services"] ,
"Mfg" => '',
"HosoID" => '',
"createdby" => '',
"createddatetime" => '',
"modifiedby" => '',
"modifieddatetime" => '',
"MFRCODE" => '',
"Reception" => '',
"PatID" => '',
"mrnno" => '',
"Amound" =>'',
"Procedure" =>'',
"BRNAME" => '');


					array_push($products_arr["records"], $product_item);
			}

		}
		
		echo json_encode($products_arr);
	}
}








if($control == "PharmachyGRNSearch")
{
	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {	
		$PC = $item['PC'];
		$HospitalID = $item['HospitalID'];
		$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_grn where Customername='".$PC."' and Pid is null and HospID = '".$HospitalID."';";		
		$result=$conn->query($sql);
		$products_arr["records"]=array();
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$product_item=array(
"id" => $row["id"] , 
"GRNNO" => $row["GRNNO"] , 
"DT" => $row["DT"] ,  
"Customername" => $row["Customername"] , 
"BILLNO" => $row["BILLNO"] , 
//"BILLDT" => $row["BILLDT"] ,
"BILLDT" =>  date("d/m/Y", strtotime($row["BILLDT"])) ,
"BillTotalValue" => $row["BillTotalValue"] , 
"PaymentNo" => $row["PaymentNo"] , 
"PaymentStatus" => $row["PaymentStatus"] ); 
					array_push($products_arr["records"], $product_item);
			}
		}
		echo json_encode($products_arr);
	}
}



if($control == "ServiceWiseBillNo")
{
	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {	
		$PC = $item['PC'];
		$HospitalID = $item['HospitalID'];

		$Itemmed =  $item['Itemmed'];

		$fromdte =  $item['fromdte'];
		$todate =  $item['todate'];


									
		

		$sql =  "SELECT Services, PatientId,PatientName , Mobile, amount, Vid,invoiceId,invoiceAmount , sid, ItemCode FROM

 ganeshkumar_bjhims.view_patient_services_dashboard
where
vid in 
( SELECT id FROM ganeshkumar_bjhims.view_dash_billing_voucher
where (HospID='".$HospitalID."'  and createddate between '".$fromdte."'  and '".$todate."' 
and CancelBill not like '%Cancel%' and IncludePackage is null ) or
(HospID='".$HospitalID."'  and createddate between '".$fromdte."'  and '".$todate."' 
and CancelBill not like '%Cancel%' and IncludePackage != 'Yes')) and
HospID='".$HospitalID."'  and    Services =  '".$Itemmed."'"  ;

		$result=$conn->query($sql);
		$products_arr["records"]=array();
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$product_item=array(
"id" => $row["id"] ,
"Services" => $row["Services"] ,
"PatientId" => $row["PatientId"] ,
"PatientName" => $row["PatientName"] ,
"Mobile" => $row["Mobile"] ,
"amount" => $row["amount"] ,
"Vid" => $row["Vid"] ,
"invoiceId" => $row["invoiceId"] ,
"invoiceAmount" => $row["invoiceAmount"] ,
"sid" => $row["sid"] ,
"ItemCode" => $row["ItemCode"] 
 ); 
					array_push($products_arr["records"], $product_item);
			}
		}
		echo json_encode($products_arr);
	}
}











if($control == "ServiceWiseBillNoA")
{
	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {	
		$PC = $item['PC'];
		$HospitalID = $item['HospitalID'];

		$Itemmed =  $item['Itemmed'];

		$fromdte =  $item['fromdte'];
		$todate =  $item['todate'];


			



$sql = "SELECT SERVICE ,  sum(amount) as Amount , count(Services) as Count FROM ganeshkumar_bjhims.view_dashboard_service_details
where 
vid in  (SELECT id FROM ganeshkumar_bjhims.view_dash_billing_voucher
where (HospID='".$HospitalID."' and createddate between '".$fromdte."' and '".$todate."' and DEPARTMENT =  '".$Itemmed."'
and CancelBill not like '%Cancel%' and IncludePackage is null ) or
(HospID='".$HospitalID."' and createddate between '".$fromdte."' and '".$todate."'  and DEPARTMENT =  '".$Itemmed."'
and CancelBill not like '%Cancel%' and IncludePackage != 'Yes') ) group by SERVICE";

		$result=$conn->query($sql);
		$products_arr["records"]=array();
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$product_item=array(
"id" => $row["id"] ,
"Services" => $row["SERVICE"] ,

"amount" => $row["Amount"] ,
"Count" => $row["Count"] 
 ); 
					array_push($products_arr["records"], $product_item);
			}
		}
		echo json_encode($products_arr);
	}
}











if($control == "ServiceWiseBillNoB")
{
	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {	
		$PC = $item['PC'];
		$HospitalID = $item['HospitalID'];

		$Itemmed =  $item['Itemmed'];

		$fromdte =  $item['fromdte'];
		$todate =  $item['todate'];


									
		

		$sql =  "SELECT ProcedureName, PatientId,PatientName , Mobile, amount, id as Vid, BillNumber as invoiceId, Amount as invoiceAmount , sid, '' as ItemCode

 FROM ganeshkumar_bjhims.view_dash_billing_voucher
	where HospID='".$HospitalID."' and createddate between '".$fromdte."' and '".$todate."' and CancelBill not like '%Cancel%' and IncludePackage = 'Yes'  and  ProcedureName = '".$Itemmed."'";

	

		$result=$conn->query($sql);
		$products_arr["records"]=array();
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$product_item=array(
"id" => $row["id"] ,
"Services" => $row["Services"] ,
"PatientId" => $row["PatientId"] ,
"PatientName" => $row["PatientName"] ,
"Mobile" => $row["Mobile"] ,
"amount" => $row["Amount"] ,
"Vid" => $row["Vid"] ,
"invoiceId" => $row["invoiceId"] ,
"invoiceAmount" => $row["invoiceAmount"] ,
"sid" => $row["sid"] ,
"ItemCode" => $row["ItemCode"] 
 ); 
					array_push($products_arr["records"], $product_item);
			}
		}
		echo json_encode($products_arr);
	}
}
















if($control == "labservicetesttestno")
{
	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {	
		$SERVICETYPE = $item['SERVICETYPE'];

		$sql =  "SELECT count(*) as Count FROM ganeshkumar_bjhims.mas_services_billing where SERVICE_TYPE = '".$SERVICETYPE."';";
		$result=$conn->query($sql);
		$products_arr["records"]=array();
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$product_item=array(
"Count" => $row["Count"] ,
"SERVICETYPE" => $SERVICETYPE
 ); 
					array_push($products_arr["records"], $product_item);
			}
		}
		echo json_encode($products_arr);
	}
}


















if($control == "OPPatientISSUESearch")
{

	$data = $_GET['data'];
	$obj = json_decode($data,true);
	foreach($obj as $item) {	
		$patientId = $item['patientId'];
		$HospID = $item['HospID'];
		$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_billing_issue where PatId='".$patientId."' and HospID='".$HospID."'  and voucher_type is null  or voucher_type != ''  ;";		
		$result=$conn->query($sql);
		$products_arr["records"]=array();
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
			   $Reception = $row["id"];
			   $Amound = $row["Amound"];
			   $Procedure = $row["Procedure"];	
			}
		}

		$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_pharled where pbt='".$Reception."' and BILLNO is null;";		
		$result=$conn->query($sql);
		$products_arr["records"]=array();
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$product_item=array(
"BRCODE" => $row["BRCODE"] ,
"iiiddd" => $row["id"] ,
"PRC" => $row["PRC"] ,
"IQ" => $row["IQ"] ,
"BATCHNO" => $row["BATCHNO"] ,
"EXPDT" => $row["EXPDT"] ,
"RT" => $row["RT"] ,
"DAMT" => $row["DAMT"] ,   
"SiNo" => $row["SiNo"] ,
"Product" => $row["Product"] ,
"Mfg" => $row["Mfg"] ,
"HosoID" => $row["HosoID"] ,
"createdby" => $row["createdby"] ,
"createddatetime" => $row["createddatetime"] ,
"modifiedby" => $row["modifiedby"] ,
"modifieddatetime" => $row["modifieddatetime"] ,
"MFRCODE" => $row["MFRCODE"] ,
"Reception" => $row["Reception"] ,
"PatID" => $row["PatID"] ,
"mrnno" => $row["mrnno"] ,
"Amound" =>$Amound,
"Procedure" =>$Procedure,
"BRNAME" => $row["BRNAME"]);

					array_push($products_arr["records"], $product_item);
			}
		}




		
		echo json_encode($products_arr);
	}
}















$conn->close();
?>