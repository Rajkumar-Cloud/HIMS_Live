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
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_po_view->isExport()) { ?>
<script>
var fpharmacy_poview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_poview = currentForm = new ew.Form("fpharmacy_poview", "view");
	loadjs.done("fpharmacy_poview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_po_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_po">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_po_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($pharmacy_po_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_id"><script id="tpc_pharmacy_po_id" type="text/html"><?php echo $pharmacy_po_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $pharmacy_po_view->id->cellAttributes() ?>>
<script id="tpx_pharmacy_po_id" type="text/html"><span id="el_pharmacy_po_id">
<span<?php echo $pharmacy_po_view->id->viewAttributes() ?>><?php echo $pharmacy_po_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->ORDNO->Visible) { // ORDNO ?>
	<tr id="r_ORDNO">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_ORDNO"><script id="tpc_pharmacy_po_ORDNO" type="text/html"><?php echo $pharmacy_po_view->ORDNO->caption() ?></script></span></td>
		<td data-name="ORDNO" <?php echo $pharmacy_po_view->ORDNO->cellAttributes() ?>>
<script id="tpx_pharmacy_po_ORDNO" type="text/html"><span id="el_pharmacy_po_ORDNO">
<span<?php echo $pharmacy_po_view->ORDNO->viewAttributes() ?>><?php echo $pharmacy_po_view->ORDNO->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_DT"><script id="tpc_pharmacy_po_DT" type="text/html"><?php echo $pharmacy_po_view->DT->caption() ?></script></span></td>
		<td data-name="DT" <?php echo $pharmacy_po_view->DT->cellAttributes() ?>>
<script id="tpx_pharmacy_po_DT" type="text/html"><span id="el_pharmacy_po_DT">
<span<?php echo $pharmacy_po_view->DT->viewAttributes() ?>><?php echo $pharmacy_po_view->DT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_YM"><script id="tpc_pharmacy_po_YM" type="text/html"><?php echo $pharmacy_po_view->YM->caption() ?></script></span></td>
		<td data-name="YM" <?php echo $pharmacy_po_view->YM->cellAttributes() ?>>
<script id="tpx_pharmacy_po_YM" type="text/html"><span id="el_pharmacy_po_YM">
<span<?php echo $pharmacy_po_view->YM->viewAttributes() ?>><?php echo $pharmacy_po_view->YM->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_PC"><script id="tpc_pharmacy_po_PC" type="text/html"><?php echo $pharmacy_po_view->PC->caption() ?></script></span></td>
		<td data-name="PC" <?php echo $pharmacy_po_view->PC->cellAttributes() ?>>
<script id="tpx_pharmacy_po_PC" type="text/html"><span id="el_pharmacy_po_PC">
<span<?php echo $pharmacy_po_view->PC->viewAttributes() ?>><?php echo $pharmacy_po_view->PC->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->Customercode->Visible) { // Customercode ?>
	<tr id="r_Customercode">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Customercode"><script id="tpc_pharmacy_po_Customercode" type="text/html"><?php echo $pharmacy_po_view->Customercode->caption() ?></script></span></td>
		<td data-name="Customercode" <?php echo $pharmacy_po_view->Customercode->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Customercode" type="text/html"><span id="el_pharmacy_po_Customercode">
<span<?php echo $pharmacy_po_view->Customercode->viewAttributes() ?>><?php echo $pharmacy_po_view->Customercode->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->Customername->Visible) { // Customername ?>
	<tr id="r_Customername">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Customername"><script id="tpc_pharmacy_po_Customername" type="text/html"><?php echo $pharmacy_po_view->Customername->caption() ?></script></span></td>
		<td data-name="Customername" <?php echo $pharmacy_po_view->Customername->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Customername" type="text/html"><span id="el_pharmacy_po_Customername">
<span<?php echo $pharmacy_po_view->Customername->viewAttributes() ?>><?php echo $pharmacy_po_view->Customername->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<tr id="r_pharmacy_pocol">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_pharmacy_pocol"><script id="tpc_pharmacy_po_pharmacy_pocol" type="text/html"><?php echo $pharmacy_po_view->pharmacy_pocol->caption() ?></script></span></td>
		<td data-name="pharmacy_pocol" <?php echo $pharmacy_po_view->pharmacy_pocol->cellAttributes() ?>>
<script id="tpx_pharmacy_po_pharmacy_pocol" type="text/html"><span id="el_pharmacy_po_pharmacy_pocol">
<span<?php echo $pharmacy_po_view->pharmacy_pocol->viewAttributes() ?>><?php echo $pharmacy_po_view->pharmacy_pocol->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->Address1->Visible) { // Address1 ?>
	<tr id="r_Address1">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Address1"><script id="tpc_pharmacy_po_Address1" type="text/html"><?php echo $pharmacy_po_view->Address1->caption() ?></script></span></td>
		<td data-name="Address1" <?php echo $pharmacy_po_view->Address1->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address1" type="text/html"><span id="el_pharmacy_po_Address1">
<span<?php echo $pharmacy_po_view->Address1->viewAttributes() ?>><?php echo $pharmacy_po_view->Address1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->Address2->Visible) { // Address2 ?>
	<tr id="r_Address2">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Address2"><script id="tpc_pharmacy_po_Address2" type="text/html"><?php echo $pharmacy_po_view->Address2->caption() ?></script></span></td>
		<td data-name="Address2" <?php echo $pharmacy_po_view->Address2->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address2" type="text/html"><span id="el_pharmacy_po_Address2">
<span<?php echo $pharmacy_po_view->Address2->viewAttributes() ?>><?php echo $pharmacy_po_view->Address2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->Address3->Visible) { // Address3 ?>
	<tr id="r_Address3">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Address3"><script id="tpc_pharmacy_po_Address3" type="text/html"><?php echo $pharmacy_po_view->Address3->caption() ?></script></span></td>
		<td data-name="Address3" <?php echo $pharmacy_po_view->Address3->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address3" type="text/html"><span id="el_pharmacy_po_Address3">
<span<?php echo $pharmacy_po_view->Address3->viewAttributes() ?>><?php echo $pharmacy_po_view->Address3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_State"><script id="tpc_pharmacy_po_State" type="text/html"><?php echo $pharmacy_po_view->State->caption() ?></script></span></td>
		<td data-name="State" <?php echo $pharmacy_po_view->State->cellAttributes() ?>>
<script id="tpx_pharmacy_po_State" type="text/html"><span id="el_pharmacy_po_State">
<span<?php echo $pharmacy_po_view->State->viewAttributes() ?>><?php echo $pharmacy_po_view->State->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->Pincode->Visible) { // Pincode ?>
	<tr id="r_Pincode">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Pincode"><script id="tpc_pharmacy_po_Pincode" type="text/html"><?php echo $pharmacy_po_view->Pincode->caption() ?></script></span></td>
		<td data-name="Pincode" <?php echo $pharmacy_po_view->Pincode->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Pincode" type="text/html"><span id="el_pharmacy_po_Pincode">
<span<?php echo $pharmacy_po_view->Pincode->viewAttributes() ?>><?php echo $pharmacy_po_view->Pincode->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->Phone->Visible) { // Phone ?>
	<tr id="r_Phone">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Phone"><script id="tpc_pharmacy_po_Phone" type="text/html"><?php echo $pharmacy_po_view->Phone->caption() ?></script></span></td>
		<td data-name="Phone" <?php echo $pharmacy_po_view->Phone->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Phone" type="text/html"><span id="el_pharmacy_po_Phone">
<span<?php echo $pharmacy_po_view->Phone->viewAttributes() ?>><?php echo $pharmacy_po_view->Phone->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->Fax->Visible) { // Fax ?>
	<tr id="r_Fax">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_Fax"><script id="tpc_pharmacy_po_Fax" type="text/html"><?php echo $pharmacy_po_view->Fax->caption() ?></script></span></td>
		<td data-name="Fax" <?php echo $pharmacy_po_view->Fax->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Fax" type="text/html"><span id="el_pharmacy_po_Fax">
<span<?php echo $pharmacy_po_view->Fax->viewAttributes() ?>><?php echo $pharmacy_po_view->Fax->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->EEmail->Visible) { // EEmail ?>
	<tr id="r_EEmail">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_EEmail"><script id="tpc_pharmacy_po_EEmail" type="text/html"><?php echo $pharmacy_po_view->EEmail->caption() ?></script></span></td>
		<td data-name="EEmail" <?php echo $pharmacy_po_view->EEmail->cellAttributes() ?>>
<script id="tpx_pharmacy_po_EEmail" type="text/html"><span id="el_pharmacy_po_EEmail">
<span<?php echo $pharmacy_po_view->EEmail->viewAttributes() ?>><?php echo $pharmacy_po_view->EEmail->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_HospID"><script id="tpc_pharmacy_po_HospID" type="text/html"><?php echo $pharmacy_po_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $pharmacy_po_view->HospID->cellAttributes() ?>>
<script id="tpx_pharmacy_po_HospID" type="text/html"><span id="el_pharmacy_po_HospID">
<span<?php echo $pharmacy_po_view->HospID->viewAttributes() ?>><?php echo $pharmacy_po_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_createdby"><script id="tpc_pharmacy_po_createdby" type="text/html"><?php echo $pharmacy_po_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $pharmacy_po_view->createdby->cellAttributes() ?>>
<script id="tpx_pharmacy_po_createdby" type="text/html"><span id="el_pharmacy_po_createdby">
<span<?php echo $pharmacy_po_view->createdby->viewAttributes() ?>><?php echo $pharmacy_po_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_createddatetime"><script id="tpc_pharmacy_po_createddatetime" type="text/html"><?php echo $pharmacy_po_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $pharmacy_po_view->createddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_po_createddatetime" type="text/html"><span id="el_pharmacy_po_createddatetime">
<span<?php echo $pharmacy_po_view->createddatetime->viewAttributes() ?>><?php echo $pharmacy_po_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_modifiedby"><script id="tpc_pharmacy_po_modifiedby" type="text/html"><?php echo $pharmacy_po_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $pharmacy_po_view->modifiedby->cellAttributes() ?>>
<script id="tpx_pharmacy_po_modifiedby" type="text/html"><span id="el_pharmacy_po_modifiedby">
<span<?php echo $pharmacy_po_view->modifiedby->viewAttributes() ?>><?php echo $pharmacy_po_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_modifieddatetime"><script id="tpc_pharmacy_po_modifieddatetime" type="text/html"><?php echo $pharmacy_po_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $pharmacy_po_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_po_modifieddatetime" type="text/html"><span id="el_pharmacy_po_modifieddatetime">
<span<?php echo $pharmacy_po_view->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_po_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_po_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_po_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_po_BRCODE"><script id="tpc_pharmacy_po_BRCODE" type="text/html"><?php echo $pharmacy_po_view->BRCODE->caption() ?></script></span></td>
		<td data-name="BRCODE" <?php echo $pharmacy_po_view->BRCODE->cellAttributes() ?>>
<script id="tpx_pharmacy_po_BRCODE" type="text/html"><span id="el_pharmacy_po_BRCODE">
<span<?php echo $pharmacy_po_view->BRCODE->viewAttributes() ?>><?php echo $pharmacy_po_view->BRCODE->getViewValue() ?></span>
</span></script>
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
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_po_ORDNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_ORDNO")/}}</h3>
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
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_BRCODE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_BRCODE")/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_PC"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_PC")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_DT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_DT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_YM"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_YM")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Customercode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Customercode")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Customername"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Customername")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Phone"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Phone")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Address1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Address1")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Address2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Address2")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Address3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Address3")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_State"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_State")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Pincode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Pincode")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_po_Fax"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_po_Fax")/}}</span>
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
<?php if ($pharmacy_po->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("pharmacy_purchaseorder", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_purchaseordergrid.php" ?>
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($pharmacy_po->Rows) ?> };
	ew.applyTemplate("tpd_pharmacy_poview", "tpm_pharmacy_poview", "pharmacy_poview", "<?php echo $pharmacy_po->CustomExport ?>", ew.templateData.rows[0]);
	$("script.pharmacy_poview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$pharmacy_po_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_po_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_po_view->terminate();
?>