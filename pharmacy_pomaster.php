<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($pharmacy_po->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacy_pomaster" class="table ew-view-table ew-master-table ew-vertical d-none">
	<tbody>
<?php if ($pharmacy_po->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_id" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->id->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->id->cellAttributes() ?>>
<script id="tpx_pharmacy_po_id" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_ORDNO" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->ORDNO->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->ORDNO->cellAttributes() ?>>
<script id="tpx_pharmacy_po_ORDNO" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_DT" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->DT->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->DT->cellAttributes() ?>>
<script id="tpx_pharmacy_po_DT" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_YM" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->YM->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->YM->cellAttributes() ?>>
<script id="tpx_pharmacy_po_YM" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_PC" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->PC->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->PC->cellAttributes() ?>>
<script id="tpx_pharmacy_po_PC" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_Customercode" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->Customercode->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->Customercode->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Customercode" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_Customername" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->Customername->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->Customername->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Customername" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_pharmacy_pocol" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->pharmacy_pocol->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->pharmacy_pocol->cellAttributes() ?>>
<script id="tpx_pharmacy_po_pharmacy_pocol" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_Address1" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->Address1->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->Address1->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address1" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_Address2" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->Address2->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->Address2->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address2" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_Address3" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->Address3->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->Address3->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Address3" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_State" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->State->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->State->cellAttributes() ?>>
<script id="tpx_pharmacy_po_State" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_Pincode" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->Pincode->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->Pincode->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Pincode" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_Phone" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->Phone->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->Phone->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Phone" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_Fax" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->Fax->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->Fax->cellAttributes() ?>>
<script id="tpx_pharmacy_po_Fax" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_EEmail" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->EEmail->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->EEmail->cellAttributes() ?>>
<script id="tpx_pharmacy_po_EEmail" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_HospID" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->HospID->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->HospID->cellAttributes() ?>>
<script id="tpx_pharmacy_po_HospID" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_createdby" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->createdby->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->createdby->cellAttributes() ?>>
<script id="tpx_pharmacy_po_createdby" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_createddatetime" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->createddatetime->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->createddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_po_createddatetime" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_modifiedby" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->modifiedby->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->modifiedby->cellAttributes() ?>>
<script id="tpx_pharmacy_po_modifiedby" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_modifieddatetime" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->modifieddatetime->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->modifieddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_po_modifieddatetime" class="pharmacy_pomaster" type="text/html">
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
			<td class="<?php echo $pharmacy_po->TableLeftColumnClass ?>"><script id="tpc_pharmacy_po_BRCODE" class="pharmacy_pomaster" type="text/html"><span><?php echo $pharmacy_po->BRCODE->caption() ?></span></script></td>
			<td<?php echo $pharmacy_po->BRCODE->cellAttributes() ?>>
<script id="tpx_pharmacy_po_BRCODE" class="pharmacy_pomaster" type="text/html">
<span id="el_pharmacy_po_BRCODE">
<span<?php echo $pharmacy_po->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_po->BRCODE->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<div id="tpd_pharmacy_pomaster" class="ew-custom-template"></div>
<script id="tpm_pharmacy_pomaster" type="text/html">
<div id="ct_pharmacy_po_master"><style>
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
<div id="divCheckbox" style="display: none;">{{include tmpl="#tpc_pharmacy_po_pharmacy_pocol"/}}&nbsp;{{include tmpl="#tpx_pharmacy_po_pharmacy_pocol"/}}</div>
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
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($pharmacy_po->Rows) ?> };
ew.applyTemplate("tpd_pharmacy_pomaster", "tpm_pharmacy_pomaster", "pharmacy_pomaster", "<?php echo $pharmacy_po->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.pharmacy_pomaster_js").each(function(){ew.addScript(this.text);});
</script>
<?php } ?>