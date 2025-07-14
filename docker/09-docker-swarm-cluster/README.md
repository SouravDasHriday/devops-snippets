# Lab 09: Docker Swarm Cluster Deployment

This example shows how to deploy a scalable, resilient service using Docker Swarm. A `docker-compose.yaml` file defines services for local development, but a **stack file** (which is nearly identical in syntax) is used to deploy services to a Swarm cluster.

### Key Swarm Concepts

-   **Stack:** A group of interrelated services that are managed together as a single unit. It's the Swarm equivalent of a `docker-compose` project.
-   **Service:** The definition of a task to be executed on the cluster nodes. A service can be composed of multiple running container instances, called **replicas**.
-   **`deploy` key:** This is the most important part of a Swarm stack file. It is ignored by `docker-compose` but used by `docker stack deploy` to define deployment-related configurations:
    -   `replicas`: How many instances of the container to run.
    -   `update_config`: How to perform rolling updates (parallelism, delay).
    -   `restart_policy`: What to do if a container fails (self-healing).
    -   `placement`: Rules for where containers can be scheduled (e.g., only on worker nodes with specific labels).

### How to Deploy

1.  **Initialize the Swarm (on the manager node):**
    ```bash
    docker swarm init
    # To add worker nodes, run the 'docker swarm join' command provided by the init output on other machines.
    ```

2.  **Deploy the Stack:**
    ```bash
    # The '-c' flag points to the compose/stack file, and 'mystack' is the stack name.
    docker stack deploy -c docker-stack.yaml mystack
    ```

3.  **Check the Services:**
    ```bash
    # List all services in the stack
    docker service ls
    
    # See the individual container replicas for the 'web' service
    docker service ps mystack_web
    ```

4.  **Scale a Service:**
    ```bash
    # Scale the web service to 5 replicas
    docker service scale mystack_web=5
    ```

5.  **Remove the Stack:**
    ```bash
    docker stack rm mystack
    ```
