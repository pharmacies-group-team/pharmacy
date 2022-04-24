{{-- <footer class="footer">
    <div class="container-fluid">
      <div class="row text-muted">
        <div class="col-6 text-start">
          <p class="mb-0">
            <a
              class="text-muted"
              href="https://adminkit.io/"
              target="_blank"
              ><strong>AdminKit</strong></a
            >
            &copy;
          </p>
        </div>
        <div class="col-6 text-end">
          <ul class="list-inline">
            <li class="list-inline-item">
              <a
                class="text-muted"
                href="https://adminkit.io/"
                target="_blank"
                >Support</a
              >
            </li>
            <li class="list-inline-item">
              <a
                class="text-muted"
                href="https://adminkit.io/"
                target="_blank"
                >Help Center</a
              >
            </li>
            <li class="list-inline-item">
              <a
                class="text-muted"
                href="https://adminkit.io/"
                target="_blank"
                >Privacy</a
              >
            </li>
            <li class="list-inline-item">
              <a
                class="text-muted"
                href="https://adminkit.io/"
                target="_blank"
                >Terms</a
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer> --}}
</div>
</div>


<script src="{{ asset('js/dashboard/app.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>

<script src="{{ asset('js/alpine.min.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables with Multiselect
        flatpickr(".flatpickr-datetime", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
        var datatablesMulti = $("#datatables-multi").DataTable({
            responsive: true,
            select: {
                style: "multi",
            },
        });
    });
</script>
</body>

</html>
