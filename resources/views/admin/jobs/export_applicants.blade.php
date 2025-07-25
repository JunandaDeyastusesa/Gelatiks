<table>
    <thead>
        <tr>
            <th style="text-align: center;">No</th>
            <th>Job Name</th>
            <th>Category</th>
            <th>Nama Lengkap</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Usia</th>
            <th>No Telepon</th>
            <th>Email</th>
            <th>Domisili</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($applicants as $index => $applicant)
            <tr>
                <td style="text-align: center;">
                    {{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}
                </td>
                <td>{{ $job->jobs_name ?? '-' }}</td>
                <td>{{ $job->category ?? '-' }}</td>
                <td>{{ $applicant->user->profile->namaLengkap ?? '-' }}</td>
                <td>{{ $applicant->user->profile->kelahiran ?? '-' }}</td>
                <td>{{ $applicant->user->profile->kelamin ?? '-' }}</td>
                <td>
                    @if ($applicant->user->profile?->kelahiran)
                        {{ \Carbon\Carbon::parse($applicant->user->profile->kelahiran)->age }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ $applicant->user->profile->telp ?? '-' }}</td>
                <td>{{ $applicant->user->email ?? '-' }}</td>
                <td>{{ $applicant->user->profile->domisili ?? '-' }}</td>
                <td>{{ $applicant->status ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
