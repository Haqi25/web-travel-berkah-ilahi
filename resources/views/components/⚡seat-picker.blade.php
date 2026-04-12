<?php

use Livewire\Component;
use App\Models\Order;
use App\Models\Schedule;
new class extends Component
{
    public $scheduleId;
    public $capacity;
    public $selectedSeat = null;

    public function with()
    {
        return [
            // Mengambil kursi yang sudah terisi secara real-time
            'bookedSeats' => Order::where('schedule_id', $this->scheduleId)
                                  ->whereIn('status', ['pending', 'PAID'])
                                  ->pluck('seat_number')
                                  ->toArray(),
        ];
    }

    public function selectSeat($number)
    {
        // 1. Cek lagi ke database: Apakah kursi ini SUDAH dipesan orang lain?
    $isAlreadyTaken = Order::where('schedule_id', $this->scheduleId)
                          ->where('seat_number', $number)
                          ->whereIn('status', ['pending', 'PAID'])
                          ->exists();

    if ($isAlreadyTaken) {
        // Jika sudah diambil, beri notifikasi (bisa pakai browser alert atau dispatch)
        $this->addError('seat_number', 'Maaf, kursi ' . $number . ' baru saja dipesan orang lain!');
        return; 
    }

    // 2. Jika aman, baru set sebagai pilihan
    if ($this->selectedSeat == $number) {
        $this->selectedSeat = null;
    } else {
        $this->selectedSeat = $number;
    }
    }
};
?>

<div wire:poll.5s> {{-- Cek ketersediaan kursi tiap 5 detik --}}
    <div class="row g-2">
        @for ($i = 1; $i <= $capacity; $i++)
            @php 
                $isOccupied = in_array((string)$i, $bookedSeats); 
                $isSelected = $selectedSeat == $i;
            @endphp

            <div class="col-3 mb-2">
                <div class="seat {{ $isOccupied ? 'occupied' : ($isSelected ? 'selected' : '') }}"
                     @if (!$isOccupied) wire:click="selectSeat({{ $i }})" @endif>
                    {{ $i }}
                </div>
            </div>

            @if ($i % 4 == 2)
                <div class="col-1"></div>
            @endif
        @endfor
    </div>

    {{-- Hidden input agar tetap bisa dikirim lewat form biasa --}}
    <input type="hidden" name="seat_number"  value="{{ $selectedSeat }}" required>
</div>

