<?php
$basePath = dirname(__dir__) . DIRECTORY_SEPARATOR; // /var/www/

require_once $basePath . 'vendor/autoload.php';

$app = App\App::getInstance();
$app->setStartTime();
$app::load();

$app->getRouter($basePath)
    //route blog
    ->get('/blog', 'Post#all', 'blog')
    ->get('/categories', 'Category#all', 'categories')
    ->get('/category/[*:slug]-[i:id]', 'Category#show', 'category')
    ->get('/article/[*:slug]-[i:id]', 'post#show', 'post')

    //Route site biere
    ->get('/beer', 'Beer#show', 'beer')
    ->get('/', 'Home#index', 'home')
    ->get('/commande', 'Beer#order', 'commmande')
    ->get('/login', 'Users#login', 'login')
    ->post('/login', 'Users#login', 'login_post')
    ->get('/deconnexion', 'Users#deconnexion', 'deconnexion')
    ->get('/inscription', 'Users#inscription', 'inscription')
    ->post('/inscription', 'Users#inscription', 'inscription_post')
    ->get('/profil', 'Users#profil', 'profil')
    ->post('/profil', 'Users#profil', 'profilForm')
    ->run();
