<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="categP", columns={"categ"})})
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var string
     *
     * @ORM\Column(name="refp", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $refp;

    /**
     * @var string
     *
     * @ORM\Column(name="nomp", type="string", length=255, nullable=false)
     */
    private $nomp;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

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
