<?php

namespace App\Entity;

use App\Repository\LoanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
/*
 * collectionOperations={
 *     "get"={
 *      "security"="is_granted('IS_USER')"}} si on voulait mettre de la sécurité
 */
/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read:loan"}}
 * )
 * @ORM\Entity(repositoryClass=LoanRepository::class)
 */
class Loan
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:loan"})
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"read:loan"})
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"read:loan"})
     */
    private $finished_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"read:loan"})
     */
    private $returned_at;

    /**
     * @ORM\ManyToOne(targetEntity=Ressource::class, inversedBy="loans")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read:loan"})
     */
    private $ressource;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="loans")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getFinishedAt(): ?\DateTimeInterface
    {
        return $this->finished_at;
    }

    public function setFinishedAt(\DateTimeInterface $finished_at): self
    {
        $this->finished_at = $finished_at;

        return $this;
    }

    public function getReturnedAt(): ?\DateTimeInterface
    {
        return $this->returned_at;
    }

    public function setReturnedAt(?\DateTimeInterface $returned_at): self
    {
        $this->returned_at = $returned_at;

        return $this;
    }


    public function getRessource(): ?Ressource
    {
        return $this->ressource;
    }

    public function setRessource(?Ressource $ressource_id): self
    {
        $this->ressource = $ressource_id;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
