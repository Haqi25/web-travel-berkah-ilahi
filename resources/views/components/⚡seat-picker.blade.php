<?php

use Livewire\Component;
use App\Models\Order;
use App\Models\Schedule;
use App\Models\orderDetail;

new class extends Component
{
    public $scheduleId;
    public $capacity;

    public $selectedSeats = []; 
    public $pricePerSeat;

   public function with()
{
    return [

        'bookedSeats' => orderDetail::whereHas('order', function($query) {
                                $query->where('schedule_id', $this->scheduleId)
                                      ->whereIn('status', ['pending', 'PAID']);
                            })
                            ->pluck('seat_number')
                            ->map(fn($item) => (string)$item)
                            ->toArray(),
    ];
}

public function selectSeat($number)
{
    $number = (string)$number;

    $isAlreadyTaken = OrderDetail::where('seat_number', $number)
        ->whereHas('order', function($query) {
            $query->where('schedule_id', $this->scheduleId)
                  ->whereIn('status', ['pending', 'PAID']);
        })
        ->exists();

    if ($isAlreadyTaken) {
        $this->addError('seats', 'Maaf, kursi ' . $number . ' sudah dipesan!');
        return; 
    }

    if (in_array($number, $this->selectedSeats)) {
        $this->selectedSeats = array_values(array_diff($this->selectedSeats, [$number]));
    } else {
        $this->selectedSeats[] = $number;
    }

   
    $this->dispatch('seatUpdated', 
        seats: $this->selectedSeats,
        total: count($this->selectedSeats) * $this->pricePerSeat
    );
}

public function mount($scheduleId)
{
    $this->scheduleId = $scheduleId;
    $schedule = Schedule::find($scheduleId);
    $this->pricePerSeat = $schedule->route->price;
}

public function getTotalPriceProperty()
{
    return count($this->selectedSeats) * $this->pricePerSeat;
}
public function updatedSelectedSeats()
{
    $this->dispatch('seatUpdated', 
        seats: $this->selectedSeats,
        total: $this->totalPrice
    );
}
}

?>

<div wire:poll.5s>
    <div class="position-relative">
          <div wire:loading.flex
         wire:target="selectSeat"
         class="position-absolute top-0 start-0 w-100 h-100 justify-content-center align-items-center bg-white bg-opacity-75"
         style="z-index:999;">
         
        <div class="spinner-border text-info" role="status">
        
        </div>
        <a style="padding-left: 10px;">Memproses...</a>
    </div>
    
       
    <div class="row g-2">
        @for ($i = 1; $i <= $capacity; $i++)
            @php 
                $seatNum = (string)$i;
                $isOccupied = in_array($seatNum, $bookedSeats); 
             
                $isSelected = in_array($seatNum, $selectedSeats);
            @endphp

            <div class="col-3 mb-2">
                <div class="seat {{ $isOccupied ? 'occupied' : ($isSelected ? 'selected' : '') }}"
                     @if (!$isOccupied) wire:click="selectSeat({{ $i }})" @endif
                     style="cursor: {{ $isOccupied ? 'not-allowed' : 'pointer' }};">
                    {{ $i }}
                </div>
            </div>

           
            @if ($i % 4 == 2)
                <div class="col-1"></div>
            @endif
        @endfor
    </div>

    @foreach($selectedSeats as $seat)
        <input type="hidden" name="seats[]" value="{{ $seat }}">
    @endforeach
    
    @error('seats') <span class="text-danger">{{ $message }}</span> @enderror
</div>
</div>

