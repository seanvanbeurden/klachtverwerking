<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Klachtverwerking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container">
    <div class="row py-5">
        <div class="col">
            <form action="mail.php" method="post">
                <div class="form-group">
                    <label for="naam">Naam</label>
                    <input type="text" name="naam" class="form-control" id="naam">
                    <label for="email">E-mailadres</label>
                    <input type="email" name="email" class="form-control" id="email">
                    <label for="klacht">Klacht</label><br>
                    <textarea name="klacht" class="form-control text-center" id="klacht" rows="3" cols="120">Mijn klacht is:</textarea><br>
                    <label for="file">Bestand (niet verplicht)</label>
                    <input type="file" name="file" class="form-control" id="file">
                    <button type="submit" class="btn btn-primary my-2" value="submit">Stuur email</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    echo '<div class="container">
            <div class="row py-5 text-center">
                <div class="col"><b>' . $_COOKIE["Feedback"] . '</b>
                </div>
            </div>
          </div>';

?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
