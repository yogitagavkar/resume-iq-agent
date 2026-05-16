def calculate_score(skills, jd_skills):

    print("Resume skills:", skills)

    print("JD skills:", jd_skills)

    if not jd_skills:

        print(
            "No JD skills found"
        )

        return 0

    matched = list(
        set(skills)
        &
        set(jd_skills)
    )

    score = (
        len(matched)
        /
        len(jd_skills)
    ) * 100

    return round(score)