<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "home";
$route['404_override'] = '';
$route['sitemap.xml'] = "sitemap";
$route['ciudad/(:any)'] = "home/index/ciudad/$1";
$route['pais/(:any)'] = "home/index/pais/$1";
$route['canal/(:any)'] = "home/index/canal/$1";
$route['rss'] = "sitemap/rssfeed";
$route['video/(:any)'] = "home/video/$1";
$route['search/(:any)'] = "home/index/search/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */