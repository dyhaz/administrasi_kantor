<html>
<body>
<style>
    @page {
        header: page-header;
        footer: page-footer;
    }
</style>
<htmlpageheader name="page-header">
    <table style="width: 100%">
        <tr><td style="width: 100%"><h5>Laporan Surat Masuk</h5></td><td><h5>{{ date('Y/m/d') }}</h5></td></tr>
    </table>
</htmlpageheader>

<htmlpagefooter name="page-footer">
    Halaman {PAGENO}
</htmlpagefooter>
<p></p>
@foreach($laporan as $periode_laporan => $rows)
    <table style="background-color: #eeeeee">
        <tr><td><h3>{{ 'Surat Masuk Tanggal '.date_format(date_create($periode_laporan), 'Y/m/d') }}</h3></td></tr>
    </table>
    <p></p>
    <div>
        <table border="1" style="width: 100%;border-collapse: collapse;">
            <thead>
            <tr><th width="10%">Nomor Surat</th><th width="20%">Tanggal Surat</th><th width="20%">Pengirim</th><th width="30%">Perihal</th><th>Disposisi Tujuan</th></tr>
            </thead>
            <tbody>
            @if($rows)
                @foreach($rows as $key => $row)
                    <tr>
                        <td>{{ $row->nomor }}</td><td>{{ date_format(date_create($row->tanggal_naskah), 'Y/m/d') }}</td><td>{{ @$row->instansi->nama }}</td><td>{{ $row->perihal }}</td><td>{{ @$row->disposisi->disposisi_tujuan->divisi->nama }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <p></p>
@endforeach
</body>
</html>