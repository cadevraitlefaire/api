<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Houziaux mike : jenaye
 * Email : jenaye@protonmail.com
 * Date: 25/06/2020
 * Time: 21.29
 */

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use AppBundle\Entity\Document;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * School
 *
 * @ApiResource(attributes={"normalization_context"={"groups"={"Subject"}}})
 * @ORM\Table(name="school")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubjectRepository")
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
     * @ORM\OneToMany(targetEntity=Document::class)
     * @ORM\JoinColumn(nullable=true)
     * @ApiProperty(iri="http://schema.org/image")
     */
    public $file;

    public function __construct()
    {
        return $this->file = new ArrayCollection();
    }

    /**
     * @return \AppBundle\Entity\File|null
     */
    public function getFile(): ?\AppBundle\Entity\File
    {
        return $this->file;
    }

    /**
     * @param \AppBundle\Entity\File|null $file
     */
    public function setFile(?\AppBundle\Entity\File $file): void
    {
        $this->file = $file;
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
