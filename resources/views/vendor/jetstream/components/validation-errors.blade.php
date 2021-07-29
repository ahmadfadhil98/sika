@if ($errors->any())
    <div {{ $attributes }}>
        <div class="pt-3 underline text-red-500">{{ __('Ops, Akses Ditolak!.') }}</div>
        <div class="pt-1 text-red-500">*Pastikan Anda menggunakan <span class="underline">Nama Pengguna</span> dan <span class="underline">Kata Sandi</span> yang benar</div>

        {{-- <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> --}}
    </div>
@endif
