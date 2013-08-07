<?php defined( '_JEXEC' ) or die; 

include_once JPATH_THEMES.'/'.$this->template.'/logic.php'; // load logic.php

$display_content =  array( // Declare order for content module positions
  'content-header'  => array('type' => 'modules', 'style' => 'showTitle', 'show' => $this->countModules('content-header')),
  'component'       => array('type' => 'component', 'show' => $menu->getActive() !== $menu->getDefault()),
  'sidebar-1'       => array('type' => 'modules', 'style' => false, 'show' => $this->countModules('sidebar-1')),
  'main-1'          => array('type' => 'modules', 'style' => 'showTitle', 'show' => $this->countModules('main-1')),
  'sidebar-2'       => array('type' => 'modules', 'style' => 'showTitle', 'show' => $this->countModules('sidebar-2')),
  'main-2'          => array('type' => 'modules', 'style' => 'showTitle', 'show' => $this->countModules('main-2')),
  'sidebar-3'       => array('type' => 'modules', 'style' => 'showTitle', 'show' => $this->countModules('sidebar-3')),
  'main-3'          => array('type' => 'modules', 'style' => 'showTitle', 'show' => $this->countModules('main-3')),
  'sidebar-4'       => array('type' => 'modules', 'style' => 'showTitle', 'show' => $this->countModules('sidebar-4')),
  'content-footer'  => array('type' => 'modules', 'style' => 'showTitle', 'show' => $this->countModules('content-footer'))
  );
   
?><!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/images/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/images/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/images/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $tpath; ?>/images/apple-touch-icon-144x144-precomposed.png">
  
  <!--[if lte IE 8]>
    <link rel="stylesheet" href="<?php echo $tpath; ?>/sass/stylesheets/ie9lt.css">
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <?php if ($pie==1) : ?>
      <style> 
        {behavior:url(<?php echo $tpath; ?>/js/PIE.htc);}
      </style>
    <?php endif; ?>
  <![endif]-->
</head>
  
<body class="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('page')).' '.$active->alias.' '.$pageclass; ?>">
  
  <header class="site-header">
    <div class="container">
      <h1 class="logo">
      <?php if ($logo): ?>
        <img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>"  alt="<?php echo htmlspecialchars($title);?>" />
      <?php endif;?>
      <?php if (!$logo): ?>
        <?php echo htmlspecialchars($title);?>
      <?php endif; ?>
        <p class="">
          <?php echo htmlspecialchars($tagline);?>
        </p>
      </h1>
    </div>
  </header>

  <div class="container">

    <div class="site-nav">
      <jdoc:include type="modules" name="nav-position" style="showDescription" />
    </div>

    <div class="content">
    <?php foreach ($display_content as $position => $attr_array)
    {
      if ($attr_array['show'])
      {
        echo '<div class="'.$position.'"><jdoc:include type="'.$attr_array['type'].'"';
          if ($attr_array['type'] === 'modules')
          {
            echo ' name="'.$position.'"';
            if ($attr_array['style'])
            {
              echo ' style="'.$attr_array['style'].'"';
            }
          }
        echo ' /></div>';
      }
    }
    ?></div>

  </div>

  <footer class="site-footer">
    <div class="container">
      <jdoc:include type="modules" name="footer-0" style="showTitle" />
      <jdoc:include type="modules" name="footer-1" style="showTitle" />
      <jdoc:include type="modules" name="footer-2" style="showTitle" />
      <jdoc:include type="modules" name="footer-3" style="showTitle" />
    </div>
  </footer>

  <jdoc:include type="modules" name="debug" />
</body>

</html>

