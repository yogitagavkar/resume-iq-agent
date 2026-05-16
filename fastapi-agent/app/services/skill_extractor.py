def extract_skills(text):

    if not text:

        return []

    common_skills = [

        "python",
        "fastapi",
        "laravel",
        "php",
        "sql",
        "mysql",
        "docker",
        "redis",
        "langgraph",
        "openai",
        "api",
        "machine learning"
    ]

    found=[]

    text=text.lower()

    for skill in common_skills:

        if skill in text:

            found.append(skill)

    return found