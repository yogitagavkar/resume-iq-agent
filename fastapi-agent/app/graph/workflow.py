from langgraph.graph import (
    StateGraph,
    START,
    END
)

from app.graph.nodes import *
from app.graph.state import ResumeState


def build_graph():

    graph = StateGraph(ResumeState)

    graph.add_node(
        "resume_parser",
        resume_parser_node
    )

    graph.add_node(
        "jd_parser",
        jd_parser_node
    )

    graph.add_node(
        "resume_skill",
        resume_skill_node
    )

    graph.add_node(
        "scoring",
        scoring_node
    )

    graph.add_node(
        "recommendation",
        recommendation_node
    )

    graph.add_node(
        "rejection",
        rejection_node
    )

    graph.add_edge(
        START,
        "resume_parser"
    )

    graph.add_edge(
        "resume_parser",
        "jd_parser"
    )

    graph.add_edge(
        "jd_parser",
        "resume_skill"
    )

    graph.add_edge(
        "resume_skill",
        "scoring"
    )

    graph.add_conditional_edges(
        "scoring",
        route_candidate,
        {
            "recommendation":"recommendation",
            "rejection":"rejection"
        }
    )

    graph.add_edge(
        "recommendation",
        END
    )

    graph.add_edge(
        "rejection",
        END
    )

    return graph.compile()


async def run_graph(resume, jd):

    graph = build_graph()

    state = {
        "resume": resume,
        "jd_text": jd
    }

    result = graph.invoke(state)

    matched_skills = list(
        set(result["skills"])
        &
        set(result["jd_skills"])
    )

    missing_skills = list(
        set(result["jd_skills"])
        -
        set(result["skills"])
    )


    # Dynamic workflow graph

    if result["score"] > 60:

        graph_mermaid = """
        graph TD
        START --> resume_parser
        resume_parser --> jd_parser
        jd_parser --> resume_skill
        resume_skill --> scoring
        scoring --> recommendation
        recommendation --> END
        """

    else:

        graph_mermaid = """
        graph TD
        START --> resume_parser
        resume_parser --> jd_parser
        jd_parser --> resume_skill
        resume_skill --> scoring
        scoring --> rejection
        rejection --> END
        """


    return {

        "candidate_name":"Demo Candidate",

        "match_score":
            result["score"],

        "skills_found":
            result["skills"],

        "matched_skills":
            matched_skills,

        "missing_skills":
            missing_skills,

        "recommendation":
            result.get(
                "recommendation",
                "Not Available"
            ),

        "workflow_graph":
            graph_mermaid
    }