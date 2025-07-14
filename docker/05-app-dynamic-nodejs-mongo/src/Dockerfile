# Start from a specific, lightweight Node.js image
FROM node:18-alpine

# Set the working directory inside the container
WORKDIR /usr/src/app

# Copy package files first to leverage Docker's layer caching.
# The dependency layer will only be rebuilt if package.json or package-lock.json changes.
COPY package*.json ./
RUN npm install

# Copy the rest of the application source code
COPY . .

# Create a non-root user and group for security
RUN addgroup -S appgroup && adduser -S appuser -G appgroup
# Change ownership of the app directory to the new user
RUN chown -R appuser:appgroup /usr/src/app
# Switch to the non-root user
USER appuser

# Expose the port the application runs on
EXPOSE 3000

# The command to run the application
CMD [ "node", "server.js" ]
