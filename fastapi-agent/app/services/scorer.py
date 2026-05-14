def calculate_score(candidate_skills, jd_skills):
    matched = list(
        set(candidate_skills) &
        set(jd_skills)
    )

    score = int(
        (len(matched) / len(jd_skills)) * 100
    )

    return score