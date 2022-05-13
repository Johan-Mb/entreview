<?php

namespace App\Entity;

use App\Repository\InterviewRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterviewRepository::class)]
class Interview
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $artist;

    #[ORM\Column(type: 'string', length: 255)]
    private $place;

    #[ORM\Column(type: 'datetime')]
    private $start;

    #[ORM\Column(type: 'datetime')]
    private $end;

    #[ORM\Column(type: 'string', length: 255)]
    private $status;

    #[ORM\ManyToMany(targetEntity: Artist::class, inversedBy: 'interviews')]
    private $artist_id;

    #[ORM\ManyToMany(targetEntity: Place::class, inversedBy: 'interviews')]
    private $place_id;

    public function __construct()
    {
        $this->artist_id = new ArrayCollection();
        $this->place_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtist(): ?string
    {
        return $this->artist;
    }

    public function setArtist(string $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Artist>
     */
    public function getArtistId(): Collection
    {
        return $this->artist_id;
    }

    public function addArtistId(Artist $artistId): self
    {
        if (!$this->artist_id->contains($artistId)) {
            $this->artist_id[] = $artistId;
        }

        return $this;
    }

    public function removeArtistId(Artist $artistId): self
    {
        $this->artist_id->removeElement($artistId);

        return $this;
    }

    /**
     * @return Collection<int, Place>
     */
    public function getPlaceId(): Collection
    {
        return $this->place_id;
    }

    public function addPlaceId(Place $placeId): self
    {
        if (!$this->place_id->contains($placeId)) {
            $this->place_id[] = $placeId;
        }

        return $this;
    }

    public function removePlaceId(Place $placeId): self
    {
        $this->place_id->removeElement($placeId);

        return $this;
    }
}
