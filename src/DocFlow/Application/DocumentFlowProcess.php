<?php
namespace DocFlow\Application;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\PriceCalculator\BlackWhitePriceCalculator;
use DocFlow\Domain\User\User;
use DocFlow\Infrastructure\DocumentRepository;
use DocFlow\Infrastructure\UserRepository;
use DocFlow\Domain\NumberGenerator\ISONumberGenerator;
use Ramsey\Uuid\Uuid;

class DocumentFlowProcess
{

    const DEFAULT_SITES_NUMBER = 100;

    /**
     *
     * @var UserRepository
     */
    private $userRepository;

    /**
     *
     * @var DocumentRepository
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
            throw new \Exception('Wrong instance of User');
        }
        
        $document = new Document( $type, $user, new ISONumberGenerator(), self::DEFAULT_SITES_NUMBER );
        $document->setTitle( $title );
        $this->documentRepository->save( $document );
        
        return $document->getNumber();
    }

    public function change(DocumentNumber $documentNumber, string $documentTitle)
    {
        if (! $documentNumber instanceof DocumentNumber) {
            throw new \Exception('Wrong Document Number');
        }

        $document = $this->documentRepository->load($documentNumber);
        $document->setTitle($documentTitle);
        $this->documentRepository->save($document);
    }

    public function publishDocument(DocumentNumber $documentNumber)
    {
        if (! $documentNumber instanceof DocumentNumber) {
            throw new \Exception('Wrong Document Number');
        }

        $priceCalc = new BlackWhitePriceCalculator();
        $document = $this->documentRepository->load($documentNumber);
        $document->publish($priceCalc);
    }
}