from flask import Flask

# Create the Flask app instance
app = Flask(__name__)

@app.route('/')
def hello():
    return "<h1>Hello from a Python Flask App!</h1><p>This is running as a non-root user inside a Docker container.</p>"

if __name__ == '__main__':
    # Run the app, listening on all available network interfaces on port 5000
    app.run(host='0.0.0.0', port=5000)
