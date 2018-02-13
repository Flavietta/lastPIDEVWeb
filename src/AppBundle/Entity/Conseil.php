<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conseil
 *
 * @ORM\Table(name="conseil", indexes={@ORM\Index(name="categ", columns={"categ"})})
 * @ORM\Entity
 */
class Conseil
{
    /**
     * @var int
     *
     * @ORM\Column(name="refc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $refc;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categ", referencedColumnName="id")
     * })
     */
    private $categ;


}
