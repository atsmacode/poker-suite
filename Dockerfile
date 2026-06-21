FROM node:20-slim

# Install curl (needed for Claude Code's native installer) and clean up
RUN apt-get update && apt-get install -y --no-install-recommends curl ca-certificates \
    && rm -rf /var/lib/apt/lists/*

# Install Claude Code's native binary (lands in ~/.local/bin, matches what it expects)
RUN curl -fsSL https://claude.ai/install.sh | bash
ENV PATH="/root/.local/bin:${PATH}"

WORKDIR /workspace

ENTRYPOINT ["claude"]