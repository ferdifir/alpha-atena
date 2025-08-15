<div class="menu-popup-wrapper">
    <div class="root">

    @foreach(session('array_menu') as $menu)
        <div class="card {{ $menu->kodemenu }}" onclick="buka_menu('{{ $menu->kodemenu }}', '{{ $menu->namamenu }}')">
            <div>
                <img class="icon" src="{{ asset('assets/icon/png/' . $menu->namamenu . '.png') }}">
                <h4>{{ $menu->namamenu }}</h4>
            </div>
        </div>
    @endforeach

    </div>
</div>

@push('js')
<script>
/**
 * Membuka menu pada tab baru sesuai kodemenu tertentu
 *
 * @param {string} kodemenu
 * @param {string} namamenu
 */
function buka_menu(kodemenu, namamenu) {
    if (namamenu.toLowerCase() == 'laporan') {
        tutup_popup_modul('fade')
        tampilkan_popup_laporan()
        return
    }

    tutup_popup_modul('no-animation')

    setTimeout(function () {
        @if(Route::currentRouteName() == 'homepage')
        window.location.replace('{{ route('homepage') . '?kodeinduk=' }}' + kodemenu)
        @else
        window.open('{{ route('homepage') . '?kodeinduk=' }}' + kodemenu)
        @endif
    }, 50)
}
</script>
@endpush
