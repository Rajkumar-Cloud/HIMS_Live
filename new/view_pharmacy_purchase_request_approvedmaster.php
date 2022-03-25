<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($view_pharmacy_purchase_request_approved->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_pharmacy_purchase_request_approvedmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
	<tbody>
<?php if ($view_pharmacy_purchase_request_approved->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_approved_id" type="text/html"><?php echo $view_pharmacy_purchase_request_approved->id->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_approved->id->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_id" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_id">
<span<?php echo $view_pharmacy_purchase_request_approved->id->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved->id->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->DT->Visible) { // DT ?>
		<tr id="r_DT">
			<td class="<?php echo $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_approved_DT" type="text/html"><?php echo $view_pharmacy_purchase_request_approved->DT->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_approved->DT->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_DT" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_DT">
<span<?php echo $view_pharmacy_purchase_request_approved->DT->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved->DT->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->EmployeeName->Visible) { // EmployeeName ?>
		<tr id="r_EmployeeName">
			<td class="<?php echo $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_approved_EmployeeName" type="text/html"><?php echo $view_pharmacy_purchase_request_approved->EmployeeName->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_approved->EmployeeName->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_EmployeeName" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_EmployeeName">
<span<?php echo $view_pharmacy_purchase_request_approved->EmployeeName->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved->EmployeeName->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->Department->Visible) { // Department ?>
		<tr id="r_Department">
			<td class="<?php echo $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_approved_Department" type="text/html"><?php echo $view_pharmacy_purchase_request_approved->Department->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_approved->Department->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_Department" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_Department">
<span<?php echo $view_pharmacy_purchase_request_approved->Department->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved->Department->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<tr id="r_ApprovedStatus">
			<td class="<?php echo $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_approved_ApprovedStatus" type="text/html"><?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_ApprovedStatus" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<tr id="r_PurchaseStatus">
			<td class="<?php echo $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_approved_PurchaseStatus" type="text/html"><?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_PurchaseStatus" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_approved_HospID" type="text/html"><?php echo $view_pharmacy_purchase_request_approved->HospID->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_approved->HospID->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_HospID" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_HospID">
<span<?php echo $view_pharmacy_purchase_request_approved->HospID->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved->HospID->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->createdby->Visible) { // createdby ?>
		<tr id="r_createdby">
			<td class="<?php echo $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_approved_createdby" type="text/html"><?php echo $view_pharmacy_purchase_request_approved->createdby->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_approved->createdby->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_createdby" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_createdby">
<span<?php echo $view_pharmacy_purchase_request_approved->createdby->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved->createdby->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_approved_createddatetime" type="text/html"><?php echo $view_pharmacy_purchase_request_approved->createddatetime->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_approved->createddatetime->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_createddatetime" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_approved->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved->createddatetime->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->modifiedby->Visible) { // modifiedby ?>
		<tr id="r_modifiedby">
			<td class="<?php echo $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_approved_modifiedby" type="text/html"><?php echo $view_pharmacy_purchase_request_approved->modifiedby->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_approved->modifiedby->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_modifiedby" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_approved->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved->modifiedby->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->modifieddatetime->Visible) { // modifieddatetime ?>
		<tr id="r_modifieddatetime">
			<td class="<?php echo $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_approved_modifieddatetime" type="text/html"><?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_modifieddatetime" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->BRCODE->Visible) { // BRCODE ?>
		<tr id="r_BRCODE">
			<td class="<?php echo $view_pharmacy_purchase_request_approved->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_approved_BRCODE" type="text/html"><?php echo $view_pharmacy_purchase_request_approved->BRCODE->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_approved->BRCODE->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_BRCODE" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_approved->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved->BRCODE->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<div id="tpd_view_pharmacy_purchase_request_approvedmaster" class="ew-custom-template"></div>
<script id="tpm_view_pharmacy_purchase_request_approvedmaster" type="text/html">
<div id="ct_view_pharmacy_purchase_request_approved_master">
<style>
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
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<input id="createdbyId" name="createdbyId" type="hidden" value="<?php echo CurrentUserName(); ?>">
<input id="HospIDId" name="HospIDId" type="hidden" value="<?php echo HospitalID(); ?>">
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_approved_EmployeeName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_pharmacy_purchase_request_approved_EmployeeName")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_approved_Department"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_pharmacy_purchase_request_approved_Department")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_approved_DT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_pharmacy_purchase_request_approved_DT")/}}</h3>
	</div>
</div>
</div>
</script>

<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_pharmacy_purchase_request_approved->Rows) ?> };
	ew.applyTemplate("tpd_view_pharmacy_purchase_request_approvedmaster", "tpm_view_pharmacy_purchase_request_approvedmaster", "view_pharmacy_purchase_request_approvedmaster", "<?php echo $view_pharmacy_purchase_request_approved->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_pharmacy_purchase_request_approvedmaster_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php } ?>