<?php

namespace App\Entity;

use App\Repository\ListeGlobaleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListeGlobaleRepository::class)
 */
class ListeGlobale
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=Liste::class, mappedBy="listeParent", orphanRemoval=true)
     */
    private $sousListes;

    public function __construct()
    {
        $this->sousListes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Liste[]
     */
    public function getSousListes(): Collection
    {
        return $this->sousListes;
    }

    public function addSousListe(Liste $sousListe): self
    {
        if (!$this->sousListes->contains($sousListe)) {
            $this->sousListes[] = $sousListe;
            $sousListe->setListeParent($this);
        }

        return $this;
    }

    public function removeSousListe(Liste $sousListe): self
    {
        if ($this->sousListes->removeElement($sousListe)) {
            // set the owning side to null (unless already changed)
            if ($sousListe->getListeParent() === $this) {
                $sousListe->setListeParent(null);
            }
        }

        return $this;
    }
}
