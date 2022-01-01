<?php
namespace App\ValueObjects;

use App\Contracts\ValueObjectContract;

final class ProductValueObject implements ValueObjectContract
{
    /**
     * @param string $name
     * @param string|null $description
     * @param string|null $thumbnail
     * @param int $categoryId
     */
    public function __construct(
        public string $name,
        public null|string $description,
        public null|string $thumbnail,
        public int $categoryId
    ) {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail,
            'category_id' => $this->categoryId,
        ];
    }
}
