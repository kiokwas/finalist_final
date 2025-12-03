# Escalate Me If You Can - SQLi CTF


This repository contains a deliberately vulnerable web application (login SQL injection) for CTF use.


## Goal for participants
- You are given one valid credential: test:test
- Use SQL injection on the login form to escalate from that user to the admin user and read the flag stored in admin.secret


Flag: igoh25{SQLI_USER_TO_ADMIN_ESCALATION}


## How to run (development / CTF host)
1. Install Docker and Docker Compose.
2. From the repository root run:
docker-compose up --build
3. Wait for services to be ready. Web UI will be at http://localhost:8080
4. Log in with: test / test


## Notes for hosts
- The app is intentionally vulnerable. Do not expose publicly without containment.
- The MySQL container initializes the database from mysql/init.sql
