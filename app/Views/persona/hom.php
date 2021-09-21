<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body>
    <div class="mt-2 mx-auto w-50">

        <h1 class="mb-5">daleeeee</h1>
        <form action="" method="post">
            <div class="mb-5">
                <label for="ap" class="form-label">ap.paterno</label>
                <select class="form-select  " name="ap" id="ap">
                    <option value=""></option>
                    <?php foreach ($datas as $row) : ?>
                        <option value="<?php echo $row['id'] ?>"> <?php echo $row['ap'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </form>

    </div>
</body>

<script src="">
    $(document).ready(function() {
        $('#ap').select2();
    });
</script>

</html>