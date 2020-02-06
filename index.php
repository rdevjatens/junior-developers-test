<?php

include 'includes/Autoloader.php';
include 'includes/config.php';
spl_autoload_register('AutoLoader::classLoader');
spl_autoload_register('AutoLoader::controllersLoader');
spl_autoload_register('AutoLoader::interfacesLoader');
spl_autoload_register('AutoLoader::modelsLoader');
spl_autoload_register('AutoLoader::viewsLoader');

require config('template_path') . '/template.php';
