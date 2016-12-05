<?php
use \Ramsey\Uuid\Uuid;
use DocFlow\Application\DocumentFlowProcess;
use DocFlow\Domain\Document\DocumentType;
use Gaufrette\Adapter\Local as LocalAdapter;
use Gaufrette\Filesystem;

require 'vendor/autoload.php';

$filesystem = new Filesystem(new LocalAdapter('./var/'));
$UserRepository = new \DocFlow\Infrastructure\UserRepository\FileRepository($filesystem, 'users.data');
$DocumentRepository = new DocFlow\Infrastructure\DocumentRepository\InMemoryRepository();

$docFlow = new DocumentFlowProcess($UserRepository, $DocumentRepository);

$documentNumber = $docFlow->createDocument(Uuid::fromString('305e7fe7-ea10-4a91-a3e5-2ab7351290d6'), DocumentType::PROCEDURE_BOOK(), 'przykładowy dokument', 100);

$document = $DocumentRepository->load($documentNumber);

var_dump('status1:');
var_dump($document->getStatus()->getName());

$docFlow->change($documentNumber, 'nowy super title');
$docFlow->publishDocument($documentNumber);

var_dump('status2:');
var_dump($document->getStatus()->getName());

exit();


