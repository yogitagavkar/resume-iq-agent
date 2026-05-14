from app.services.parser import parse_resume
from app.services.skill_extractor import extract_skills
from app.services.scorer import calculate_score

def resume_parser_node(state):
    state["resume_text"] = parse_resume(state["resume"])
    return state

def jd_parser_node(state):
    state["jd_skills"] = extract_skills(state["jd_text"])
    return state

def resume_skill_node(state):
    state["skills"] = extract_skills(state["resume_text"])
    return state

def scoring_node(state):
    state["score"] = calculate_score(
        state["skills"],
        state["jd_skills"]
    )
    return state