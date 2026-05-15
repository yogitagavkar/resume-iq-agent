from fastapi import FastAPI, UploadFile, Form,HTTPException,File
from app.graph.workflow import run_graph

app = FastAPI()

@app.post("/analyze")
async def analyze_resume(
    resume: UploadFile = File(...),
    job_description: str = Form(...)
):

    try:

        result = await run_graph(
            resume,
            job_description
        )

        return result

    except Exception as e:

        print("ERROR =>", str(e))

        raise HTTPException(
            status_code=500,
            detail=str(e)
        )