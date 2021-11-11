<?php

namespace App\Entity;

use App\Repository\ListeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListeRepository::class)
 */
class Liste
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
     * @ORM\OneToMany(targetEntity=ListeContent::class, mappedBy="content")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=ListeGlobale::class, inversedBy="sousListes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $listeParent;

    public function __construct()
    {
        $this->content = new ArrayCollection();
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
     * @return Collection|ListeContent[]
     */
    public function getContent(): Collection
    {
        return $this->content;
    }

    public function addContent(ListeContent $content): self
    {
        if (!$this->content->contains($content)) {
            $this->content[] = $content;
            $content->setContent($this);
        }

        return $this;
    }

    public function removeContent(ListeContent $content): self
    {
        if ($this->content->removeElement($content)) {
            // set the owning side to null (unless already changed)
            if ($content->getContent() === $this) {
                $content->setContent(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getListeParent(): ?ListeGlobale
    {
        return $this->listeParent;
    }

    public function setListeParent(?ListeGlobale $listeParent): self
    {
        $this->listeParent = $listeParent;

        return $this;
    }
}
