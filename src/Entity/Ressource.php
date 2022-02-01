<?php

namespace App\Entity;

use App\Repository\RessourceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=RessourceRepository::class)
 * @ApiResource()
 */
class Ressource
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantity_total;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class)
     */
    private $category_id;

    /**
     * @ORM\ManyToMany(targetEntity=Group::class)
     */
    private $group_id;

    /**
     * @ORM\OneToMany(targetEntity=Loan::class, mappedBy="ressource")
     */
    private $loans;

    public function __construct()
    {
        $this->category_id = new ArrayCollection();
        $this->group_id = new ArrayCollection();
        $this->loans = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantityTotal(): ?int
    {
        return $this->quantity_total;
    }

    public function setQuantityTotal(?int $quantity_total): self
    {
        $this->quantity_total = $quantity_total;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategoryId(): Collection
    {
        return $this->category_id;
    }

    public function addCategoryId(Category $categoryId): self
    {
        if (!$this->category_id->contains($categoryId)) {
            $this->category_id[] = $categoryId;
        }

        return $this;
    }

    public function removeCategoryId(Category $categoryId): self
    {
        $this->category_id->removeElement($categoryId);

        return $this;
    }

    /**
     * @return Collection|Group[]
     */
    public function getGroupId(): Collection
    {
        return $this->group_id;
    }

    public function addGroupId(Group $groupId): self
    {
        if (!$this->group_id->contains($groupId)) {
            $this->group_id[] = $groupId;
        }

        return $this;
    }

    public function removeGroupId(Group $groupId): self
    {
        $this->group_id->removeElement($groupId);

        return $this;
    }

    /**
     * @return Collection|Loan[]
     */
    public function getLoans(): Collection
    {
        return $this->loans;
    }

    public function addLoan(Loan $loan): self
    {
        if (!$this->loans->contains($loan)) {
            $this->loans[] = $loan;
            $loan->setRessource($this);
        }

        return $this;
    }

    public function removeLoan(Loan $loan): self
    {
        if ($this->loans->removeElement($loan)) {
            // set the owning side to null (unless already changed)
            if ($loan->getRessource() === $this) {
                $loan->setRessource(null);
            }
        }

        return $this;
    }
}
