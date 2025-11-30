<script src="{{ asset('BS/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('BS/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('BS/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('BS/assets/js/app.min.js') }}"></script>
  <script src="{{ asset('BS/assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script src="{{ asset('alert/dist/sweetalert2.all.min.js') }}"></script>

  @session('success')
  <script>
    Swal.fire({
      title: "Sukses",
      text: "{{ session('success') }}",
      icon: "success"
    });
  </script>
  @endsession

  @session('error')
  <script>
    Swal.fire({
      title: "Gagal",
      text: "{{ session('error') }}",
      icon: "error"
    });
  </script>
  @endsession

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    (function () {
      const canvas = document.getElementById('chartSiswa');
      if (!canvas) return;

   
      let labels = null;
      let data = null;

      @if(isset($muridPerKelas))
        labels = @json($muridPerKelas->pluck('nama_kelas'));
        data   = @json($muridPerKelas->pluck('murid_count'));
      @elseif(isset($labels) && isset($data))
        labels = @json($labels);
        data   = @json($data);
      @else
        labels = [];
        data = [];
      @endif

      try {
        const ctx = canvas.getContext('2d');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: 'Jumlah Siswa',
              data: data,
            }]
          },
          options: {
            responsive: true,
            scales: {
              y: {
                beginAtZero: true,
                ticks: {
                }
              }
            }
          }
        });
      } catch (e) {
        console.error('Chart init error:', e);
      }
    })();
  </script>

  @stack('scripts')

</body>

</html>