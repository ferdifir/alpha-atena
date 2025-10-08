@extends('template.app')

@section('content')
  <div style="
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;">
    <h1>{{ $menu }}</h1>
  </div>
@endsection

@push('js')
  <script>
    tutupLoader();
  </script>
@endpush
