<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<form action="../traitement/traitement_search.php" method="get">
<div class="container-sm cont">
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon1">Departement</span>
<input type="text" class="form-control" name="dept" aria-label="dept" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon1">Nom employé</span>
<input type="text" class="form-control" name="empl" aria-label="empl" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
<span class="input-group-text">Age entre</span>
<input type="text" class="form-control" name="min" aria-label="min">
<span class="input-group-text">Et</span>
<input type="text" class="form-control" name="max" aria-label="max">
</div>
<input type="submit" class="form-control" aria-label="submit" value="Search">
</div>
</div>
</form>
</body>
</html>