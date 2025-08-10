# AS-connect 

**AS-connect** is a vendor lock-free, private cloud–based alumni portal that showcases a scalable, privacy-respecting deployment model, built entirely on open-source technologies.  
It was inspired by professional alumni networks (like IITs and Ivy League platforms) and built to highlight full control over cloud infrastructure without relying on PaaS or SaaS lock-in.

🚀 Live at: https://asconnect.begetter.me
---

##  Highlights

- ✅ **Vendor Lock-Free Architecture**  
  Fully deployable on *any cloud provider* (GCP, Azure, AWS, Oracle, or on-prem) with minimal changes.

- 🏛️ **Private Cloud Infrastructure**  
  Self-hosted PHP + MariaDB stack on virtual machines (not managed services).

- ⚙️ **Infrastructure as Code (IaC)**  
  Provisioned using **Terraform**, allowing easy reproducibility and multi-cloud portability.

- 🔐 **Data Ownership & Privacy**  
  Full control over alumni data with no external dependencies (no Firebase, RDS, or Supabase).

- 🚀 **Production-ready Stack**  
  - Web Server: Apache2  
  - Backend: PHP 8.2  
  - Database: MariaDB  
  - OS: Debian (Bookworm)

---

## 📸 Features

- Alumni registration & authentication
- Admin control panel
- Event & job posting
- Alumni directory and contact
- Clean, responsive UI

---

## 📂 Project Structure
asconnect/
├── infra/               # Terraform scripts for VM provisioning
├── sql/                 # Database schema and seed files
├── public_html/         # PHP frontend and backend
├── README.md


## 🧠 Why It Matters

This project is more than just an alumni portal — it demonstrates:
	•	Cloud-agnostic deployment mindset
	•	Self-managed full-stack infra
	•	Avoidance of cloud vendor lock-in
	•	Understanding of networking, security, and provisioning

Ideal for demonstrating DevOps readiness, cloud independence, and real-world infrastructure understanding.


## 👨‍💻 Built By

Sai Vivek
Final-year B.Tech student, cloud & DevOps enthusiast
Check out my portfolio (https://begetter.me)
