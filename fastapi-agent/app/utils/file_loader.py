from pypdf import PdfReader
from docx import Document

def load_pdf(file):
    reader = PdfReader(file)

    text = ""

    for page in reader.pages:
        text += page.extract_text()

    return text


def load_docx(file):
    doc = Document(file)

    text = "\n".join([
        para.text for para in doc.paragraphs
    ])

    return text