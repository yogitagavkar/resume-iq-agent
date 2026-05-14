from pydantic import BaseModel
from typing import List

class ResumeResponse(BaseModel):
    candidate_name: str
    match_score: int
    skills_found: List[str]
    matched_skills: List[str]
    missing_skills: List[str]
    recommendation: str