{{-- @foreach($daftar_menu as $menu_lv1)
    @foreach($menu_lv1['children'] as $menu_lv2)
        @foreach($menu_lv2['children'] as $menu_lv3)
            {{ route(sprintf('%s.%s.%s.%s', [
                $menu_lv3['namamodul'],
                $menu_lv1['namamenu'],
                $menu_lv2['namamenu'],
                $menu_lv3['namamenu']
                ])) }}
        @endforeach
    @endforeach
@endforeach --}}
@extends('template.tab')

@section('content')

@endsection
