<?php

use Livewire\Component;
use App\Models\Order;

new class extends Component
{
    public $orderId;
    public $status;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
        $this->loadStatus();
    }

    public function loadStatus()
    {
        $order = Order::find($this->orderId);
        $this->status = $order?->status;
    }
};
?>

<div wire:poll.3s="loadStatus">
    @if ($status == 'PAID')
        <span class="invoice-status success">
            pembayaran berhasil
        </span>
    @elseif($status == 'pending')
        <span class="invoice-status warning">
            menunggu pembayaran
        </span>
    @else
        <span class="invoice-status danger">
            pembayaran gagal
        </span>
    @endif
</div>