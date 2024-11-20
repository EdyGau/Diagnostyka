<?php

namespace App\Forms\Builders;

class ContactFormBuilder
{
    protected string $action;
    protected array $fields = [];
    protected ?string $submitButton = null;

    public function __construct(string $action)
    {
        $this->action = $action;
    }

    public function addField(array $field): self
    {
        $this->fields[] = $field;
        return $this;
    }

    public function setSubmitButton(string $label): self
    {
        $this->submitButton = $label;
        return $this;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function getSubmitButton(): ?string
    {
        return $this->submitButton;
    }

    public function getAction(): string
    {
        return $this->action;
    }
}
