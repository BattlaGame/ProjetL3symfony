<?php namespace App\Entity;

use Symfony\Component\HttpFoundation\File\File;

class Author
{
    protected $headshot;

    public function setHeadshot(File $file = null)
    {
        $this->headshot = $file;
    }

    public function getHeadshot()
    {
        return $this->headshot;
    }
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('headshot', new Assert\Image([
            'minWidth' => 200,
            'maxWidth' => 400,
            'minHeight' => 200,
            'maxHeight' => 400,
        ]));
    }
    
    }
    