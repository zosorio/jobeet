<?php

require_once __DIR__ .'/../lib/vendor/autoload.php';
require_once __DIR__.'/../lib/vendor/friendsofsymfony1/symfony1/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins(['sfDoctrinePlugin','sfDoctrineGuardPlugin']);
  }
}
