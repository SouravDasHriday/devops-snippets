# Docker Compose Basics

Docker Compose is a tool for defining and running multi-container Docker applications. With a single `docker-compose.yaml` file, you can configure an application's services, networks, and volumes. Then, with a single command (`docker-compose up`), you can create and start all the services from your configuration.

### Key DevOps Benefits

-   **Environment Consistency:** Ensures all developers run the exact same environment, eliminating "it works on my machine" issues.
-   **Configuration as Code:** Your entire local development stack is defined in a single, version-controlled file.
-   **Simplified Workflow:** Drastically simplifies the process of starting, stopping, and rebuilding complex applications.
-   **Service Isolation:** Services run in isolated environments but can easily communicate over a shared network defined by Compose.

This directory contains a very basic example to illustrate these core concepts using a single NGINX service.
