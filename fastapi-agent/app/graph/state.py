from typing import TypedDict, List

class ResumeState(TypedDict):
    resume_text: str
    jd_text: str
    skills: List[str]
    jd_skills: List[str]
    score: int