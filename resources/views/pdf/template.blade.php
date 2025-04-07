<!DOCTYPE html>
<html>
<head>
    <title>Plan de cours</title>
    <style>
        body { font-family: sans-serif; }
        h2 { margin-top: 40px; }
    </style>
</head>
<body>
    <h1>Sigle</h1>
    {!! $data['sigle'] !!}

    <h2>Stratégies pédagogiques</h2>
    {!! $data['strategies'] !!}

    <h2>Disponibilité</h2>
    {!! $data['disponibilite'] !!}

    <h2>Plan sur 15 semaines</h2>
    {!! $data['plan1'] !!}

    <h2>Évaluation</h2>
    {!! $data['evaluation'] !!}

    <h2>Biographies</h2>
    {!! $data['biographies'] !!}
</body>
</html>