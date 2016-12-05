<?php

namespace DocFlow\Domain\Document;

use Esky\Enum\Enum;

class DocumentStatus extends Enum
{
    const DRAFT = 1;
    const VERIFIED = 2;
    const PUBLISHED = 3;
    const ARCHIVED = 4;

    protected static $names = array (
        self::DRAFT => 'Draft',
        self::VERIFIED => 'Verified',
        self::PUBLISHED => 'Published',
        self::ARCHIVED => 'Archived'
    );

}
