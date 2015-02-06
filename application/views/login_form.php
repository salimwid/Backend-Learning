<div class="login-form-container">
  <form action="<?php echo base_url();?>login/login_process" method="POST" id="payment-form">
    <span class="payment-errors"></span>
    <div class="form-row">
      <label>
        <span>Username</span>
        <input type="text" size="20" name="username"/>
      </label>
    </div>


    <div class="form-row">
      <label>
        <span>Password</span>
        <input type="text" size="20" name="password"/>
      </label>
    </div>

    <button type="submit">Login
    </button>
  </form>
</div>
<script type="text/javascript">
</script>