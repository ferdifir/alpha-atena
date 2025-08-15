<style>
.menu-divider {
	color: #fff;
	background-color: #333;
	padding: 10px;
	font-weight: bold;
}
</style>

@foreach(session('array_menu') as $menuLv1)

	{{-- jika kodeinduk pada parameter query sama dengan menu, maka tampilkan menu
	jika tidak, maka lewati --}}
	@if(request()->get('kodeinduk') != $menuLv1['kodemenu'])
		@continue;
	@endif

	<ul id="menu-{{ $menuLv1['kodemenu'] }}">

	@foreach($menuLv1['children'] as $menuLv2)
		{{-- jika tidak memiliki anak menu, maka langsung tidak perlu ditampilkan --}}
		@if(count($menuLv2['children']) == 0)
			@continue;
		@endif

		{{-- jika URL memiliki parameter kodelaporan,
		maka menu level 2 yang kode laporannya tidak sesuai paremeter
		tidak usah ditampilkan --}}
		@if(!is_null(request()->get('kodelaporan')))
			@if($menuLv2['kodemenu'] != request()->get('kodelaporan'))
				@continue;
			@endif
		@endif

		<li class="menu-divider nav-menu-item menu-{{ $menuLv2['kodemenu'] }}">
			{{ $menuLv2['namamenu'] }}
		</li>

		@foreach($menuLv2['children'] as $item)
			@php
			$menuutama = str_replace(' ', '', $menuLv1['namamenu']);

			// Parameter kodeinduk disini mereferensikan kodemenu pada parent menu yang paling atas (menu level 1),
			// gunanya untuk bisa mendapatkan menu level 1 dari menu level 3 yang sedang dibuka
			$link = url('') . '/' . ($menuutama . '/' . str_replace(' ', '', $menuLv2['namamenu']) . '/' . $item['namaclass']) . "?kode=" . $item['kodemenu'] . '&kodeinduk=' . $menuLv1['kodemenu'];

			// jika menu level 1 adalah laporan
			// maka menambah parameter kode laporan pada URL
			if (strtolower($menuLv1['namamenu']) == 'laporan') {
				$link .= '&kodelaporan=' . $menuLv2['kodemenu'];
			}
			@endphp

			<li class=" nav-menu-item menu-{{ $menuLv2['kodemenu'] }}">
				<a href="{{ $link }}" onclick="buka_submenu(event, '{{ $item['namamenu'] }}', '{{ $link }}')">{{ $item['namamenu'] }}</a>
			</li>
		@endforeach
	@endforeach
	</ul>
@endforeach
