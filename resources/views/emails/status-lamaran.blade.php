<x-mail::message>
# Halo {{ $applicantName }},

Lamaran Anda untuk posisi **{{ $jobTitle }}** di **{{ $companyName }}** memiliki status baru:

@if($status == 'apply')
✅ Lamaran Anda telah kami terima.
@elseif($status == 'accepted')
🎉 Selamat! Lamaran Anda diterima.
@elseif($status == 'rejected')
❌ Mohon maaf, lamaran Anda belum berhasil.
@endif

<x-mail::button :url="$applicationLink">
Lihat Detail Lamaran
</x-mail::button>

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
