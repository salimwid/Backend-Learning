<h1>Charge $10 with Stripe</h1>

<form action="controller/template_test/payment_stripe" method="POST" id="payment-form">
<span class="payment-errors"></span>

<div class="form-row">
  <label>
    <span>Card Number</span>
    <input type="text" size="20" data-stripe="number"/>
  </label>
</div>

<div class="form-row">
  <label>
    <span>CVC</span>
    <input type="text" size="4" data-stripe="cvc"/>
  </label>
</div>

<div class="form-row">
  <label>
    <span>Expiration (MM/YYYY)</span>
    <input type="text" size="2" data-stripe="exp-month"/>
  </label>
  <span> / </span>
  <input type="text" size="4" data-stripe="exp-year"/>
</div>

<button type="submit">Submit Payment
</button>
</form>

<script type="text/javascript">
// This identifies your website in the createToken call below
Stripe.setPublishableKey('pk_test_Oj0HPN40E7geCxeyQxzA5o76');

$(document).ready(function(){
  $('#payment-form').submit(function() {
    var $form = $(this);
    // Disable the submit button to prevent repeated clicks
    $form.find('button').prop('disabled', true);

    Stripe.card.createToken($form, stripeResponseHandler);

    // Prevent the form from submitting with the default action
    return false;
  });

  function stripeResponseHandler(status, response) {
    var $form = $('#payment-form');

    if (response.error) {
      // Show the errors on the form
      $form.find('.payment-errors').text(response.error.message);
      $form.find('button').prop('disabled', false);
    }

    else {
      // token contains id, last4, and card type
      var token = response.id;
      console.log(token);
      // Insert the token into the form so it gets submitted to the server
      $form.append($('<input type="hidden" name="stripeToken" />').val(token));
      // and re-submit
      $form.submit();
    }
  };

  function ajax_submit () {
    $form = $(this);
    $btn = $form.find('button');
    $.ajax({
        url:$form.attr('action'),
        type:$form.attr('method'),
        data:$form.serialize(),
        console.log(jsonEncode(data));
        success:function(data){
          $response = $.parseJSON(data);
          if ($response.status == 200) {
              $btn.html($response.alert);
              $btn.prop('disabled',false);
              $('.fields').val('');
            }
          else {
              $btn.html($response.alert);
              $btn.prop('disabled',false);
          }
          console.log(data);
        },
        error:function(data){
            console.log(data);
            $btn.html('Error');
            $btn.prop('disabled',false);
        }
      });
  }
});
</script>