<div>
    {{-- The Master doesn't talk, he acts. --}}
    <input type="text" wire:model="searchTerm" />  <ul>
      @foreach($pharmacies as $pharmacy)
        <p>
         {{$pharmacy->name}}
        </p>
       </li>
      @endforeach
     </ul>

</div>

