<?php

use Livewire\Component;
use App\Models\Order;

new class extends Component
{
    public $orderId;
    public $status;
    public $payment_method;
    public function mount($orderId)
    {
        $this->orderId = $orderId;
        $this->loadStatus();
    }

    public function loadStatus()
    {
        $order = Order::find($this->orderId);
        $this->status = $order?->status;
        $this->payment_method = $order?->payment_method;
    }
};
?>

<div wire:poll.3s="loadStatus">
    @if ($status == 'PAID' || $status =='done')
        <span class="invoice-status success">
            Pembayaran berhasil
        </span>
    @elseif($status == 'pending' && $payment_method == 'transfer')
        <span class="invoice-status warning">
            Menunggu diverifikasi Admin
        </span>
    @elseif($status == 'pending')
    <span class="invoice-status warning">
            Menunggu pembayaran
        </span>
    @else
        <span class="invoice-status danger">
            pembayaran gagal
        </span>
    @endif
</div>