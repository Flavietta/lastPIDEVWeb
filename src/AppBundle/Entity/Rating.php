<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating", indexes={@ORM\Index(name="rec_rate", columns={"id_reco"})})
 * @ORM\Entity
 */
class Rating
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="rate", type="integer", nullable=false)
     */
    private $rate;

    /**
     * @var \Recommendation
     *
     * @ORM\ManyToOne(targetEntity="Recommendation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_reco", referencedColumnName="id")
     * })
     */
    private $idReco;


}
