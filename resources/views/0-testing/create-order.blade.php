<form action="{{ route('clients.order.store') }}" method="post" enctype="multipart/form-data">
@csrf

  <input hidden name="pharmacy_id" value="2">

  image <input type="file" name="image"> @error('image') {{ $message }} @enderror

  order <input type="text" name="order"> @error('order') {{ $message }} @enderror

  <button type="submit">save</button>
</form>
