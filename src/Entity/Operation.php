<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
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
    private $operation;

    /**
     * @ORM\ManyToOne(targetEntity=Result::class, inversedBy="operations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $result;

    /**
     * @ORM\ManyToMany(targetEntity=MultiplicationsTable::class, mappedBy="operations")
     */
    private $multiplicationsTables;

    public function __construct()
    {
        $this->multiplicationsTables = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function setOperation(string $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

    public function getResult(): ?Result
    {
        return $this->result;
    }

    public function setResult(?Result $result): self
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return Collection|MultiplicationsTable[]
     */
    public function getMultiplicationsTables(): Collection
    {
        return $this->multiplicationsTables;
    }

    public function addMultiplicationsTable(MultiplicationsTable $multiplicationsTable): self
    {
        if (!$this->multiplicationsTables->contains($multiplicationsTable)) {
            $this->multiplicationsTables[] = $multiplicationsTable;
            $multiplicationsTable->addOperation($this);
        }

        return $this;
    }

    public function removeMultiplicationsTable(MultiplicationsTable $multiplicationsTable): self
    {
        if ($this->multiplicationsTables->removeElement($multiplicationsTable)) {
            $multiplicationsTable->removeOperation($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->operation;
    }
}
