import json
from app.services.openai_service import ask_ai


def extract_skills(text):

    prompt = f"""
    Extract technical skills from the text below.

    Return ONLY valid JSON array.

    Example:
    ["Python", "FastAPI", "Docker"]

    Text:
    {text}
    """

    response = ask_ai(prompt)

    print("OPENAI RESPONSE =>", response)

    try:
        return json.loads(response)

    except json.JSONDecodeError:
        return []