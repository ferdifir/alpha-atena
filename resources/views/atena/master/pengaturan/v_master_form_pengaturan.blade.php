@extends('template.form')

@section('content')
  <div class="easyui-layout" style="width:100%;height:100%" fit="true">
    <div data-options="region:'center'">
      <iframe frameborder="0" id="viewChild" name="viewchild" width="99%" height="98%" frameborder="0"
        src="{{ url('atena/master/data/pengaturan/view-master-perusahaan') }}"></iframe>
    </div>
  </div>

  <script type="text/javascript" src="{{ asset('assets/jquery-easyui/plugins/datagrid-filter.js') }}"></script>
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
