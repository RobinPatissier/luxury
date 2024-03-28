<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatRepository::class)]
class Candidat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $gender = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $country = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nationality = null;

    #[ORM\Column(nullable: true)]
    private ?bool $passport = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $passportFile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CV = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profilPicture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $currentLocation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateOfBirth = null;

    #[ORM\Column(nullable: true)]
    private ?bool $availability = true;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $notes = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateCreated = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateUpdated = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDeleted = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $files = null;


    #[ORM\OneToMany(targetEntity: Candidature::class, mappedBy: 'candidat', orphanRemoval: true)]
    private Collection $Candidature;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?Experience $experience = null;

    #[ORM\OneToOne(inversedBy: 'candidat', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $User = null;


    public function __construct()
    {
        $this->Candidature = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isGender(): ?bool
    {
        return $this->gender;
    }

    public function setGender(?bool $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): static
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function isPassport(): ?bool
    {
        return $this->passport;
    }

    public function setPassport(?bool $passport): static
    {
        $this->passport = $passport;

        return $this;
    }

    public function getPassportFile(): ?string
    {
        return $this->passportFile;
    }

    public function setPassportFile(?string $passportFile): static
    {
        $this->passportFile = $passportFile;

        return $this;
    }

    public function getCV(): ?string
    {
        return $this->CV;
    }

    public function setCV(?string $CV): static
    {
        $this->CV = $CV;

        return $this;
    }

    public function getProfilPicture(): ?string
    {
        return $this->profilPicture;
    }

    public function setProfilPicture(?string $profilPicture): static
    {
        $this->profilPicture = $profilPicture;

        return $this;
    }

    public function getCurrentLocation(): ?string
    {
        return $this->currentLocation;
    }

    public function setcurrentLocation(?string $currentLocation): static
    {
        $this->currentLocation = $currentLocation;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?\DateTimeInterface $dateOfBirth): static
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function isAvailability(): ?bool
    {
        return $this->availability;
    }

    public function setAvailability(?bool $availability): static
    {
        $this->availability = $availability;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(?\DateTimeInterface $dateCreated): static
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDateUpdated(): ?\DateTimeInterface
    {
        return $this->dateUpdated;
    }

    public function setDateUpdated(?\DateTimeInterface $dateUpdated): static
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    public function getDateDeleted(): ?\DateTimeInterface
    {
        return $this->dateDeleted;
    }

    public function setDateDeleted(?\DateTimeInterface $dateDeleted): static
    {
        $this->dateDeleted = $dateDeleted;

        return $this;
    }

    public function getFiles(): ?string
    {
        return $this->files;
    }

    public function setFiles(?string $files): static
    {
        $this->files = $files;

        return $this;
    }


    /**
     * @return Collection<int, Candidature>
     */
    public function getCandidature(): Collection
    {
        return $this->Candidature;
    }

    public function addCandidature(Candidature $candidature): static
    {
        if (!$this->Candidature->contains($candidature)) {
            $this->Candidature->add($candidature);
            $candidature->setCandidat($this);
        }

        return $this;
    }

    public function removeCandidature(Candidature $candidature): static
    {
        if ($this->Candidature->removeElement($candidature)) {
            // set the owning side to null (unless already changed)
            if ($candidature->getCandidat() === $this) {
                $candidature->setCandidat(null);
            }
        }

        return $this;
    }

    public function getExperience(): ?Experience
    {
        return $this->experience;
    }

    public function setExperience(?Experience $experience): static
    {
        $this->experience = $experience;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(User $User): static
    {
        $this->User = $User;

        return $this;
    }

    public function __toString(): string
    {
        return $this-> lastName;
    }
}
