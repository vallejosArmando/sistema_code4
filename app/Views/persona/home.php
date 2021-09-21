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

        <select class=" form-control" name="ap" id="ap"></select>

    </div>
    <div class="container mt-5">

        <select class="search form-control" name="am" id="am"></select>

    </div>

</body>


<script>
    function persona() {
        $('#nombres').select2({
            minimumInputLength: 1,
            allowClear: true,
            placeholder: '--- Buscar Persona ---',
            ajax: {
                dataType: 'json',
                url: "<?= site_url('/persona/select') ?>",
                delay: 500,
                data: function(params) {
                    return {
                        search: params.term
                    }
                },
                processResults: function(data, page) {
                    return {
                        results: data
                    }
                }
            }
        });
        $(document).ready(function() {
            $('#ap').select2();
            $('#ap').change(function(e) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('/persona/listAp'); ?>",
                    data: {
                        ap: $(this).val()
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.data) {
                            $('#ap').html(response.data);

                        }

                    },
                    error: function(XHR, ThrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                })

            });
        });
    }


    $(document).ready(function() {
        persona();
    });
</script>

</html>