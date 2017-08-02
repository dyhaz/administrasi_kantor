<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Surat Masuk</h4>
    </div>
    <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th>ID</th><th>Nomor</th><th>Tanggal Terima</th><th>Nomor Naskah Dinas</th><th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($suratmasuk as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nomor }}</td><td>{{ $item->tanggal_terima }}</td><td>{{ $item->nomor_naskah_dinas }}</td>
                        <td>
                            <div class="btn-toolbar">
                                <div class="btn-group">
                                    <button onclick="window.location = '{{ url('/disposisi/create?sm=' . $item->id) }}'" title="Disposisi" class="btn btn-default btn-xs"><i class="icon-edit" aria-hidden="true"></i> Disposisi</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>