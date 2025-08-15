<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/css/stimulsoft/stimulsoft.viewer.office2013.whiteblue.css') }}" rel="stylesheet">
</head>
<body>
    <div id="root"></div>
    <script src="{{ asset('assets/js/stimulsoft/stimulsoft.reports.js') }}"></script>
    <script src="{{ asset('assets/js/stimulsoft/stimulsoft.viewer.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/disable-rightclick-selection.js') }}"></script> -->
    <script>
        Stimulsoft.Base.StiLicense.key = "6vJhGtLLLz2GNviWmUTrhSqnOItdDwjBylQzQcAOiHkcgIvwL0jnpsDqRpWg5FI5kt2G7A0tYIcUygBh1sPs7koivWV0htru4Pn2682yhdY3+9jxMCVTKcKAjiEjgJzqXgLFCpe62hxJ7/VJZ9Hq5l39md0pyydqd5Dc1fSWhCtYqC042BVmGNkukYJQN0ufCozjA/qsNxzNMyEql26oHE6wWE77pHutroj+tKfOO1skJ52cbZklqPm8OiH/9mfU4rrkLffOhDQFnIxxhzhr2BL5pDFFCZ7axXX12y/4qzn5QLPBn1AVLo3NVrSmJB2KiwGwR4RL4RsYVxGScsYoCZbwqK2YrdbPHP0t5vOiLjBQ+Oy6F4rNtDYHn7SNMpthfkYiRoOibqDkPaX+RyCany0Z+uz8bzAg0oprJEn6qpkQ56WMEppdMJ9/CBnEbTFwn1s/9s8kYsmXCvtI4iQcz+RkUWspLcBzlmj0lJXWjTKMRZz+e9PmY11Au16wOnBU3NHvRc9T/Zk0YFh439GKd/fRwQrk8nJevYU65ENdAOqiP5po7Vnhif5FCiHRpxgF";

        // mendefinisikan data dalam bentuk json object
        var data = @json($data);

        // mendefinisikan objek dataset stimulsoft
        var dataset = new Stimulsoft.System.Data.DataSet('data');

        // membaca file json ke objek dataset stimulsoft
        dataset.readJson(data);

        // mendefinisikan objek report stimulsoft
        var report = new Stimulsoft.Report.StiReport();

        // memuat file desain report
        report.loadFile('{{ asset('assets/report/' . $filename) }}?t={{ time() }}');

        // menghapus seluruh koneksi pada report
        report.dictionary.databases.clear();

        if (report.dictionary.variables.getByName("namaperusahaan") != null) {
            report.dictionary.variables.getByName("namaperusahaan").valueObject = '{{ session('NAMAPERUSAHAAN') }}';
        }

        if (report.dictionary.variables.getByName("userlogin") != null) {
            report.dictionary.variables.getByName("userlogin").valueObject = '{{ Auth::user()->username }}';
        }

        @if(isset($variables))
            @foreach($variables as $key => $item)
                report.dictionary.variables.getByName('{{ $key }}').valueObject = '{{ $item }}';
            @endforeach
        @endif

        // meregistrasi data ke dalam report
        report.regData('data', 'data', dataset);

        // membuat options untuk viewer
        var viewer_options = new Stimulsoft.Viewer.StiViewerOptions();

        // mengeset tampilan default viewer
        // viewer_options.appearance.fullScreenMode = true;
        viewer_options.toolbar.viewMode = Stimulsoft.Viewer.StiWebViewMode.Continuous;
        viewer_options.appearance.scrollbarsMode = true;
        viewer_options.toolbar.showDesignButton = false;
        viewer_options.toolbar.showAboutButton = false;
        viewer_options.toolbar.showOpenButton = false;
        viewer_options.width = '100%';
        viewer_options.height = window.innerHeight - 20 + 'px';

        // mendefinisikan objek viewer
        var viewer = new Stimulsoft.Viewer.StiViewer(viewer_options, 'viewer', false);

        // menampilkan report ke dalam viewer
        viewer.renderHtml('root');
        viewer.report = report;
    </script>
</body>
</html>
