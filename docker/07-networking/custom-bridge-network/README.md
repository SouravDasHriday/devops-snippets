# Custom Bridge Network

While Docker provides a `default` bridge network, it has limitations. The most significant is that containers on the default bridge can only communicate via their internal IP addresses, which are ephemeral and unreliable.

By creating a **custom bridge network**, you enable automatic DNS resolution between containers. This is the **standard and recommended approach** for multi-container applications running on a single host.

### Key Benefits

1.  **Automatic Service Discovery:** Containers can reach each other by using their service name as a hostname (e.g., `ping frontend`). Docker's embedded DNS server resolves the service name to the correct container's IP address.
2.  **Better Isolation:** You can have services (like a database) attached to the custom network without exposing any ports to the host machine. This creates a more secure "backend" network, only accessible by other containers within the same Compose project.
3.  **Cleaner Configuration:** It eliminates the need for the outdated `links` directive.

The `docker-compose.yaml` file in this directory demonstrates this by creating a `frontend` service that can `ping` a `backend` service by its name, even though the `backend` exposes no ports.
