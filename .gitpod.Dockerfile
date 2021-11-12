FROM mitchazj/workspace-mysql

USER gitpod

RUN sudo composer self-update

# Export environment variables
ENV DATABASE_USER=db
ENV DATABASE_HOST=localhost
ENV DATABASE_PASSWORD=db
