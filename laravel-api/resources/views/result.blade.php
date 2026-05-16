<!DOCTYPE html>
<html>

<head>

<title>Analysis Result</title>

<script type="module">

import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@11/dist/mermaid.esm.min.mjs';

mermaid.initialize({
    startOnLoad:true
});

</script>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
    padding:40px;
}

.container{

    max-width:900px;

    margin:auto;

    background:white;

    padding:30px;

    border-radius:10px;
}

.graph-box{

    margin-top:30px;

    padding:20px;

    border:1px solid #ddd;

    border-radius:10px;

    overflow:auto;
}

ul{
    line-height:28px;
}

</style>

</head>

<body>

<div class="container">

<h1>Resume Analysis Result</h1>

<h2>

Match Score:

{{ $result['match_score'] ?? 0 }}%

</h2>

<p>

<strong>Recommendation:</strong>

{{ $result['recommendation'] ?? 'N/A'}}

</p>

<h3>Skills Found</h3>

<ul>

@foreach($result['skills_found'] ?? [] as $skill)

<li>{{ $skill }}</li>

@endforeach

</ul>

<h3>Matched Skills</h3>

<ul>

@foreach($result['matched_skills'] ?? [] as $skill)

<li>{{ $skill }}</li>

@endforeach

</ul>

<h3>Missing Skills</h3>

<ul>

@foreach($result['missing_skills'] ?? [] as $skill)

<li>{{ $skill }}</li>

@endforeach

</ul>


<h2>LangGraph Workflow</h2>

<div class="graph-box">

<div class="mermaid">

{!! $result['workflow_graph'] ?? '' !!}
</div>

</div>

</div>

</body>
</html>