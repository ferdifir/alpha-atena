@extends('template.form')

@section('content')
  <div class="easyui-layout" style="width:100%;height:100%" fit="true">
    <div data-options="region:'center'">
      <iframe frameborder="0" id="viewChild" name="viewchild" width="99%" height="98%" frameborder="0"
        src="{{ routes('atena.master.pengaturan.frame-master-perusahaan') }}"></iframe>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(function() {
      $('#mask-loader').fadeOut(500, function() {
        $(this).hide()
      })
    })
  </script>
@endpush
