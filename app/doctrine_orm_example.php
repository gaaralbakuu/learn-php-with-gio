<?php
use App\Entity\User;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$params = [
    'host'      => $_ENV["DB_HOST"],
    'user'      => $_ENV["DB_USER"],
    'password'  => $_ENV["DB_PASS"],
    'dbname'    => $_ENV["DB_DATABASE"],
    'driver'    => $_ENV["DB_DRIVER"] ?? 'pdo_mysql'
];

var_dump($params);

$entityManager = new EntityManager(
    DriverManager::getConnection($params),
    Setup::createAttributeMetadataConfiguration([__DIR__.'/Entity'])
);


$username = "phamminhdat";
$salt = md5(time());
$password = md5($salt . "123456" . $salt);
// $name = "Phạm Minh Đạt";
// $gender = 0;

$user = (new User())
    ->setUsername($username)
    ->setPassword($password)
    ->setSalt($salt);

$entityManager->persist($user);
$entityManager->flush();

var_dump($user);