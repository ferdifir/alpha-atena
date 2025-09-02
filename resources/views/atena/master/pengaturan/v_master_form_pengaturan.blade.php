@extends('template.form')

@section('content')
  <div class="easyui-layout" style="width:100%;height:100%" fit="true">
    <div data-options="region:'center'">
      <iframe frameborder="0" id="viewChild" name="viewchild" width="99%" height="98%" frameborder="0"
        src="{{ route('atena.master.pengaturan.frame-master-perusahaan') }}"></iframe>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(function() {
      $('#mask-loader').fadeOut(500, function() {
        $(this).hide()
      })
    });

    function isTokenExpired() {
      const token = '{{ session('TOKEN') }}';
      if (!token) {
        return true;
      }

      try {
        const payloadBase64 = token.split('.')[1];
        const decodedPayload = atob(payloadBase64);
        const payload = JSON.parse(decodedPayload);

        const expirationTime = payload.exp;
        const currentTime = Math.floor(Date.now() / 1000);

        return expirationTime < currentTime;
      } catch (e) {
        console.error('Gagal mendekode token JWT:', e);
        return true;
      }
    }

    async function fetchData(url, body) {
      try {
        const token = '{{ session('TOKEN') }}';
        let headers = {
          'Authorization': 'bearer ' + token,
        };
        let requestBody = null;

        if (body instanceof FormData) {
          requestBody = body;
        } else {
          headers['Content-Type'] = 'application/json';
          requestBody = body ? JSON.stringify(body) : null;
        }

        const response = await fetch(url, {
          method: 'POST',
          headers: headers,
          body: requestBody,
        });

        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        return data;
      } catch (error) {
        throw error;
      }
    }
  </script>
@endpush
