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
 * @ApiResource(attributes={"normalization_context"={"groups"={"Subject"}}})
 * @ORM\Entity
 */
class Subject
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"Subject"})
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=12)
     * @Groups({"Subject"})
     */
    protected $name;

    /**
     * @var MediaObject|null
     *
     * @ORM\ManyToOne(targetEntity=School::class)
     * @ApiProperty(iri="http://schema.org/image")
     * @Groups({"Subject"})
     */
    public $school;

    /**
     * @return MediaObject|null
     */
    public function getSchool(): ?MediaObject
    {
        return $this->school;
    }

    /**
     * @param MediaObject|null $school
     */
    public function setSchool(?MediaObject $school): void
    {
        $this->school = $school;
    }


    /**
     * @var MediaObject|null
     *
     * @ORM\OneToMany(targetEntity=Document::class, mappedBy="subject")
     * @ORM\JoinColumn(nullable=true)
     * @ApiProperty(iri="http://schema.org/image")
     * @Groups({"Subject"})
     */
    public $document;

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

}
