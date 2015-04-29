<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?=site_url('site'); ?>"><span class="glyphicon glyphicon-home"></span></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-cog"></span>  <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" roles="menu">
                                <li><small class="navbar-text">
                    <?=anchor('admin', $this->session->userdata('email')); ?> 
                </small></li>
                                <li><a href="<?=site_url('login/logout'); ?>">Logout</a></li>
                            </ul>
                        </li>
                    
                </ul>
            </div>
          </div>
    </div>