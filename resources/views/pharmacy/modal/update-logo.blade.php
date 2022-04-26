<div class="modal fade" id="editImg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3 modal-blur">
      <div class="modal-header">
        <h4 class="modal-title fw-bold text-center text-primary-darker" id="exampleModalLabel">تعديل صورة البروفايل</h4>
        <button type="button" class="btn-close m-0 p-0" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('pharmacies.update.logo') }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
          @csrf
          <div class="col-12">
            <div class="input-group mb-3">
              <input name="logo" type="file" class="form-control @error('logo') is-invalid @enderror" id="inputGroupFile02">
            </div>
            @error('logo')
              <span class="text-danger" role="alert">
                  {{ $message }}
              </span>
            @enderror
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary px-5">حفظ</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
