<div class="modal fade" id="modalDelete{{ $m->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDeleteLabel{{ $m->id }}" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalDeleteLabel{{ $m->id }}">
            Hapus Data Murid?
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-start">
        <div class="row">
            <div class="col-6">Nama</div>
            <div class="col-6">: {{ $m->nama }}</div>
        </div>

        <div class="row">
            <div class="col-6">NISN</div>
            <div class="col-6">: {{ $m->nisn }}</div>
        </div>

        <div class="row">
            <div class="col-6">Kelas</div>
            <div class="col-6">: {{ $m->kelas->nama_kelas ?? '-' }}</div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Kembali</button>

        <form action="{{ route('murid.destroy', $m->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
        </form>

      </div>

    </div>
  </div>

</div>
