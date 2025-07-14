# Dockerfile Best Practices

This directory contains examples of well-structured Dockerfiles that follow common best practices.

### Key Principles

1.  **Use Multi-Stage Builds:** Separate the build environment from the final runtime environment. This drastically reduces the final image size and attack surface by excluding build tools, development dependencies, and source code.
2.  **Run as a Non-Root User:** Avoid running containers as `root`. This is a critical security measure to limit the potential damage of a container compromise.
3.  **Optimize Layer Caching:** Order your commands from least to most frequently changing. Copy `package.json` and install dependencies *before* copying the rest of your source code. This way, Docker can reuse the cached dependency layer if only your application code changes.
4.  **Use Specific Version Tags:** Always use specific tags like `node:18-alpine` instead of `node:latest`. This ensures your builds are reproducible and won't break when a new `latest` version is released.
5.  **Use `.dockerignore`:** Prevent unnecessary files (like `node_modules`, `.git`, `.env`) from being copied into the build context, which speeds up the build and reduces image size.
