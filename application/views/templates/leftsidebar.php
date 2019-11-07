
<section>

  <aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
      <div class="image">
        <img src="<?= base_url()?>assets/images/user.png" width="48" height="48" alt="User" />
      </div>
      <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$this->session->userdata('email')?></div>
        <div class="email"><?=$this->session->userdata('name').' '.$this->session->userdata('last_name') ?></div>
        <div class="btn-group user-helper-dropdown">
          <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
          <ul class="dropdown-menu pull-right">
            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>

            <li role="separator" class="divider"></li>
            <li><a href="<?=base_url().'Login/logout'?>"><i class="material-icons">input</i>Sign Out</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
      <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?=base_url('Dashboard')?>">
            <i class="material-icons">home</i>
            <span>Home</span>
          </a>
        </li>
          <li class="<?= ($this->uri->segment(1)=='Schools' || $this->uri->segment(1)=='Courses')?'active':''?>">
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">build</i>
              <span>Manage Masters</span>
            </a>
            <ul class="ml-menu">
              <li class="<?= ($this->uri->segment(1)=='Schools')?'active':''?>">
                <a href="<?= base_url('Schools')?>">
                  
                  <span>Schools</span>
                </a>
              </li>
              <li class="<?= ($this->uri->segment(1)=='Courses')?'active':''?>">
                <a href="<?= base_url('Courses')?>">
                  
                  <span>Courses</span>
                </a>
              </li>
              
            </ul>
          </li>
     
          
      </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
      <div class="copyright">
        &copy; 2019 - 2020 <a href="javascript:void(0);">test -</a>.
      </div>
      <div class="version">
        <b>Version: </b> 1.0
      </div>
    </div>
    <!-- #Footer -->
  </aside>

