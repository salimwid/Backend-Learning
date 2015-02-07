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

    <button type="submit">Login
    </button>
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
