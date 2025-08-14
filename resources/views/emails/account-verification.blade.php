<x-mail::message>
# Verifikasi Akun

Halo {{ $nama }},

Terima kasih telah mendaftar di **{{ config('app.name') }}**.  
Klik tombol di bawah ini untuk memverifikasi akun kamu.

<x-mail::button :url="$url">
Verifikasi Akun
</x-mail::button>

Terima kasih,  
{{ config('app.name') }}
</x-mail::message>
