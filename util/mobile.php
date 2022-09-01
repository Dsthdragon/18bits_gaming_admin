<?php

class mobile
{
  function isMobile()
  {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
  }
  
  function header()
  {
      $this->view->render('header');
      echo '<section class="content">';
  }
  
  function adminheader()
  {
      $this->view->render('admin.header');
      echo '<section class="content">';
  }
  
  function footer()
  {
      echo '</section>';
      $this->view->render('footer');
  }
     
}
