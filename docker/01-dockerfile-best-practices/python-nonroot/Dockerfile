# Use a slim base image for a smaller footprint
FROM python:3.10-slim

# Set the working directory
WORKDIR /app

# Create a dedicated, non-root user for the application
# -S: create a system user, -D: do not assign a password
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

# Expose the application port
EXPOSE 5000

# Define the command to run the application
CMD ["python", "app.py"]
