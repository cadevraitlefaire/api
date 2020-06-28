<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Houziaux mike : jenaye
 * Email : jenaye@protonmail.com
 * Date: 25/06/2020
 * Time: 21.29
 */

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * School
 * @ApiResource()
 * @ORM\Entity
 */
class Subject
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=12)
     */
    protected $name;




    /**
     * @var MediaObject|null
     *
     * @ORM\OneToMany(targetEntity=Document::class, mappedBy="subject")
     * @ORM\JoinColumn(nullable=true)
     * @ApiProperty(iri="http://schema.org/image")
     */
    public $document;

    /**
     * @ORM\ManyToOne(targetEntity=School::class, inversedBy="subject")
     */
    private $school;

    public function __construct()
    {
        return $this->document = new ArrayCollection();
    }

    /**
     * @return \AppBundle\Entity\Document|null
     */
    public function getDocument(): ?\AppBundle\Entity\Document
    {
        return $this->document;
    }

    /**
     * @param \AppBundle\Entity\Document|null $document
     */
    public function setDocument(?\AppBundle\Entity\Document $document): void
    {
        $this->document = $document;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSchool(): ?School
    {
        return $this->school;
    }

    public function setSchool(?School $school): self
    {
        $this->school = $school;

        return $this;
    }

}
