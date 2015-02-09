<div class="login-form-container">
  <form action="<?php echo base_url();?>login/login_process" method="POST" id="login-form">
    <span class="payment-errors"></span>
    <div class="form-row">
      <label>
        <span>Username</span>
        <input id="username" type="text" size="20" name="username"/>
      </label>
    </div>


    <div class="form-row">
      <label>
        <span>Password</span>
        <input id="password" type="text" size="20" name="password"/>
      </label>
    </div>
    <div class="msg">
      <p><?php echo $msg?></p>
    </div>

    <button id="login-form-submit" type="submit">Login
    </button>
    <div class="hash">
    
    </div>
  </form>
  <h1>Create Username</h1>
  <form action="<?php echo base_url();?>login/create_login" method="POST" id="create-login-form">
    <span class="payment-errors"></span>
    <div class="form-row">
      <label>
        <span>Username</span>
        <input id="username" type="text" size="20" name="username"/>
      </label>
    </div>


    <div class="form-row">
      <label>
        <span>Password</span>
        <input id="password" type="text" size="20" name="password"/>
      </label>
    </div>

    <button type="submit">Create
    </button>
  </form>
</div>

<script>
  $('#login-form').submit(validate_fields);
  var hello123 = "hellooooo aagaaaain";
  console.log(hello123);

  function validate_fields(){
    
    if($('#username').val() == '' || $('#password').val() == '') {
      $('#login-form-submit').html( "<p>Fill in all Fields</p>" );
      $('#login-form-submit').css('background-color','red');
      return false;
      error = true;
    }
  }

</script>