<?php
namespace Ualnaji\DataDesign;

require_once(dirname(__DIR__). "/classes/autoload.php");
//require_once(dirname(__DIR__ ). "/vendor/autoload.php");

//use Ramsey\Uuid\Uuid;
//use Ualnaji\DataDesign\Author;


$hash = password_hash("password", PASSWORD_ARGON2I, ["time_cost" => 7]);
var_dump($hash);

$newAuthor = new Author ("40a2540a-d711-44f5-a3d3-008593054e77", "12345678123456781234567812345678", "newauthorurl.com", "newauthor@gmail.com", $hash,"New Author 1");

//echo ($newAuthor->getAuthorId());

echo ($newAuthor-> getAuthorId()),($newAuthor-> getAuthorActivationToken()),($newAuthor-> getAuthorAvatarUrl()),($newAuthor-> getAuthorEmail()),($newAuthor-> getAuthorHash()),($newAuthor-> getAuthorUsername());
var_dump($newAuthor);