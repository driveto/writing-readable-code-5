<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .container {
            margin-top: 50px;
        }

        .jumbotron {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <main role="main" class="container">
        <form method="get">
            <div class="form-group">
                <label for="car">Auto</label>
                <select id="car" class="form-control" name="car">
                    <option value="1">Octavia I</option>
                    <option value="2">Volkswagen Passat</option>
                    <option value="3">Toyota Carina 3</option>
                    <option value="4">Hummer H1</option>
                    <option value="5">Mazda RX-8</option>
                </select>
            </div>
            <div class="form-group">
                <label for="distance">Vzdálenost</label>
                <input type="text" name="distance" class="form-control" id="distance" value="<?=round($_GET['distance'], 2)?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Spočítat</button>
        </form>

        <div class="jumbotron">
            <h1><?php include "calc1.php"; ?></h1>
        </div>
    </main>

</body>