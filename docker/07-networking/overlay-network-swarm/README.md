# Overlay Network for Docker Swarm

When you run services across multiple hosts in a Docker Swarm cluster, you need a network that allows containers to communicate securely, regardless of which physical node they are running on. This is what an **overlay network** provides.

An overlay network creates a virtual, encrypted network that spans all nodes in the swarm. Docker handles all the complex routing, tunneling, and encryption required to make this work seamlessly.

### Key Features

-   **Multi-host Communication:** Allows containers on different nodes to communicate directly.
-   **Load Balancing:** Swarm's built-in ingress mesh and DNS round-robin provide load balancing for services on the overlay network.
-   **Security:** Traffic on an overlay network can be encrypted by default.

This `docker-stack.yaml` file defines a custom overlay network (`my-overlay-net`) and attaches two services to it. When deployed to a swarm, the `frontend` replicas can reach the `backend` replicas no matter which nodes they are scheduled on.
