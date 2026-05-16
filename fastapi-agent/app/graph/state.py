from typing import TypedDict
from typing import List
from fastapi import UploadFile


class ResumeState(TypedDict):

    resume: UploadFile

    resume_text: str

    jd_text: str

    skills: List[str]

    jd_skills: List[str]

    score: int

    recommendation: str