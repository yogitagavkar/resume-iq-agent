<!DOCTYPE html>
<html>
<head>

    <title>ResumeIQ Agent</title>

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

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }

        button {
            background: black;
            color: white;
            padding: 12px 20px;
            border: none;
            margin-top: 20px;
            cursor: pointer;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>AI Resume Screening Agent</h1>

    <form
        action="/analyze"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        <label>Upload Resume</label>

        <input
            type="file"
            name="resume"
            required
        >

        <label>Job Description</label>

        <textarea
            name="job_description"
            rows="10"
            required
        ></textarea>

        <button type="submit">
            Analyze Resume
        </button>

    </form>

</div>

</body>
</html>