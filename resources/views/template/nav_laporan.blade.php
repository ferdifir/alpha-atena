<div id="menu-popup-wrapper">
    <div class="root">

    @foreach(session('array_menu') as $menuLv1)
        {{-- hanya menampilkan anak menu dari laporan --}}
        @if(strtolower($menuLv1->namamenu) != 'laporan')
            @continue
        @endif

        @foreach($menuLv1->children as $menuLv2)
            @if ($menuLv2->children->count() == 0)
                @continue
            @endif

        <div class="card {{ $menuLv2->kodemenu }}" onclick="buka_laporan('{{ $menuLv2->kodemenu }}', '{{ $menuLv1->kodemenu }}')">
            <div>
                <img class="icon" src="{{ asset('assets/icon/png/' . $menuLv2->namamenu . '.png') }}">
                <h4>{{ $menuLv2->namamenu }}</h4>
            </div>
        </div>

        @endforeach
    @endforeach

    </div>
</div>

@push('js')
<script>
/**
 * Membuka menu laporan pada tab baru sesuai kodelaporan tertentu
 *
 * @param {string} kodelaporan
 * @param {string} kodemenu
 */
function buka_laporan(kodelaporan, kodemenu) {
    // menutup popup
    $('#nav-laporan-mask').hide()


    @if(Route::currentRouteName() == 'homepage')
    window.location.replace(base_url + 'home?kodelaporan=' + kodelaporan + '&kodeinduk=' + kodemenu)
    @else
    window.open(base_url + 'home?kodelaporan=' + kodelaporan + '&kodeinduk=' + kodemenu)
    @endif
}
</script>
@endpush