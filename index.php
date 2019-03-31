<?php
/**
 * Created by PhpStorm.
 * User: julbel
 * Date: 29.03.19
 * Time: 9:53
 */

use App\Pagination\Builder;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

require_once 'vendor/autoload.php';

$config = new Configuration();

$connection = DriverManager::getConnection([
    'dbname' => 'db_pagination',
    'user' => 'root',
    'password' => '12345',
    'host' => '127.0.0.1',
    'driver' => 'pdo_mysql'
]);

$queryBuilder = $connection->createQueryBuilder();
$queryBuilder->select('*')->from('users');

//dump($queryBuilder->execute()->fetchAll());

$builder = new Builder($queryBuilder);

$users = $builder->paginate( $_GET['page'] ?: 1, 10);

//dump($users->get());

echo $users->render();