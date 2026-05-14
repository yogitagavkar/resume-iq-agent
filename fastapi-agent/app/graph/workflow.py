from langgraph.graph import StateGraph
from app.graph.nodes import *

def build_graph():
    graph = StateGraph(dict)

    graph.add_node("resume_parser", resume_parser_node)
    graph.add_node("jd_parser", jd_parser_node)
    graph.add_node("resume_skill", resume_skill_node)
    graph.add_node("scoring", scoring_node)

    graph.set_entry_point("resume_parser")

    graph.add_edge("resume_parser", "jd_parser")
    graph.add_edge("jd_parser", "resume_skill")
    graph.add_edge("resume_skill", "scoring")

    return graph.compile()

async def run_graph(resume, jd):

    graph = build_graph()

    state = {
        "resume": resume,
        "jd_text": jd
    }

    result = graph.invoke(state)

    matched_skills = list(
        set(result["skills"]) &
        set(result["jd_skills"])
    )

    missing_skills = list(
        set(result["jd_skills"]) -
        set(result["skills"])
    )

    return {
        "candidate_name": "Demo Candidate",

        "match_score": result["score"],

        "skills_found": result["skills"],

        "matched_skills": matched_skills,

        "missing_skills": missing_skills,

        "recommendation":
            "Good Fit"
            if result["score"] > 60
            else "Not Suitable"
    }