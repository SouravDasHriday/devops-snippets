# DevOps Snippets: Docker

This repository is a collection of curated, production-oriented Docker snippets from a DevOps perspective. The focus is on best practices for building images, orchestration, networking, security, and observability.

## Structure

Each numbered directory covers a specific Docker concept:

-   **[01-dockerfile-best-practices](./01-dockerfile-best-practices/):** Crafting optimized, secure, and efficient Dockerfiles.
-   **[02-docker-compose-basics](./02-docker-compose-basics/):** Fundamental `docker-compose` usage.
-   **[03-app-static-site](./03-app-static-site/):** Deploying a simple static HTML site with NGINX.
-   **[04-app-dynamic-lamp](./04-app-dynamic-lamp/):** A classic LAMP (PHP/MySQL) stack with best practices.
-   **[05-app-dynamic-nodejs-mongo](./05-app-dynamic-nodejs-mongo/):** A Node.js and MongoDB stack.
-   **[06-volumes-and-data](./06-volumes-and-data/):** Examples of data persistence using volumes.
-   **[07-networking](./07-networking/):** Demonstrations of different Docker network types.
-   **[08-load-balancing-haproxy](./08-load-balancing-haproxy/):** High-availability setup using HAProxy.
-   **[09-docker-swarm-cluster](./09-docker-swarm-cluster/):** Orchestrating services at scale with Docker Swarm.
-   **[10-monitoring-stack](./10-monitoring-stack/):** A complete Prometheus + Grafana monitoring stack for Docker.

## DevOps Principles Applied

-   **Reproducibility:** Using specific versions, not `latest`.
-   **Security:** Running as non-root users, using secrets, multi-stage builds to reduce attack surface.
-   **Efficiency:** Caching layers in Dockerfiles, creating small images.
-   **Configuration as Code:** Defining entire environments in `yaml` files and managing secrets with `.env`.
-   **Observability:** Built-in monitoring stack to see what's happening.
-   **Scalability & High Availability:** Using Swarm and load balancers.
