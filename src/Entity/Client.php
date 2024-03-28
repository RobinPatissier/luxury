<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $SocietyName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ActivityType = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ContactName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Poste = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ContactNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ContactEmail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Notes = null;

    #[ORM\OneToMany(targetEntity: JobOffer::class, mappedBy: 'Client', orphanRemoval: true)]
    private Collection $jobOffers;

    public function __construct()
    {
        $this->jobOffers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSocietyName(): ?string
    {
        return $this->SocietyName;
    }

    public function setSocietyName(?string $SocietyName): static
    {
        $this->SocietyName = $SocietyName;

        return $this;
    }

    public function getActivityType(): ?string
    {
        return $this->ActivityType;
    }

    public function setActivityType(?string $ActivityType): static
    {
        $this->ActivityType = $ActivityType;

        return $this;
    }

    public function getContactName(): ?string
    {
        return $this->ContactName;
    }

    public function setContactName(?string $ContactName): static
    {
        $this->ContactName = $ContactName;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->Poste;
    }

    public function setPoste(?string $Poste): static
    {
        $this->Poste = $Poste;

        return $this;
    }

    public function getContactNumber(): ?string
    {
        return $this->ContactNumber;
    }

    public function setContactNumber(?string $ContactNumber): static
    {
        $this->ContactNumber = $ContactNumber;

        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->ContactEmail;
    }

    public function setContactEmail(?string $ContactEmail): static
    {
        $this->ContactEmail = $ContactEmail;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->Notes;
    }

    public function setNotes(?string $Notes): static
    {
        $this->Notes = $Notes;

        return $this;
    }

    /**
     * @return Collection<int, JobOffer>
     */
    public function getJobOffers(): Collection
    {
        return $this->jobOffers;
    }

    public function addJobOffer(JobOffer $jobOffer): static
    {
        if (!$this->jobOffers->contains($jobOffer)) {
            $this->jobOffers->add($jobOffer);
            $jobOffer->setClient($this);
        }

        return $this;
    }

    public function removeJobOffer(JobOffer $jobOffer): static
    {
        if ($this->jobOffers->removeElement($jobOffer)) {
            // set the owning side to null (unless already changed)
            if ($jobOffer->getClient() === $this) {
                $jobOffer->setClient(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this-> SocietyName;
    }
}
