DevOps Perspective: Observability is a cornerstone of modern DevOps. You cannot effectively manage what you cannot see. This module provides a complete, production-grade monitoring stack for a Docker environment using three industry-standard open-source tools:

    Prometheus: A powerful time-series database and monitoring system. It operates on a "pull" model, where it periodically scrapes metrics from configured "targets." It is the de facto standard for cloud-native monitoring.

    Grafana: A leading visualization tool. It connects to data sources like Prometheus and allows you to build rich, interactive dashboards to query, visualize, and alert on your metrics.

    Exporters (cAdvisor, Node Exporter): Prometheus itself doesn't know how to get metrics from Docker or a Linux host. It relies on small, specialized services called "exporters."

        cAdvisor (Container Advisor) is a Google project that exposes detailed resource usage and performance metrics for all running containers on a host.

        Node Exporter is a Prometheus-maintained exporter that exposes detailed hardware and OS metrics from the host machine itself (CPU, memory, disk, network I/O, etc.).

Putting these together gives you a powerful observability platform to monitor the health and performance of both your Docker host and every container running on it.
