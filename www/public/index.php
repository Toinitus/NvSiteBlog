<?php
$basePath = dirname(__dir__) . DIRECTORY_SEPARATOR; // /var/www/

require_once $basePath . 'vendor/autoload.php';

$app = App\App::getInstance();
$app->setStartTime();
$app::load();

$app->getRouter($basePath)
    ->get('/', 'Home#index', 'home')
    ->get('/boutique', 'Boutique#show', 'boutique')
    ->get('/commande', 'Boutique#order', 'commmande')
    ->get('/login', 'Users#login', 'login')
    ->get('/deconnexion', 'Users#deconnexion', 'deconnexion')
    ->get('/inscription', 'Users#inscription', 'inscription')
    ->get('/profil', 'Users#profil', 'profil')
    ->get('/blog', 'Post#all', 'blog')
    ->get('/categories', 'Category#all', 'categories')
    ->get('/category/[*:slug]-[i:id]', 'Category#show', 'category')
    ->get('/article/[*:slug]-[i:id]', 'post#show', 'post')
    ->get('', '', '')
    ->run();
