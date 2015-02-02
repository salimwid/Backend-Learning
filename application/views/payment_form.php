<div class="payment-form-test col-md-4 col-md-offset-4" style="margin-top: 50px">
	<form action="" method="POST" id="payment-form" class="payment-form-test form-horizontal" style="margin-bottom: 15px">
		<div class="form-header">
			<h3> Payment Form Trial </h3>
		</div>
		<legend> Card Details </legend>
		<div class="form-group">
			<label class="col-sm-5"> Cardholder's Name </label>
			<div class="col-sm-7"><input class="cc-name form-control fields" type="text" name="cc-number" placeholder="Input Name Here"> </div>
		</div>
		<div class="form-group">
			<label class="col-sm-5"> Credit Card Number </label>
			<div class="col-sm-7"><input class="cc-number form-control fields" type="text" name="cc-number" placeholder="Card Number Here"> </div>
		</div>
		<div class="form-group">
			<label class="col-sm-5"> Expiry Date </label>
			<div class="col-sm-7"><input class="expiry-date form-control fields" type="text" name="cc-number" placeholder="Last Name Here"> </div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-5"> CVV1/CVV2 </label>
			<div class="col-sm-3"><input class="cvv-number form-control fields" type="text" name="cc-number" placeholder="XXX"> </div>
		</div>
		<legend> Billing Details </legend>
		<div class="form-group">
			<label class="col-sm-5"> First Name </label>
			<div class="col-sm-7"><input class="first-name form-control fields" type="text" name="cc-number" placeholder="First Name Here"> </div>
		</div>
		<div class="form-group">
			<label class="col-sm-5"> Last Name </label>
			<div class="col-sm-7"><input class="last-name form-control fields" type="text" name="cc-number" placeholder="Last Name Here"> </div>
		</div>
		<div class="form-group">
			<label class="col-sm-5"> Address </label>
			<div class="col-sm-7"><input class="address form-control fields" type="text" name="cc-number" placeholder="Insert Address Here"> </div>
		</div>
		<div class="form-group">
			<label class="col-sm-5"> Country </label>
			<input class="country col-sm-7 fields" type="text" name="cc-number" placeholder="Insert Card Number Here">
		</div>
		<div class="form-group">
			<label class="col-sm-5"> State </label>
			<div class="col-sm-7"><input class="state form-control fields" type="text" name="cc-number" placeholder="Insert State Here"> </div>
		</div>
		<div class="form-group">
			<label class="col-sm-5"> City </label>
			<div class="col-sm-7"><input class="city form-control fields" type="text" name="cc-number" placeholder="Insert City Here"> </div>
		</div>
		<div class="form-group">
			<label class="col-sm-5"> Postal Code </label>
			<div class="col-sm-4"><input class="postal form-control fields" type="text" name="cc-number" placeholder="XXX XXX"> </div>
		</div>
		<button id="post-form-btn" class="btn btn-default" type="submit"> Submit Now </button>
	</form>
</div>
<script type="text/javascript">
  // This identifies your website in the createToken call below
  Stripe.setPublishableKey('pk_test_6pRNASCoBOKtIshFeQd4XMUh');
</script>
