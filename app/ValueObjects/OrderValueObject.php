<?php

namespace App\ValueObjects;

use App\Contracts\ValueObjectContract;

class OrderValueObject implements ValueObjectContract
{
    /**
     * @param string $shippedDate
     * @param string $paymentType
     * @param string $status
     * @param float $totalDiscount
     * @param float $total
     * @param string $note
     * @param int $customer
     * @param int|null $createdBy
     */
    public function __construct(
        public string $shippedDate,
        public string $paymentType,
        public string $paymentTransaction,
        public string $paymentRef,
        public string $paymentCode,
        public string $status,
        public float $totalDiscount,
        public float $total,
        public string $note,
        public int $customer,
        public null|int $createdBy,
    ){}

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'shipped_date' => $this->shippedDate,
            'payment_type' => $this->paymentType,
            'payment_transaction' => $this->paymentTransaction,
            'payment_ref' => $this->paymentRef,
            'payment_code' => $this->paymentCode,
            'status' => $this->status,
            'total_discount' => $this->totalDiscount,
            'total' => $this->total,
            'note' => $this->note,
            'customer_id' => $this->customer,
            'created_by' => $this->createdBy,
        ];
    }
}
