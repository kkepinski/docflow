<?php
namespace DocFlow\Application;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\PriceCalculator\BlackWhitePriceCalculator;
use DocFlow\Domain\User\User;
use DocFlow\Infrastructure\DocumentRepository;
use DocFlow\Infrastructure\UserRepository;
use DocFlow\NumberGenerator\ISONumberGenerator;
use Ramsey\Uuid\Uuid;

class DocumentFlowProcess
{

    /**
     *
     * @var UserRepository
     */
    private $userRepository;

    /**
     *
     * @var \DocFlow\Infrastructure\DocumentRepository
     */
    private $documentRepository;

    /**
     * DocumentFlowProcess constructor.
     *
     * @param UserRepository $userRepository            
     * @param DocumentRepository $documentRepository            
     */
    public function __construct(UserRepository $userRepository, DocumentRepository $documentRepository)
    {
        $this->userRepository = $userRepository;
        $this->documentRepository = $documentRepository;
    }

    public function createDocument(Uuid $authorId, DocumentType $type, $title)
    {
        $user = $this->userRepository->load($authorId);
        
        if (! $user instanceof User) {
            throw new \Exception('...');
        }
        
        $document = new Document($type, $user, new \DocFlow\Domain\NumberGenerator\ISONumberGenerator(), 100);
        
        $document->changeTitle($title);
        
        $this->documentRepository->save($document);
        
        return $document->getNumber();
    }

    public function change(DocumentNumber $documentNumber, $documentTitle)
    {
        if (! $documentNumber instanceof DocumentNumber) {
            throw new \Exception('...');
        }
        $document = $this->documentRepository->load($documentNumber);
        $document->changeTitle($documentTitle);
        $this->documentRepository->save($document);
    }

    public function publishDocument(DocumentNumber $documentNumber)
    {
        if (! $documentNumber instanceof DocumentNumber) {
            throw new \Exception('...');
        }
        $priceCalc = new BlackWhitePriceCalculator();
        $document = $this->documentRepository->load($documentNumber);
        $document->publish($priceCalc);
    }
}