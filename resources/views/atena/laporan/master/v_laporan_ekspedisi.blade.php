@extends('template.app')

@section('content')
  <h1>{{ $menu }}</h1>
@endsection

@push('js')
  <script>
    tutupLoader();
  </script>
@endpush
