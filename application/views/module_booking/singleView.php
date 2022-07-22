<?php
error_reporting(0);
$this->load->view('inc/header');
?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#d_city').select2();
		$('#o_city').select2();
		$('#customer_id').select2();
		//$('#pick_point').select2();
		$('input[type="number"]').keydown(function(e) {
			if (e.keyCode == 13) {
				if ($(':input:eq(' + ($(':input').index(this) + 1) + ')').attr('type') == 'submit') { // check for submit button and submit form on enter press
					return true;
				}
				$(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
				return false;
			}
		});



		$('input[type="date"]').keydown(function(e) {
			if (e.keyCode == 13) {
				if ($(':input:eq(' + ($(':input').index(this) + 1) + ')').attr('type') == 'submit') { // check for submit button and submit form on enter press
					return true;
				}
				$(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
				return false;
			}
		});



		$('input[type="text"]').keydown(function(e) {
			if (e.keyCode == 13) {
				if ($(':input:eq(' + ($(':input').index(this) + 1) + ')').attr('type') == 'submit') { // check for submit button and submit form on enter press
					return true;
				}
				$(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
				return false;
			}
		});


		$('input[type="email"]').keydown(function(e) {
			if (e.keyCode == 13) {
				if ($(':input:eq(' + ($(':input').index(this) + 1) + ')').attr('type') == 'submit') { // check for submit button and submit form on enter press
					return true;
				}
				$(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
				return false;
			}
		});

		$('input[type="radio"]').keydown(function(e) {
			if (e.keyCode == 13) {
				if ($(':input:eq(' + ($(':input').index(this) + 1) + ')').attr('type') == 'submit') { // check for submit button and submit form on enter press
					return true;
				}
				$(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
				return false;
			}
		});


		$('checkbox').keydown(function(e) {
			if (e.keyCode == 13) {
				if ($(':input:eq(' + ($(':input').index(this) + 1) + ')').attr('type') == 'submit') { // check for submit button and submit form on enter press
					return true;
				}
				$(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
				return false;
			}
		});

	});
</script>

<!-- START PAGE CONTENT WRAPPER -->
<div class="page-content-wrapper">
	<!-- START PAGE CONTENT -->
	<div class="content">
		<!-- START CONTAINER FLUID -->
		<div class="container-fluid container-fixed-lg">
			<!-- BEGIN PlACE PAGE CONTENT HERE -->
			<div class="pgn-wrapper" data-position="top" style="top: 48px;" id="msg_div"></div>
			<div class="row">
				<div class="col-xl-12 col-lg-12">
					<!-- START card -->
					<div class=" container-fluid   container-fixed-lg bg-white">
						<div class="row">
							<!--------------Right Side End----------->
							<div class="col-md-12">
								<div class="card card-transparent">
									<div class="card-body">
										<div class="container-fluid">
											<div class="form-group-attached">
												<div class="row clearfix">
													<div class="col-md-3">
														<div class="form-group form-group-default required" aria-required="true" id="customer_id_div">
															<label>Customer Account #</label>
															<select class="form-control" name="customer_id" id="customer_id" tabindex="1" required="" onchange="cusotmer_mode()" aria-required="true">
																<option value=""> Select Customer</option>
																<?php if (!empty($customer_data)) {
																	foreach ($customer_data as $types) {
																		echo ("<option value='" . $types->customer_id . "'>[" . $types->customer_account_no . "] " . $types->customer_note . "</option>");
																	}
																}
																?>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group form-group-default required" aria-required="true" id="o_city_div">
															<label>Origin City</label>
															<select class='form-control' name="o_city" id="o_city" tabindex="2">
																<option value="">Select Origin City</option>
																<?php if (!empty($cities_data)) {
																	foreach ($cities_data as $rows) {
																		echo ("<option value='" . $rows->city_id . "'>(" . $rows->city_code . ") (" . $rows->city_short_code . ") " . $rows->city_full_name . "</option>");
																	}
																} ?>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group form-group-default required" aria-required="true" id="d_city_div">
															<label>Destination</label>
															<select class='form-control' name="d_city" id="d_city" tabindex="3">
																<option value="">Select Destination City</option>
																<?php if (!empty($cities_data)) {
																	foreach ($cities_data as $rows) {
																		echo ("<option value='" . $rows->city_id . "'>(" . $rows->city_code . ") (" . $rows->city_short_code . ") " . $rows->city_full_name . "</option>");
																	}
																} ?>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group form-group-default" aria-required="true" id="manual_cn_div">
															<label>Manual CN</label>
															<input type="number" maxlength="6" class="form-control" onblur="check_mcn();" name="manual_cn" id="manual_cn" tabindex="4" aria-required="true">
														</div>
													</div>
												</div>
											</div>
											<div class="row clearfix">
												<div class="col-md-12">
													<p><strong>Consignee's Detail</strong></p>
													<div class="form-group-attached">
														<div class="form-group form-group-default required" aria-required="true" id="c_name_div">
															<label>Consignee Name <i class="fa fa-info text-complete m-l-5"></i>
															</label>
															<input type="text" class="form-control" name="c_name" id="c_name" onblur="auto_fill();" tabindex="5">
														</div>
														<div class="form-group form-group-default required" aria-required="true" id="c_phone_div">
															<label>Consignee Phone</label>
															<input id="c_phone" type="tel" class="form-control date" name="c_phone" required="" tabindex="6" aria-required="true">
														</div>
														<div class="form-group form-group-default" id="c_address_div">
															<label>Consignee Address</label>
															<input type="text" class="form-control" name="c_address" id="c_address" tabindex="7" autocomplete="on">
														</div>
														<div class="form-group form-group-default" id="c_email_div">
															<label>Consignee Email</label>
															<input type="email" class="form-control email" value="na@na.na" name="c_email" id="c_email" tabindex="8" autocomplete="on">
														</div>
													</div>
												</div>
											</div>

											<div class="row clearfix">
												<div class="col-md-12">
													<p><strong>Shipper's Detail</strong></p>
													<div class="form-group-attached">
														<div class="form-group form-group-default required" aria-required="true" id="s_name_div">
															<label>Shipper Name <i class="fa fa-info text-complete m-l-5"></i>
															</label>
															<input type="text" class="form-control" name="s_name" id="s_name" tabindex="9">
														</div>
														<div class="form-group form-group-default" id="s_phone_div">
															<label>Shipper Phone</label>
															<input type="tel" class="form-control" name="s_phone" id="s_phone" required="" tabindex="10">
														</div>
														<div class="form-group form-group-default" id="s_address_div">
															<label>Shipper Address</label>
															<input class="form-control" name="s_address" id="s_address" tabindex="11">
														</div>
														<div class="form-group form-group-default" id="s_email_div">
															<label>Shipper Email</label>
															<input type="email" class="form-control email" value="na@na.na" name="s_email" id="s_email" tabindex="12" autocomplete="on">
														</div>
													</div>
												</div>
											</div>
											<div class="form-group-attached">
												<p><strong>Shipment Details</strong></p>
												<div class="row clearfix">
													<div class="col-md-3">
														<div class="form-group form-group-default required" aria-required="true" id="order_piece_div">
															<label>Pieces</label>
															<input type="hidden" name="art_pcs" id="art_pcs" />
															<input type="number" value="1" class="form-control" name="order_piece" id="order_piece" tabindex="13">
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group form-group-default required" aria-required="true" id="packing_type_div">
															<label>Packing Type</label>
															<select class='form-control' name="packing_type" id="packing_type" tabindex="14">
																<option value="Carton">Carton</option>
																<option value="Sack">Sack</option>
																<option value="Container">Container</option>
																<option value="Open/Loose">Open/Loose</option>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group form-group-default required" id="order_weight_div">
															<label>WGT(KG)</label>
															<input type="hidden" name="art_wt" id="art_wt" />
															<input type="number" value="5.00" min="0.01" class="form-control" name="order_weight" id="order_weight" tabindex="15">
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group form-group-default">
															<label>Shipper Declares Value for Carrage</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row clearfix">
												<div class="col-md-6">
													<div class="row clearfix">
														<div class="col-md-12">
															<div class="form-group form-group-default required" aria-required="true" id="product_detail_div">
																<input type="hidden" id="arts" name="arts" value="" />
																<label>Nature of Goods (Contents)</label>
																<div class="row" id="pd" name="pd">
																	<div class="col-12">
																		<input type="text" class="form-control" name="product_detail" id="product_detail" tabindex="16">
																	</div>
																</div>
															</div>
														</div>
													</div>
													<!--<div class="form-group-attached">
														<div class="row clearfix">
														<div class="col-md-12">
														<div class="form-group form-group-default">
														<p><strong>Weight Charges</strong></p>
														</div>
														</div>
														</div>
														</div>
														<div class="form-group-attached">
														<div class="row clearfix">
														<div class="col-md-6">															
														<div class="form-group form-group-default">
														<label>Chargable WT</label>
														</div>
														</div>
														<div class="col-md-6">															
														<div class="form-group form-group-default">
														<label>Kgs@</label>
														</div>
														</div>													
														</div>
														</div>
														<div class="row clearfix">
														<div class="col-md-12">
														<div class="form-group form-group-default">
														<label>Other Charges</label>
														</div>
														</div>
														</div>
													-->
													<p><strong>Mode of Payment</strong></p>
													<div class="form-group-attached" id="pay_mode_div">
														<div class="row clearfix">
															<div class="col-md-3" id="cash_div_div">
																<div class="form-group form-group-default">
																	<label for="paymode4">Cash</label>
																	<input type="radio" id="paymode4" name="paymode" value="Cash" tabindex="17" disabled>
																	<label>Cash Amount</label>
																	<input type="number" class="form-control" name="cash_sc" id="cash_sc" autocomplete="on" tabindex="18" disabled>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group form-group-default">
																	<label for="paymode1">Account</label>
																	<input type="radio" id="paymode1" name="paymode" value="Account" tabindex="19" disabled>
																</div>
															</div>
															<div class="col-md-3" id="cod_div_div">
																<div class="form-group form-group-default required" id="cod_div">
																	<label for="paymode2">FOD</label>
																	<input type="radio" id="paymode2" name="paymode" value="COD" tabindex="20" disabled>
																	<label>FOD Amount</label>
																	<input type="number" class="form-control" name="cod" id="cod" autocomplete="on" tabindex="21" disabled value="0">
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group form-group-default">
																	<label for="paymode5">FOC</label>
																	<input type="radio" id="paymode5" name="paymode" value="FOC" tabindex="22" disabled>
																</div>
															</div>
														</div>
													</div>
													<p><strong>Service Type</strong></p>
													<div class="form-group-attached" id="service_type_div">
														<div class="row clearfix">
															<div class="col-md-2">
																<div class="form-group form-group-default">
																	<label for="servicetype4"><small>Air Freight</small></label>
																	<input type="radio" id="servicetype4" name="servicetype" value="4" tabindex="23" disabled>
																</div>
															</div>
															<div class="col-md-2">
																<div class="form-group form-group-default">
																	<label for="servicetype1"><small>Express Cargo/Over Night</small></label>
																	<input type="radio" id="servicetype1" name="servicetype" value="1" tabindex="24" disabled>
																</div>
															</div>
															<div class="col-md-2">
																<div class="form-group form-group-default">
																	<label for="servicetype2"><small>Overland</small></label>
																	<input type="radio" id="servicetype2" name="servicetype" value="2" tabindex="25" disabled>
																</div>
															</div>
															<div class="col-md-2">
																<div class="form-group form-group-default">
																	<label for="servicetype3"><small>Detain</small></label>
																	<input type="radio" id="servicetype3" name="servicetype" value="3" tabindex="26" disabled>
																</div>
															</div>
															<div class="col-md-2">
																<div class="form-group form-group-default">
																	<label for="servicetype5"><small>Full Truck Load</small></label>
																	<input type="radio" id="servicetype5" name="servicetype" value="5" tabindex="27" disabled>
																</div>
															</div>
															<div class="col-md-2">
																<div class="form-group form-group-default">
																	<label for="servicetype6"><small>Warehousing</small></label>
																	<input type="radio" id="servicetype6" name="servicetype" value="6" tabindex="28" disabled>
																</div>
															</div>
														</div>
													</div>
													<!--<p><strong>Packing Condition</strong></p>
														<div class="form-group-attached">
														<div class="row clearfix">														
														<div class="col-md-4">
														<div class="form-group form-group-default">
														<label>Poor</label>
														</div>
														</div>
														<div class="col-md-4">
														<div class="form-group form-group-default">
														<label>Average</label>
														</div>
														</div>
														<div class="col-md-4">
														<div class="form-group form-group-default">
														<label>Execllent</label>
														</div>
														</div>
														</div>
														</div> <p><strong>Delivery Type</strong></p>
														<div class="form-group-attached">
														<div class="row clearfix">
														<div class="col-md-6">
														<div class="form-group form-group-default">
														<label>Self Collection</label>
														</div>
														</div>
														<div class="col-md-6">
														<div class="form-group form-group-default">
														<label>Door to Door</label>
														</div>
														</div>
														</div>
													</div>-->
												</div>
												<div class="col-md-6">
													<!--<p><strong>DIMS:</strong></p>
														<div class="form-group-attached">
														<div class="row clearfix">
														<div class="col-md-3">															
														<div class="form-group form-group-default">
														<label>L</label>																
														</div>
														</div>
														<div class="col-md-3">															
														<div class="form-group form-group-default">
														<label>W</label>																
														</div>
														</div>
														<div class="col-md-3">															
														<div class="form-group form-group-default">
														<label>H</label>																
														</div>
														</div>
														<div class="col-md-3">															
														<div class="form-group form-group-default">
														<label>Kg</label>																
														</div>
														</div>
														</div>
														</div>
														<div class="form-group-attached">
														<div class="row clearfix">
														<div class="col-md-6">															
														<div class="form-group form-group-default">
														<label>Freight Charges</label>																
														</div>
														</div>
														<div class="col-md-6">															
														<div class="form-group form-group-default">
														<label>Insurance Premium</label>																
														</div>
														</div>
														</div>
														</div>
														<div class="form-group-attached">
														<div class="row clearfix">
														<div class="col-md-6">															
														<div class="form-group form-group-default">
														<label>Airway Bill Fee</label>																
														</div>
														</div>
														<div class="col-md-6">
														<div class="form-group form-group-default">
														<label>Fuel Surcharge</label>																
														</div>
														</div>
														</div>
														</div>
														<div class="form-group-attached">
														<div class="row clearfix">
														<div class="col-md-6">
														<div class="form-group form-group-default">
														<label>Sales Tax</label>																
														</div>
														</div>
														<div class="col-md-6">
														<div class="form-group form-group-default">
														<label>Total Charges</label>																
														</div>
														</div>
														</div>
														</div>
													-->
													<div class="row clearfix">
														<div class="col-md-12">
															<div class="form-group form-group-default required" aria-required="true" id="order_date_div">
																<label>Date</label>
																<input type="date" class="form-control" name="order_date" id="order_date" tabindex="29" min="<?php echo date("Y-m-25", strtotime('-2 month', strtotime(date("Y-m-d")))); ?>" max="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" pattern="\d{4}-\d{2}-\d{2}">
															</div>
														</div>
													</div>
													<!--<div class="row clearfix">
														<div class="col-md-12">
														<div class="form-group form-group-default">
														<label>Time</label>																
														</div>
														</div>
													</div>-->
													<div class="row clearfix">
														<div class="col-md-12" id="remark_div_div">
															<div class="form-group form-group-default" id="remark_div">
																<label>Description / Remarks</label>
																<input type="text" class="form-control" value="N/A" name="remark" id="remark" autocomplete="on" tabindex="30">
															</div>
														</div>
													</div>
													<div class="row clearfix">
														<div class="col-md-12">
															<div class="form-group form-group-default" id="reference_no_div">
																<label>Reference No</label>
																<input type="text" class="form-control" name="reference_no" tabindex="31" id="reference_no" value="#">
															</div>
														</div>
													</div>
													<p><strong>Recheck Weight</strong></p>
													<div class="form-group-attached" id="recheck_weight_div">
														<div class="row clearfix">
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label for="recheckweight1">Yes</label>
																	<input type="radio" id="recheckweight1" name="recheckweight" tabindex="32" value="Yes">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label for="recheckweight2">No</label>
																	<input type="radio" id="recheckweight2" name="recheckweight" tabindex="33" value="No" checked>
																</div>
															</div>
														</div>
													</div>
													<p><strong>Additional Charges</strong></p>
													<div class="row clearfix">
														<div class="col-md-12">
															<div class="form-group form-group-default" id="osa_div">
																<label>OSA Charges</label>
																<input type="number" class="form-control" name="osa" id="osa" tabindex="34" value="0">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group-attached">
											<div class="row clearfix" id="result_div">
											</div>
										</div>
										<br>
										<input type='hidden' id="is_cod" name="is_cod">
										<div class="form-group-attached">
											<div class="row clearfix">
												<button class="btn btn-info" onclick="add_shipment()" tabindex="35">Book Shipment</button>
												<button class="btn btn-default"><i class="pg-close"></i> Clear</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END card -->
			</div>
		</div>
		<!-- END PLACE PAGE CONTENT HERE -->
	</div>
	<!-- END CONTAINER FLUID -->
</div>
<!-- END PAGE CONTENT -->
<script type="text/javascript">
	function cusotmer_mode() {
		$("#customer_pay_mode").val("");
		$("#s_phone").val("");
		$("#s_email").val("");
		$("#s_name").val("");
		$("#product_detail").val("");
		$("#s_address").val("");
		$("#manual_cn").val("");
		$("#cash_sc").val("");
		$("#cod").val("");
		$("#osa").val("0");
		$("#reference_no").val("#");

		var x = 0;
		for (x = 1; x <= 6; x++) {
			$("#servicetype" + x).attr("disabled", true);
			$("#servicetype" + x).attr("checked", false);
			$("#servicetype" + x).trigger('click');
		}

		for (x = 1; x <= 5; x++) {
			if (x != 3) {
				$("#paymode" + x).attr("disabled", true);
				$("#paymode" + x).attr("checked", false);
				$("#paymode" + x).trigger('click');

				if (x == 2) {
					$("#cod").attr("disabled", true);
				}
				if (x == 4) {
					$("#cash_sc").attr("disabled", true);
				}
			}
		}

		var customer = $("#customer_id").val();
		if (customer != "") {
			var mydata = {
				customer_id: customer
			}
			$.ajax({
				url: "<?php echo base_url(); ?>Booking/Booking/get_pay_mode",
				type: "POST",
				data: mydata,
				success: function(data) {
					if (data != "") {
						var myArr = JSON.parse(data);
						var i = 0;

						$("#customer_pay_mode").val(myArr.pay_mode);
						$("#s_phone").val(myArr.phone);
						$("#s_email").val(myArr.email);
						$("#s_name").val(myArr.name);
						$("#s_address").val(myArr.address);
						$("#o_city").val(myArr.city).change();

						if (myArr.articles.length > 0) {
							$("#arts").val(JSON.stringify(myArr.articles));
							$("#product_detail").remove();
							var sel = '<div class="col-8"><select class="form-control" id="product_detail" name="product_detail" required="" aria-required="true" onChange="art_change()">' +
								'<option value="' + myArr.product_type + '">' + myArr.product_type + '</option>';
							for (i = 0; i < myArr.articles.length; i++) {
								sel = sel + '<option value="' + myArr.articles[i]['acc_article_id'] + '">' + myArr.articles[i]['article_name'] + '</option>';
							}
							sel = sel + '</select></div><div class="col-4"><input type="number" class="form-control" name="pd_unit" id="pd_unit" onchange="pd_change()" /></div>';
							$("#pd").html(sel);
							$("#product_detail").select2();
						} else {
							if ($("#product_detail").hasClass("select2-hidden-accessible")) {
								$("#product_detail").select2("destroy");
								$("#arts").val("");
								$("#product_detail").remove();
								$("#pd_unit").remove();
								var inp = '<div class="col-6"><input type="text" class="form-control" name="product_detail" id="product_detail" placeholder="1" tabindex="16"></div>';
								$("#pd").html(inp);
							}
							$("#product_detail").val(myArr.product_type);
						}

						var srvArr = myArr.services.split(",");

						for (i = 0; i < srvArr.length; i++) {
							if (srvArr[i] != 0) {
								$("#servicetype" + srvArr[i]).attr("disabled", false);
								$("#servicetype" + srvArr[i]).attr("checked", true);
								$("#servicetype" + srvArr[i]).trigger('click');
							}
						}

						if (myArr.pay_mode == 2) {
							$("#paymode2").attr("disabled", false);
							$("#paymode2").attr("checked", true);
							$("#paymode2").trigger('click');

							$("#cod").attr("disabled", false);
							$("#cash_sc").attr("disabled", true);

						} else if (myArr.pay_mode == 3) {
							$("#paymode2").attr("disabled", false);
							$("#paymode2").attr("checked", true);
							$("#paymode2").trigger('click');

							$("#paymode1").attr("disabled", false);
							$("#paymode1").attr("checked", true);
							$("#paymode1").trigger('click');

							$("#cod").attr("disabled", false);
							$("#cash_sc").attr("disabled", true);

						} else if (myArr.pay_mode == 4) {
							$("#paymode4").attr("disabled", false);
							$("#paymode4").attr("checked", true);
							$("#paymode4").trigger('click');

							$("#cod").attr("disabled", true);
							$("#cash_sc").attr("disabled", false);
						} else {
							$("#paymode" + myArr.pay_mode).attr("disabled", false);
							$("#paymode" + myArr.pay_mode).attr("checked", true);
							$("#paymode" + myArr.pay_mode).trigger('click');

							$("#cod").attr("disabled", true);
							$("#cash_sc").attr("disabled", true);
						}

						$("#d_city").focus();
					}
				}
			});

		}
	}

	function art_change() {
		const arts = JSON.parse($("#arts").val());
		var val = $("#product_detail").val();
		let art = arts.find(el => el.acc_article_id === val);
		if (art) {
			if (art.pcs_unit) {
				$("#art_pcs").val(art.pcs_unit);
			} else {
				$("#art_pcs").val(0);
			}

			/*if (art.article_weight) {
				$("#art_wt").val(art.article_weight);
			} else {
				$("#art_wt").val(0.00);
			}*/
		}
	}

	function pd_change() {
		var ap = $("#art_pcs").val();
		var aw = $("#art_wt").val();
		var pu = $("#pd_unit").val();

		if (ap) {
			$("#order_piece").val(ap * pu);
		} else {
			$("#order_piece").val(1);
		}

		/*if (aw) {
			$("#order_weight").val(aw * pu);
		} else {
			$("#order_weight").val(5.00);
		}*/
	}

	function check_mcn() {
		var manual_cn = $("#manual_cn").val();
		$("#msg_div").html("");
		if (manual_cn != "") {
			if (manual_cn.length > 6) {
				$("#msg_div").html("<div class='pgn push-on-sidebar-open pgn-bar'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button><strong>Manual CN " + manual_cn + " is invalid.!!!</strong></div></div>");
				$("#manual_cn").val("");
				$("#manual_cn").focus();
			} else if (manual_cn.length < 6) {
				var x = 6 - manual_cn.length;
				var y = '';
				for (var i = 0; i < x; i++) {
					y = y + '0';
				}
				$("#manual_cn").val(y + manual_cn);
				$("#manual_cn").focus();
			} else {
				var mydata = {
					manual_cn: manual_cn
				}
				$.ajax({
					url: "<?php echo base_url(); ?>Booking/Booking/check_manual_cn",
					type: "POST",
					data: mydata,
					success: function(data) {
						if (data == 0) {
							$("#manual_cn_div").css("border-color", "green");
						} else {
							$("#manual_cn_div").css("border-color", "red");
							$("#msg_div").html("<div class='pgn push-on-sidebar-open pgn-bar'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button><strong>Manual CN " + manual_cn + " exists.!!!</strong></div></div>");
							$("#manual_cn").val("");
							$("#manual_cn").focus();
						}
					}
				});
			}
		}
	}

	function auto_fill() {
		var pay_mode = $("#paymode").val();
		if (pay_mode == '') {
			var customer = $("#customer_id").val();
			var destination = $("#d_city").val();
			var name = $("#c_name").val();
			if (customer != "" && destination != "" && name != "") {
				var mydata = {
					customer: customer,
					destination: destination,
					name: name
				}
				$.ajax({
					url: "<?php echo base_url(); ?>Booking/Booking/get_cong_detail",
					type: "POST",
					data: mydata,
					success: function(data) {
						if (data != "") {
							var myArr = JSON.parse(data);
							var paymodeid = myArr.pay_mode_id;
							if (paymodeid.length > 0) {
								for (var x = 1; x <= 5; x++) {
									if (x != 3) {
										$("#paymode" + x).attr("disabled", true);
										$("#paymode" + x).attr("checked", false);
										$("#paymode" + x).trigger('click');
										if (x == 2) {
											$("#cod").attr("disabled", true);
										}
										if (x == 4) {
											$("#cash_sc").attr("disabled", true);
										}
									}
								}
								if (myArr.pay_mode == 2) {
									$("#paymode2").attr("disabled", false);
									$("#paymode2").attr("checked", true);
									$("#paymode2").trigger('click');

									$("#cod").attr("disabled", false);
									$("#cash_sc").attr("disabled", true);

								} else if (myArr.pay_mode == 3) {
									$("#paymode2").attr("disabled", false);
									$("#paymode2").attr("checked", true);
									$("#paymode2").trigger('click');

									$("#paymode1").attr("disabled", false);
									$("#paymode1").attr("checked", true);
									$("#paymode1").trigger('click');

									$("#cod").attr("disabled", false);
									$("#cash_sc").attr("disabled", true);

								} else if (myArr.pay_mode == 4) {
									$("#paymode4").attr("disabled", false);
									$("#paymode4").attr("checked", true);
									$("#paymode4").trigger('click');

									$("#cod").attr("disabled", true);
									$("#cash_sc").attr("disabled", false);
								} else {
									$("#paymode" + myArr.pay_mode).attr("disabled", false);
									$("#paymode" + myArr.pay_mode).attr("checked", true);
									$("#paymode" + myArr.pay_mode).trigger('click');

									$("#cod").attr("disabled", true);
									$("#cash_sc").attr("disabled", true);
								}
							}

							if ($("#c_phone").val() == "") {
								$("#c_phone").val(myArr.phone);
								$("#c_phone").select();
							}

							if (myArr.email != "") {
								$("#c_email").val(myArr.email);
							} else {
								$("#c_email").val("na@na.na");
							}

							if ($("#c_address").val() == "") {
								$("#c_address").val(myArr.address);
								$("#c_address").select();
							}
						}
					}
				});
			}
		}
	}

	function emode() {
		var mode = $("#pay_mode").val();
		if (mode == "Account") {
			$("#is_cod").val("Deactive");
			var myhtml = "<div class='col-md-12' id='remark_div_div'><div class='form-group form-group-default' id='remark_div'><label>Description</label><input type='text' class='form-control' name='remark' id='remark' autocomplete='on' tabindex='21'></div></div>";
			$("#result_div").html(myhtml);
		} else if (mode != "Account" && mode != "") {
			$("#is_cod").val("Active");
			var myhtml = "<div class='col-md-4' id='cod_div_div'><div class='form-group form-group-default required' id='cod_div'><label>COD/CASH</label><input type='number' class='form-control' name='cod' id='cod' autocomplete='on' tabindex='20'></div></div><div class='col-md-8' id='remark_div_div'><div class='form-group form-group-default' id='remark_div'><label>Description</label><input type='text' class='form-control' name='remark' id='remark' autocomplete='on' tabindex='21'></div></div>";
			$("#result_div").html(myhtml);
		}
	}

	function add_shipment() {
		var check = "Pass";
		var shipment_type = "";
		var order_date = "";
		var order_piece = "";
		var order_weight = "";
		var cod_amount = "";
		var customer_reference_no = "";
		var s_name = "";
		var s_phone = "";
		var s_email = "";
		var s_address = "";
		var c_name = "";
		var c_phone = "";
		var c_email = "";
		var manual_cn = "";
		var d_city = "";
		var o_city = "";
		var c_address = "";
		var remark = "";
		var sp_handling = "";
		var product_detail = "";
		var payment_mode = "";
		var packing_type = "";
		var cash_amount = "";
		var osa = "";
		var pid = "";
		var punt = "";

		//----------Product ID & Detail
		if ($("#product_detail").hasClass("select2-hidden-accessible")) {
			pid = $("#product_detail").val();
			punt = $("#pd_unit").val();
			product_detail = $("#product_detail option:selected").text();			
		} else {
			if ($("#product_detail").val() != "") {
				product_detail = $("#product_detail").val();
				$("#product_detail_div").css("border-color", "rgba(0, 0, 0, 0.07)");
			} else {
				$("#product_detail_div").css("border-color", "red");
				$("#product_detail").focus();
				check = "Fail";
				console.log("Product Detail: " + check);
			}
		}
		//--------------------------------End

		//------------Shipment Type
		if ($('input[name="servicetype"]:checked').val() != "") {
			service_type = $('input[name="servicetype"]:checked').val();
			console.log(service_type);
			$("#servicetype").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#service_type_div").css("border-color", "red");
			$("#servicetype").focus();
			check = "Fail";
			console.log("Service Type: " + check);
		}
		//--------------------------------End
		//------------Order Date-----------
		if ($("#order_date").val() != "") {
			order_date = $("#order_date").val();
			$("#order_date").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#order_date_div").css("border-color", "red");
			$("#order_date").focus();
			check = "Fail";
			console.log("Order Date: " + check);
		}
		//--------------------------------End
		//---------order_weight----
		if ($("#order_weight").val() != "" && $("#order_weight").val() > 0) {
			order_weight = $("#order_weight").val();
			$("#order_weight_div").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#order_weight_div").css("border-color", "red");
			$("#order_weight").focus();
			check = "Fail";
			console.log("Order Weight: " + check);
		}
		//--------------------------------End
		//---------order_piece----
		if ($("#order_piece").val() != "") {
			order_piece = $("#order_piece").val();
			$("#order_piece_div").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#order_piece_div").css("border-color", "red");
			$("#order_piece").focus();
			check = "Fail";
			console.log("Order Piece: " + check);
		}
		//--------------------------------End
		//---------order_osa----
		if ($("#osa").val() != "") {
			osa = $("#osa").val();
			$("#osa_div").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#osa").css("border-color", "red");
			$("#osa").focus();
			check = "Fail";
			console.log("Order OSA: " + check);
		}
		//--------------------------------End
		//---------cod_amount----
		var chk = $("#cod").prop('disabled');
		if (chk == false) {
			if ($("#cod").val() != "") {
				cod_amount = $("#cod").val();
				$("#cod_div_div").css("border-color", "rgba(0, 0, 0, 0.07)");
			} else {
				$("#cod_div_div").css("border-color", "red");
				$("#cod").focus();
				check = "Fail";
				console.log("COD: " + check);
			}
		}
		//--------------------------------End
		//---------cash_amount----
		var chk = $("#cash_sc").prop('disabled');
		if (chk == false) {
			if ($("#cash_sc").val() != "") {
				cash_amount = $("#cash_sc").val();
				$("#cash_div_div").css("border-color", "rgba(0, 0, 0, 0.07)");
			} else {
				$("#cash_div_div").css("border-color", "red");
				$("#cash_sc").focus();
				check = "Fail";
				console.log("Cash: " + check);
			}
		}
		//--------------------------------End

		//---------customer_reference_no----
		customer_reference_no = $("#reference_no").val();
		//--------------------------------End
		//---------customer_Name----
		if ($("#c_name").val() != "") {
			c_name = $("#c_name").val();
			$("#c_name_div").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#c_name_div").css("border-color", "red");
			$("#c_name").focus();
			check = "Fail";
			console.log("C Name: " + check);
		}
		//--------------------------------End
		//---------customer_Phone----
		if ($("#c_phone").val() != "") {
			c_phone = $("#c_phone").val();
			$("#c_phone_div").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#c_phone_div").css("border-color", "red");
			$("#c_phone").focus();
			check = "Fail";
			console.log("C Phone: " + check);
		}
		//--------------------------------End
		//---------customer_Email----
		if ($("#c_email").val() != "") {
			c_email = $("#c_email").val();
			$("#c_email_div").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#c_email_div").css("border-color", "red");
			$("#c_email").focus();
			check = "Fail";
			console.log("C Email: " + check);
		}
		//--------------------------------End
		//---------customer_Cities----
		if ($("#d_city").val() != "") {
			d_city = $("#d_city").val();
			$("#d_city_div").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#d_city_div").css("border-color", "red");
			$("#d_city").focus();
			check = "Fail";
			console.log("Destination: " + check);
		}
		//--------------------------------End
		//---------address----
		if ($("#c_address").val() != "") {
			c_address = $("#c_address").val();
			$("#c_address_div").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#c_address_div").css("border-color", "red");
			$("#c_address").focus();
			check = "Fail";
			console.log("C Address: " + check);
		}
		//--------------------------------End
		//---------shipper_Name----
		if ($("#s_name").val() != "") {
			s_name = $("#s_name").val();
			$("#s_name_div").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#s_name_div").css("border-color", "red");
			$("#s_name").focus();
			check = "Fail";
			console.log("Shipper Name: " + check);
		}
		//--------------------------------End
		//---------shipper_Phone----
		if ($("#s_phone").val() != "") {
			s_phone = $("#s_phone").val();
			$("#s_phone_div").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#s_phone_div").css("border-color", "red");
			$("#s_phone").focus();
			check = "Fail";
			console.log("Shipper Phone: " + check);
		}
		//--------------------------------End
		//---------shipper_Email----
		if ($("#s_email").val() != "") {
			s_email = $("#s_email").val();
			$("#s_email_div").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#s_email_div").css("border-color", "red");
			$("#s_email").focus();
			check = "Fail";
			console.log("Shipper Email: " + check);
		}
		//--------------------------------End
		//---------customer_Cities----
		if ($("#o_city").val() != "") {
			o_city = $("#o_city").val();
			$("#o_city_div").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#o_city_div").css("border-color", "red");
			$("#o_city").focus();
			check = "Fail";
			console.log("Origin: " + check);
		}
		//--------------------------------End
		//---------address----
		if ($("#s_address").val() != "") {
			s_address = $("#s_address").val();
			$("#s_address_div").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#s_address_div").css("border-color", "red");
			$("#s_address").focus();
			check = "Fail";
			console.log("Shipper Address: " + check);
		}
		//--------------------------------End
		//---------Remark----
		if ($("#remark").val() != "") {
			remark = $("#remark").val();
			$("#remark_div").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#remark_div").css("border-color", "red");
			$("#remark").focus();
			check = "Fail";
			console.log("Remarks: " + check);
		}
		//--------------------------------End
		//---------Payment_mode----
		if ($('input[name="paymode"]:checked').val() != "") {
			payment_mode = $('input[name="paymode"]:checked').val();
			$("#paymode").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#pay_mode_div").css("border-color", "red");
			$("#paymode").focus();
			check = "Fail";
			console.log("Pay Mode: " + check);
		}
		//--------------------------------End
		//---------Packing_type--------------
		if ($("#packing_type").val() != "") {
			packing_type = $("#packing_type").val();
			$("#packing_type").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#packing_type_div").css("border-color", "red");
			$("#packing_type").focus();
			check = "Fail";
			console.log("Packing Type: " + check);
		}
		//--------------------------------End
		//---------Recheck Weight--------------
		if ($('input[name="recheckweight"]:checked').val() != "") {
			recheck_weight = $('input[name="recheckweight"]:checked').val();
			$("#recheckweight").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#recheck_weight_div").css("border-color", "red");
			$("#recheckweight").focus();
			check = "Fail";
			console.log("ReCheck Weight: " + check);
		}
		//--------------------------------End
		//---------Manaul_cn--------------
		if ($("#manual_cn").val() != "") {
			manual_cn = $("#manual_cn").val();
			$("#manual_cn").css("border-color", "rgba(0, 0, 0, 0.07)");
		}
		/*else {
			$("#manual_cn_div").css("border-color", "red");
			$("#manual_cn").focus();
			check = "Fail";
			console.log("Manual CN: " + check);
		}*/
		//--------------------------------End
		//---------Customer_id--------------
		if ($("#customer_id").val() != "") {
			customer_id = $("#customer_id").val();
			$("#customer_id").css("border-color", "rgba(0, 0, 0, 0.07)");
		} else {
			$("#customer_id_div").css("border-color", "red");
			$("#customer_id").focus();
			check = "Fail";
			console.log("Customer ID: " + check);
		}
		//--------------------------------End
		//-------Checking Conditions---------
		if (check != "Fail") {
			$("#msg_div").html("<div class='pgn push-on-sidebar-open pgn-bar'><div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button><strong>Please Wait</strong> We Are Getting Up Things For You.</div></div>");
			var mydata = {
				shipment_type: service_type,
				manual_cn: manual_cn,
				order_date: order_date,
				order_piece: order_piece,
				order_weight: order_weight,
				cod_amount: cod_amount,
				order_sc: cash_amount,
				customer_reference_no: customer_reference_no,
				product_detail: product_detail,
				return_shipment: 'No',
				c_name: c_name,
				c_phone: c_phone,
				c_email: c_email,
				s_name: s_name,
				s_phone: s_phone,
				s_email: s_email,
				d_city: d_city,
				recheck_weight: recheck_weight,
				o_city: o_city,
				c_address: c_address,
				s_address: s_address,
				remark: remark,
				sp_handling: 'No',
				payment_mode: payment_mode,
				packing_type: packing_type,
				customer_id: customer_id,
				order_osa: osa,
				prod_id: pid,
				prod_unit: punt
			};
			$.ajax({
				url: "<?php echo base_url(); ?>Booking/Booking/add_shipment",
				type: "POST",
				data: mydata,
				success: function(data) {
					//var objJSON = $.parseJSON(data); 
					//$("#msg_show").html(objJSON.notification);
					$("#msg_div").html(data);

					if (!data.includes("Error")) {
						$("#order_piece").val("1");
						$("#order_weight").val("5.00");
						$("#cod").val("");
						$("#cash_sc").val("");
						$("#reference_no").val("#");
						$("#c_name").val("");
						$("#c_phone").val("");
						$("#d_city").val("").trigger('change');
						$("#manual_cn").val("");
						$("#osa").val("0");
						$("#cash_sc").val("");
						$("#cod").val("");
						$("#c_address").val("");
						$("#remark").val("N/A");
						$("#recheckweight").attr("checked", true).trigger('click');

						if (manual_cn != "") {
							$("#manual_cn").val(parseInt(manual_cn) + 1);
						}

						if ($("#product_detail").hasClass("select2-hidden-accessible")) {
							$("#product_detail").val("").trigger('change');
							$("#pd_unit").val("");
						}

						$("#manual_cn").focus();
					}
				}
			});
		} else {
			alert("Pls fill mentioned fields accordingly.");
		}
	}
</script>

<?php
$this->load->view('inc/footer');
?>