# Lab 06: Docker Volumes and Data Persistence

This lab demonstrates and explains the two primary ways to persist data in Docker containers: **Bind Mounts** and **Named Volumes**.

When a container is removed, its filesystem is also deleted. Volumes are the mechanism for saving data beyond a single container's lifecycle.

---

### 1. Bind Mounts

A bind mount maps a file or directory on the **host machine** directly into a container.

-   **Use Case:** Primarily for **local development**. Excellent for mounting source code into a container so you can edit files on your host and see the changes live without rebuilding the image.
-   **Pros:**
    -   Simple to understand and use.
    -   Allows direct access and modification of container files from the host.
-   **Cons:**
    -   Tightly couples the container to the host's filesystem structure.
    -   Can lead to file permission issues between the host user and the container user.
    -   Not easily portable to other machines with different directory layouts.
-   **Syntax in `docker-compose.yaml`:**
    ```yaml
    volumes:
      - /path/on/host:/path/in/container
    ```

---

### 2. Named Volumes

A named volume is a data volume managed entirely by the **Docker engine**. Docker creates and manages a directory for the volume within its own storage area on the host (e.g., `/var/lib/docker/volumes/` on Linux).

-   **Use Case:** The **standard and preferred method for production**. Ideal for all stateful data, such as databases, application uploads, or configuration that needs to persist.
-   **Pros:**
    -   Decoupled from the host's filesystem structure, making it highly portable.
    -   Managed by Docker, which handles permissions and drivers.
    -   Can be easily backed up, restored, or migrated.
-   **Cons:**
    -   Accessing the data directly on the host is less straightforward than with a bind mount.
-   **Syntax in `docker-compose.yaml`:**
    ```yaml
    services:
      myservice:
        volumes:
          - my-app-data:/path/in/container

    volumes:
      my-app-data: # Declaration of the named volume
    ```
The `docker-compose.yaml` file in this directory provides a runnable example of both types.
