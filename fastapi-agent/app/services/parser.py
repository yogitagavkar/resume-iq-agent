from pypdf import PdfReader

def parse_resume(file):
    pdf = PdfReader(file.file)

    text = ""

    for page in pdf.pages:
        text += page.extract_text()

    return text