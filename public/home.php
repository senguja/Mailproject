<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./libaries/bootstrap-5.1.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/custom.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col my-4 d-flex justify-content-center">
            <div class="-form">
                <h1 class="">Kontakt</h1>
                <div class="my-3">
                    <label for="firstname">Vorname</label>
                    <input class="form-control" id="firstname" type="text" required>
                </div>
                <div class="my-3">
                    <label for="lastname">Nachname</label>
                    <input class="form-control" id="lastname" type="text" required>
                </div>
                <div class="my-3">
                    <label for="email">Email</label>
                    <input class="form-control" id="email" type="email" required>
                </div>
                <div class="my-3">
                    <label for="message">Nachricht</label>
                    <textarea class="form-control" id="message" type="text" rows="10" required></textarea>
                </div>
                <button class="my-3 btn btn-secondary -submit" type="submit" id="submit">Email senden</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <h1>Fragebogen</h1>
        <div class="quiz-container">
            <div id="quiz"></div>
        </div>
        <button id="previous"> vorherige Frage</button>
        <button id="next">Nächste Frage</button>
        <button id="submit1"> Fragenbogen senden</button>
        <div id="results"></div>

    </div>
<script src="./libaries/bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>

<script type="module">

    import App from "./app/App.js";

    App();

</script>

</body>

</html>

