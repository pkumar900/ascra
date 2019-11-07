<?php

$config = array(
  'login' => array(
          array(
                  'field' => 'username',
                  'label' => 'Username',
                  'rules' => 'trim|required|valid_email'
          ),
          array(
                  'field' => 'password',
                  'label' => 'Password',
                  'rules' => 'required'
          ),
          
  ),
  'school' => array(
          array(
                  'field' => 'name',
                  'label' => 'Name',
                  'rules' => 'trim|required'
          ),
          
        ),
  'course' => array(
    array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required'
    ),
    
)
);
$config['error_prefix'] = '<div class="error">';
$config['error_suffix'] = '</div>';

?>