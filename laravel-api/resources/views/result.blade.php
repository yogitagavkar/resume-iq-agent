<!DOCTYPE html>
<html>
<head>

    <title>Analysis Result</title>

    <style>

        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 40px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        ul {
            line-height: 28px;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Resume Analysis Result</h1>

    <h2>
        Match Score:
        {{ $result['match_score'] }}%
    </h2>

    <p>
        <strong>Recommendation:</strong>
        {{ $result['recommendation'] }}
    </p>

    <h3>Skills Found</h3>

    <ul>
        @foreach($result['skills_found'] as $skill)

            <li>{{ $skill }}</li>

        @endforeach
    </ul>

    <h3>Matched Skills</h3>

    <ul>
        @foreach($result['matched_skills'] as $skill)

            <li>{{ $skill }}</li>

        @endforeach
    </ul>

    <h3>Missing Skills</h3>

    <ul>
        @foreach($result['missing_skills'] as $skill)

            <li>{{ $skill }}</li>

        @endforeach
    </ul>

</div>

</body>
</html>