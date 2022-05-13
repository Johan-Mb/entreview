<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    private $presskit;

    #[ORM\ManyToOne(targetEntity: Event::class, inversedBy: 'Artist')]
    private $event;

    #[ORM\ManyToMany(targetEntity: Place::class, inversedBy: 'artists')]
    private $Place;

    #[ORM\ManyToMany(targetEntity: Interview::class, mappedBy: 'artist_id')]
    private $interviews;

    public function __construct()
    {
        $this->interviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPresskit(): ?string
    {
        return $this->presskit;
    }

    public function setPresskit(string $presskit): self
    {
        $this->presskit = $presskit;

        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }

    /**
     * @return Collection<int, Place>
     */
    public function getPlace(): Collection
    {
        return $this->Place;
    }

    public function addPlace(Place $place): self
    {
        if (!$this->Place->contains($place)) {
            $this->Place[] = $place;
        }

        return $this;
    }

    public function removePlace(Place $place): self
    {
        $this->Place->removeElement($place);

        return $this;
    }

    /**
     * @return Collection<int, Interview>
     */
    public function getInterviews(): Collection
    {
        return $this->interviews;
    }

    public function addInterview(Interview $interview): self
    {
        if (!$this->interviews->contains($interview)) {
            $this->interviews[] = $interview;
            $interview->addArtistId($this);
        }

        return $this;
    }

    public function removeInterview(Interview $interview): self
    {
        if ($this->interviews->removeElement($interview)) {
            $interview->removeArtistId($this);
        }

        return $this;
    }
}
