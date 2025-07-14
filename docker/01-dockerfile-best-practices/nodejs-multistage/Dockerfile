# Use a slim base image for a smaller footprint
FROM python:3.10-slim

WORKDIR /app

# Create a dedicated, non-root user for the application
# -D: do not assign a password
RUN adduser -D myappuser

# Copy requirements file and install dependencies first for caching
COPY requirements.txt .
RUN pip install --no-cache-dir -r requirements.txt

# Copy the application code
COPY . .

# Change ownership of the app directory to the new user
RUN chown -R myappuser:myappuser /app

# Switch to the non-root user
USER myappuser

EXPOSE 5000

CMD ["python", "app.py"]
