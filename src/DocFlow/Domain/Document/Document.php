<?php
namespace DocFlow\Domain\Document;

use DocFlow\Domain\User\User;
use DocFlow\Domain\NumberGenerator;
use DocFlow\Domain\PriceCalculator;
use DocFlow\Domain\Money;

class Document
{

    private $number;

    /**
     *
     * @var DocumentType
     */
    private $type;

    /**
     *
     * @var DocumentStatus
     */
    private $status;

    /**
     *
     * @var User
     */
    private $author;

    private $title;

    private $sitesNumber;

    private $cost;

    /**
     * Document constructor.
     *
     * @param DocumentType $type            
     * @param User $user            
     */
    public function __construct(DocumentType $type, User $author, NumberGenerator $numberGen, $sitesNumber)
    {
        
        $this->number = $numberGen->generateNumber($type);

        $this->type = $type;
        $this->sitesNumber = $sitesNumber;
        $this->status = new DocumentStatus( DocumentStatus::DRAFT );
        $this->author = $author;
    }

    /**
     *
     * @return DocumentNumber
     */
    public function getNumber() 
    {

        return $this->number;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus( $status ) {

        $this->status = new DocumentStatus( $status );
    }

    public function getSitesNumber()
    {
        return $this->sitesNumber;
    }

    /**
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     *
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    public function changeTitle($title)
    {
        $this->title = $title;
    }

    public function verify()
    {}

    public function publish(PriceCalculator $calc)
    {
        $this->setStatus( DocumentStatus::PUBLISHED );
        $price = new Money\PLNMoney( 100 );
        $this->cost = $calc->calculate($this, $price);

        return $this->cost;
    }

    public function archive()
    {}
}





