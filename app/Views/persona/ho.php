<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Upload Multiple Files or Images in Codeigniter 4 - zentica-global.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <style>
        .container {
            max-width: 500 px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">

        <select class="search form-control" name="nombres" id="nombres"></select>

    </div>
    <div class="container mt-5">

        <select class=" search form-control" name="ap" id="ap"></select>

    </div>
    <div id="tabla"></div>
    <div class="container mt-5">

        <select class="search form-control" name="am" id="am"></select>

    </div>

</body>


<script>
    function nombres() {
        $('#nombres').select2({
            minimumInputLength: 1,
            allowClear: true,
            placeholder: '--- Buscar Persona ---',
            ajax: {
                dataType: 'json',
                url: "<?= site_url('/persona/select') ?>",
                delay: 250,
                data: function(params) {
                    return {
                        nombres: params.term
                    }
                },
                processResults: function(data, page) {
                    return {
                        results: data
                    }
                }
            }
        });
    }
    $(document).ready(function() {
        nombres();
    });
</script>
<script>
    function ap() {
        $('#ap').select2({
            minimumInputLength: 1,
            allowClear: true,
            placeholder: '--- Buscar Personaap ---',
            ajax: {
                dataType: 'json',
                url: "<?= site_url('/persona/selectap') ?>",
                delay: 250,
                data: function(params) {
                    return {
                        ap: params.term
                    }
                },
                processResults: function(data, page) {
                    return {
                        results: data
                    }
                }
            }
        });
    }
    $(document).ready(function() {
        ap();
    });
</script>
<script>
    function am() {
        $('#am').select2({
            minimumInputLength: 1,
            allowClear: true,
            placeholder: '--- Buscar Personaap ---',
            ajax: {
                dataType: 'json',
                url: "<?= site_url('/persona/selectam') ?>",
                delay: 250,
                data: function(params) {
                    return {
                        am: params.term
                    }
                },
                processResults: function(data, page) {
                    return {
                        results: data
                    }
                }
            }
        });
    }
    $(document).ready(function() {
        am();
    });
</script>

</html>