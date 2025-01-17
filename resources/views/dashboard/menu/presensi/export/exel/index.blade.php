<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal Hari</th>
            <th>Masuk</th>
            <th>Pulang</th>
            <th>Catatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($attendances as $index => $attendance)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $attendance->users->name }}</td>
                <td>{{ $attendance->created_at->format('Y-m-d') }}</td>
                <td>{{ $attendance->check_in }}</td>
                <td>{{ $attendance->check_out }}</td>
                <td>{{ $attendance->notes }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
