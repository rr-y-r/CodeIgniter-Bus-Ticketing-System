<html>
<head>
    <title>login </title>
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/extracss.css">
</head>
<body>
  <body background="asrama.jpg" background-repeat: no-repeat>

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
        <div class="span4">
          <div class="alert alert-error">
            <strong>Login</strong> failed!.
          </div>
        </div>
      </div>
      </form>
      <? endif; ?>
            <a href="<?=site_url('admin'); ?>" class="btn btn-danger btn-xs" style="position:fixed; bottom:0; left:0;" >
                <i class="icon-flag icon-white"></i> Admin</a>
</div>
</div>
</body>
</html>


<!--Pulling Awesome Font -->
