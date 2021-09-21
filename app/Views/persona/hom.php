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
    <script src="<?php echo base_url(); ?>/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>/jquery-ui/external/jquery/jquery.js"></script>

</head>

<body>
    <div class="mt-2 mx-auto w-50">

        <h1 class="mb-5">daleeeee</h1>
        <form action="" method="post">
            <div class="mb-5">
                <label for="ap" class="form-label">ap.paterno</label>
                <select class="js-example-basic-single" name="ap" id="ap">
                    <option value=""></option>
                    <?php foreach ($datas as $row) : ?>
                        <option value="<?php echo $row['id'] ?>"> <?php echo $row['ap'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </form>

    </div>


</body>



</html>