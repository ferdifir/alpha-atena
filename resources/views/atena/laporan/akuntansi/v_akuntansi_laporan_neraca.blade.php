@extends('template.app')

@section('content')
  <h1
    style="
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    margin: 0;
    padding: 10px;
">
    {{ $kodemenu }}
  </h1>
@endsection

@push('js')
  <script>
    tutupLoader();
  </script>
@endpush