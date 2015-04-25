<? $this->load->view('includes/header');?>
<body>
  <body background="<?=base_url('assets/img/asrama2.jpg'); ?>" background-repeat: no-repeat>

<div style= "margin-left:60px; margin-top:150px; ">
<div class="container" >
  <form class="form-signin" role="form" action="<?=site_url('login/loginCheck'); ?>" method="post" accept-charset="utf-8">
    <h2 class="form-signin-heading">Please Input Your Login Credential</h2>
    <input class="form-control" name="email" placeholder="Email" required maxlength="40" autofocus>
    <input class="form-control" type="password" name="pwd" placeholder="Password" required maxlength="20" />
    <label class="checkbox">
      <input value="remember-me" type="checkbox"> Remember me
    </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Signin</button>
      <a href="<?=site_url('signUp'); ?>" class="btn btn-lg btn-info btn-block"><i class="icon-arrow-right icon-white"></i>SignUp Now</a>

    <? if (isset($error)): ?>
      <div class="row">

      <div class="alert alert-error">
        <strong>Login</strong> failed!.
      </div>

      </div>
      </form>
      <? endif; ?>

</div>
</div>
</body>
</html>


<!--Pulling Awesome Font -->
