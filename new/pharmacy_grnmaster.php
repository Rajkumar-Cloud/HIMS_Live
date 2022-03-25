<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($pharmacy_grn->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacy_grnmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
	<tbody>
<?php if ($pharmacy_grn->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_id" type="text/html"><?php echo $pharmacy_grn->id->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->id->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_id" type="text/html"><span id="el_pharmacy_grn_id">
<span<?php echo $pharmacy_grn->id->viewAttributes() ?>><?php echo $pharmacy_grn->id->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
		<tr id="r_GRNNO">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_GRNNO" type="text/html"><?php echo $pharmacy_grn->GRNNO->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->GRNNO->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_GRNNO" type="text/html"><span id="el_pharmacy_grn_GRNNO">
<span<?php echo $pharmacy_grn->GRNNO->viewAttributes() ?>><?php echo $pharmacy_grn->GRNNO->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
		<tr id="r_DT">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_DT" type="text/html"><?php echo $pharmacy_grn->DT->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->DT->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_DT" type="text/html"><span id="el_pharmacy_grn_DT">
<span<?php echo $pharmacy_grn->DT->viewAttributes() ?>><?php echo $pharmacy_grn->DT->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
		<tr id="r_Customername">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_Customername" type="text/html"><?php echo $pharmacy_grn->Customername->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->Customername->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Customername" type="text/html"><span id="el_pharmacy_grn_Customername">
<span<?php echo $pharmacy_grn->Customername->viewAttributes() ?>><?php echo $pharmacy_grn->Customername->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->State->Visible) { // State ?>
		<tr id="r_State">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_State" type="text/html"><?php echo $pharmacy_grn->State->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->State->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_State" type="text/html"><span id="el_pharmacy_grn_State">
<span<?php echo $pharmacy_grn->State->viewAttributes() ?>><?php echo $pharmacy_grn->State->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
		<tr id="r_Pincode">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_Pincode" type="text/html"><?php echo $pharmacy_grn->Pincode->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->Pincode->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Pincode" type="text/html"><span id="el_pharmacy_grn_Pincode">
<span<?php echo $pharmacy_grn->Pincode->viewAttributes() ?>><?php echo $pharmacy_grn->Pincode->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
		<tr id="r_Phone">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_Phone" type="text/html"><?php echo $pharmacy_grn->Phone->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->Phone->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Phone" type="text/html"><span id="el_pharmacy_grn_Phone">
<span<?php echo $pharmacy_grn->Phone->viewAttributes() ?>><?php echo $pharmacy_grn->Phone->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
		<tr id="r_BILLNO">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_BILLNO" type="text/html"><?php echo $pharmacy_grn->BILLNO->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->BILLNO->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BILLNO" type="text/html"><span id="el_pharmacy_grn_BILLNO">
<span<?php echo $pharmacy_grn->BILLNO->viewAttributes() ?>><?php echo $pharmacy_grn->BILLNO->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
		<tr id="r_BILLDT">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_BILLDT" type="text/html"><?php echo $pharmacy_grn->BILLDT->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->BILLDT->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BILLDT" type="text/html"><span id="el_pharmacy_grn_BILLDT">
<span<?php echo $pharmacy_grn->BILLDT->viewAttributes() ?>><?php echo $pharmacy_grn->BILLDT->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<tr id="r_BillTotalValue">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_BillTotalValue" type="text/html"><?php echo $pharmacy_grn->BillTotalValue->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->BillTotalValue->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BillTotalValue" type="text/html"><span id="el_pharmacy_grn_BillTotalValue">
<span<?php echo $pharmacy_grn->BillTotalValue->viewAttributes() ?>><?php echo $pharmacy_grn->BillTotalValue->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<tr id="r_GRNTotalValue">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_GRNTotalValue" type="text/html"><?php echo $pharmacy_grn->GRNTotalValue->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->GRNTotalValue->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_GRNTotalValue" type="text/html"><span id="el_pharmacy_grn_GRNTotalValue">
<span<?php echo $pharmacy_grn->GRNTotalValue->viewAttributes() ?>><?php echo $pharmacy_grn->GRNTotalValue->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
		<tr id="r_BillDiscount">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_BillDiscount" type="text/html"><?php echo $pharmacy_grn->BillDiscount->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->BillDiscount->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BillDiscount" type="text/html"><span id="el_pharmacy_grn_BillDiscount">
<span<?php echo $pharmacy_grn->BillDiscount->viewAttributes() ?>><?php echo $pharmacy_grn->BillDiscount->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
		<tr id="r_GrnValue">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_GrnValue" type="text/html"><?php echo $pharmacy_grn->GrnValue->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->GrnValue->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_GrnValue" type="text/html"><span id="el_pharmacy_grn_GrnValue">
<span<?php echo $pharmacy_grn->GrnValue->viewAttributes() ?>><?php echo $pharmacy_grn->GrnValue->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
		<tr id="r_Pid">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_Pid" type="text/html"><?php echo $pharmacy_grn->Pid->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->Pid->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Pid" type="text/html"><span id="el_pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn->Pid->viewAttributes() ?>><?php echo $pharmacy_grn->Pid->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
		<tr id="r_PaymentNo">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_PaymentNo" type="text/html"><?php echo $pharmacy_grn->PaymentNo->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->PaymentNo->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PaymentNo" type="text/html"><span id="el_pharmacy_grn_PaymentNo">
<span<?php echo $pharmacy_grn->PaymentNo->viewAttributes() ?>><?php echo $pharmacy_grn->PaymentNo->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<tr id="r_PaymentStatus">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_PaymentStatus" type="text/html"><?php echo $pharmacy_grn->PaymentStatus->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->PaymentStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PaymentStatus" type="text/html"><span id="el_pharmacy_grn_PaymentStatus">
<span<?php echo $pharmacy_grn->PaymentStatus->viewAttributes() ?>><?php echo $pharmacy_grn->PaymentStatus->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
		<tr id="r_PaidAmount">
			<td class="<?php echo $pharmacy_grn->TableLeftColumnClass ?>"><script id="tpc_pharmacy_grn_PaidAmount" type="text/html"><?php echo $pharmacy_grn->PaidAmount->caption() ?></script></td>
			<td <?php echo $pharmacy_grn->PaidAmount->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PaidAmount" type="text/html"><span id="el_pharmacy_grn_PaidAmount">
<span<?php echo $pharmacy_grn->PaidAmount->viewAttributes() ?>><?php echo $pharmacy_grn->PaidAmount->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<div id="tpd_pharmacy_grnmaster" class="ew-custom-template"></div>
<script id="tpm_pharmacy_grnmaster" type="text/html">
<div id="ct_pharmacy_grn_master"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_grn_GRNNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_GRNNO")/}}</h3>
	</div>
</div>
<div id="divCheckbox" style="display: none;">{{include tmpl="#tpc_pharmacy_grn_pharmacy_pocol"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_pharmacy_pocol")/}}</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BRCODE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BRCODE")/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_PC"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_PC")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_DT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_DT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_YM"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_YM")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Customercode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Customercode")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Customername"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Customername")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BILLDT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BILLDT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BILLNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BILLNO")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BillTotalValue"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BillTotalValue")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BillUpload"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BillUpload")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Remarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Remarks")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Address1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Address1")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Address2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Address2")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Address3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Address3")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_State"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_State")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Pincode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Pincode")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Fax"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Fax")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Phone"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Phone")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_GRNTotalValue"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_GRNTotalValue")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_TransPort"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_TransPort")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_AnyOther"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_AnyOther")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BillDiscount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BillDiscount")/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_GrnValue"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_GrnValue")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</script>

<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($pharmacy_grn->Rows) ?> };
	ew.applyTemplate("tpd_pharmacy_grnmaster", "tpm_pharmacy_grnmaster", "pharmacy_grnmaster", "<?php echo $pharmacy_grn->CustomExport ?>", ew.templateData.rows[0]);
	$("script.pharmacy_grnmaster_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php } ?>