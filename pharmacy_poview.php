<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$pharmacy_po_view = new pharmacy_po_view();

// Run the page
$pharmacy_po_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_po_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_po->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_poview = currentForm = new ew.Form("fpharmacy_poview", "view");

// Form_CustomValidate event
fpharmacy_poview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_poview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_poview.lists["x_PC"] = <?php echo $pharmacy_po_view->PC->Lookup->toClientList() ?>;
fpharmacy_poview.lists["x_PC"].options = <?php echo JsonEncode($pharmacy_po_view->PC->lookupOptions()) ?>;
fpharmacy_poview.lists["x_BRCODE"] = <?php echo $pharmacy_po_view->BRCODE->Lookup->toClientList() ?>;
fpharmacy_poview.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_po_view->BRCODE->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_po->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_po_view->ExportOptions->render("body") ?>
<?php $pharmacy_po_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_po_view->showPageHeader(); ?>
<?php
$pharmacy_po_view->showMessage();
?>
<form name="fpharmacy_poview" id="fpharmacy_poview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_po_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_po_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_po">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_po_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($pharmacy_po->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_id"><script id="tpc_pharmacy_po_id" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $pharmacy_po->id->cellAttributes() ?>>
<script id="tpx_pharmacy_po_id" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_id">
<span<?php echo $pharmacy_po->id->viewAttributes() ?>>
<?php echo $pharmacy_po->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->ORDNO->Visible) { // ORDNO ?>
	<tr id="r_ORDNO">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_ORDNO"><script id="tpc_pharmacy_po_ORDNO" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->ORDNO->caption() ?></span></script></span></td>
		<td data-name="ORDNO"<?php echo $pharmacy_po->ORDNO->cellAttributes() ?>>
<script id="tpx_pharmacy_po_ORDNO" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_ORDNO">
<span<?php echo $pharmacy_po->ORDNO->viewAttributes() ?>>
<?php echo $pharmacy_po->ORDNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_DT"><script id="tpc_pharmacy_po_DT" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->DT->caption() ?></span></script></span></td>
		<td data-name="DT"<?php echo $pharmacy_po->DT->cellAttributes() ?>>
<script id="tpx_pharmacy_po_DT" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_DT">
<span<?php echo $pharmacy_po->DT->viewAttributes() ?>>
<?php echo $pharmacy_po->DT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_YM"><script id="tpc_pharmacy_po_YM" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->YM->caption() ?></span></script></span></td>
		<td data-name="YM"<?php echo $pharmacy_po->YM->cellAttributes() ?>>
<script id="tpx_pharmacy_po_YM" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_YM">
<span<?php echo $pharmacy_po->YM->viewAttributes() ?>>
<?php echo $pharmacy_po->YM->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_PC"><script id="tpc_pharmacy_po_PC" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->PC->caption() ?></span></script></span></td>
		<td data-name="PC"<?php echo $pharmacy_po->PC->cellAttributes() ?>>
<script id="tpx_pharmacy_po_PC" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_PC">
<span<?php echo $pharmacy_po->PC->viewAttributes() ?>>
<?php echo $pharmacy_po->PC->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->Customercode->Visible) { // Customercode ?>
	<tr id="r_Customercode">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Customercode"><script id="tpc_pharmacy_po_Customercode" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->Customercode->caption() ?></span></script></span></td>
		<td data-name="Customercode"<?php echo $pharmacy_po->Customercode->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Customercode" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_Customercode">
<span<?php echo $pharmacy_po->Customercode->viewAttributes() ?>>
<?php echo $pharmacy_po->Customercode->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->Customername->Visible) { // Customername ?>
	<tr id="r_Customername">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Customername"><script id="tpc_pharmacy_po_Customername" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->Customername->caption() ?></span></script></span></td>
		<td data-name="Customername"<?php echo $pharmacy_po->Customername->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Customername" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_Customername">
<span<?php echo $pharmacy_po->Customername->viewAttributes() ?>>
<?php echo $pharmacy_po->Customername->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<tr id="r_pharmacy_pocol">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_pharmacy_pocol"><script id="tpc_pharmacy_po_pharmacy_pocol" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->pharmacy_pocol->caption() ?></span></script></span></td>
		<td data-name="pharmacy_pocol"<?php echo $pharmacy_po->pharmacy_pocol->cellAttributes() ?>>
<script id="tpx_pharmacy_po_pharmacy_pocol" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_pharmacy_pocol">
<span<?php echo $pharmacy_po->pharmacy_pocol->viewAttributes() ?>>
<?php echo $pharmacy_po->pharmacy_pocol->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->Address1->Visible) { // Address1 ?>
	<tr id="r_Address1">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Address1"><script id="tpc_pharmacy_po_Address1" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->Address1->caption() ?></span></script></span></td>
		<td data-name="Address1"<?php echo $pharmacy_po->Address1->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address1" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_Address1">
<span<?php echo $pharmacy_po->Address1->viewAttributes() ?>>
<?php echo $pharmacy_po->Address1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->Address2->Visible) { // Address2 ?>
	<tr id="r_Address2">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Address2"><script id="tpc_pharmacy_po_Address2" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->Address2->caption() ?></span></script></span></td>
		<td data-name="Address2"<?php echo $pharmacy_po->Address2->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address2" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_Address2">
<span<?php echo $pharmacy_po->Address2->viewAttributes() ?>>
<?php echo $pharmacy_po->Address2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->Address3->Visible) { // Address3 ?>
	<tr id="r_Address3">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Address3"><script id="tpc_pharmacy_po_Address3" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->Address3->caption() ?></span></script></span></td>
		<td data-name="Address3"<?php echo $pharmacy_po->Address3->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address3" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_Address3">
<span<?php echo $pharmacy_po->Address3->viewAttributes() ?>>
<?php echo $pharmacy_po->Address3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_State"><script id="tpc_pharmacy_po_State" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->State->caption() ?></span></script></span></td>
		<td data-name="State"<?php echo $pharmacy_po->State->cellAttributes() ?>>
<script id="tpx_pharmacy_po_State" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_State">
<span<?php echo $pharmacy_po->State->viewAttributes() ?>>
<?php echo $pharmacy_po->State->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->Pincode->Visible) { // Pincode ?>
	<tr id="r_Pincode">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Pincode"><script id="tpc_pharmacy_po_Pincode" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->Pincode->caption() ?></span></script></span></td>
		<td data-name="Pincode"<?php echo $pharmacy_po->Pincode->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Pincode" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_Pincode">
<span<?php echo $pharmacy_po->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_po->Pincode->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->Phone->Visible) { // Phone ?>
	<tr id="r_Phone">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Phone"><script id="tpc_pharmacy_po_Phone" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->Phone->caption() ?></span></script></span></td>
		<td data-name="Phone"<?php echo $pharmacy_po->Phone->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Phone" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_Phone">
<span<?php echo $pharmacy_po->Phone->viewAttributes() ?>>
<?php echo $pharmacy_po->Phone->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->Fax->Visible) { // Fax ?>
	<tr id="r_Fax">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Fax"><script id="tpc_pharmacy_po_Fax" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->Fax->caption() ?></span></script></span></td>
		<td data-name="Fax"<?php echo $pharmacy_po->Fax->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Fax" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_Fax">
<span<?php echo $pharmacy_po->Fax->viewAttributes() ?>>
<?php echo $pharmacy_po->Fax->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->EEmail->Visible) { // EEmail ?>
	<tr id="r_EEmail">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_EEmail"><script id="tpc_pharmacy_po_EEmail" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->EEmail->caption() ?></span></script></span></td>
		<td data-name="EEmail"<?php echo $pharmacy_po->EEmail->cellAttributes() ?>>
<script id="tpx_pharmacy_po_EEmail" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_EEmail">
<span<?php echo $pharmacy_po->EEmail->viewAttributes() ?>>
<?php echo $pharmacy_po->EEmail->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_HospID"><script id="tpc_pharmacy_po_HospID" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $pharmacy_po->HospID->cellAttributes() ?>>
<script id="tpx_pharmacy_po_HospID" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_HospID">
<span<?php echo $pharmacy_po->HospID->viewAttributes() ?>>
<?php echo $pharmacy_po->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_createdby"><script id="tpc_pharmacy_po_createdby" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $pharmacy_po->createdby->cellAttributes() ?>>
<script id="tpx_pharmacy_po_createdby" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_createdby">
<span<?php echo $pharmacy_po->createdby->viewAttributes() ?>>
<?php echo $pharmacy_po->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_createddatetime"><script id="tpc_pharmacy_po_createddatetime" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $pharmacy_po->createddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_po_createddatetime" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_createddatetime">
<span<?php echo $pharmacy_po->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_po->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_modifiedby"><script id="tpc_pharmacy_po_modifiedby" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $pharmacy_po->modifiedby->cellAttributes() ?>>
<script id="tpx_pharmacy_po_modifiedby" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_modifiedby">
<span<?php echo $pharmacy_po->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_po->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_modifieddatetime"><script id="tpc_pharmacy_po_modifieddatetime" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $pharmacy_po->modifieddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_po_modifieddatetime" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_modifieddatetime">
<span<?php echo $pharmacy_po->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_po->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_BRCODE"><script id="tpc_pharmacy_po_BRCODE" class="pharmacy_poview" type="text/html"><span><?php echo $pharmacy_po->BRCODE->caption() ?></span></script></span></td>
		<td data-name="BRCODE"<?php echo $pharmacy_po->BRCODE->cellAttributes() ?>>
<script id="tpx_pharmacy_po_BRCODE" class="pharmacy_poview" type="text/html">
<span id="el_pharmacy_po_BRCODE">
<span<?php echo $pharmacy_po->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_po->BRCODE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_pharmacy_poview" class="ew-custom-template"></div>
<script id="tpm_pharmacy_poview" type="text/html">
<div id="ct_pharmacy_po_view"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_po_ORDNO"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_ORDNO"/}}</h3>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_BRCODE"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_BRCODE"/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_PC"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_PC"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_DT"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_DT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_YM"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_YM"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Customercode"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Customercode"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Customername"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Customername"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Phone"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Phone"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-8">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Details</h3>
			</div>
			<div class="card-body">
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Address1"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Address1"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Address2"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Address2"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Address3"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Address3"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_State"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_State"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Pincode"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Pincode"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Fax"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_Fax"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</script>
<?php
	if (in_array("pharmacy_purchaseorder", explode(",", $pharmacy_po->getCurrentDetailTable())) && $pharmacy_purchaseorder->DetailView) {
?>
<?php if ($pharmacy_po->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("pharmacy_purchaseorder", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_purchaseordergrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($pharmacy_po->Rows) ?> };
ew.applyTemplate("tpd_pharmacy_poview", "tpm_pharmacy_poview", "pharmacy_poview", "<?php echo $pharmacy_po->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.pharmacy_poview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$pharmacy_po_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_po->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_po_view->terminate();
?>