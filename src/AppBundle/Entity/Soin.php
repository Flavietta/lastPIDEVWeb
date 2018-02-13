<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soin
 *
 * @ORM\Table(name="soin", indexes={@ORM\Index(name="categS", columns={"categ"})})
 * @ORM\Entity
 */
class Soin
{
    /**
     * @var string
     *
     * @ORM\Column(name="refs", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $refs;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="symptome", type="string", length=500, nullable=false)
     */
    private $symptome;

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
