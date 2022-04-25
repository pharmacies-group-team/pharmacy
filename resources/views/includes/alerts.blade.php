 {{-- alerts --}}
 <div>
   {{-- success --}}
   @if (session('status'))
     <div class="alert alert-success px-4 py-2">
       {{ session('status') }}
     </div>
   @endif

   {{-- errors --}}
   @if ($errors->any())
     <div class="alert alert-danger">
       <ul>
         @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
         @endforeach
       </ul>
     </div>
   @endif
 </div>
