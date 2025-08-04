provider "google" {
  project = "as-connect-468012"
  region  = "us-central1"
  zone    = "us-central1-a"
}

resource "google_compute_network" "vpc_network" {
  name = "asconnect-vpc"
}

resource "google_compute_firewall" "default" {
  name    = "asconnect-firewall"
  network = google_compute_network.vpc_network.name

  allow {
    protocol = "tcp"
    ports    = ["80", "443", "8080"]
  }

  source_ranges = ["0.0.0.0/0"]
}

resource "google_compute_instance" "asconnect_vm" {
  name         = "asconnect-vm"
  machine_type = "e2-standard-2" # Big instance for 91 days; downsize later manually
  zone         = "us-central1-a"

  boot_disk {
    initialize_params {
      image = "debian-cloud/debian-12"
      size  = 20
    }
  }

  network_interface {
    network = google_compute_network.vpc_network.name

    access_config {
      // Required for external IP
    }
  }

  metadata_startup_script = <<-EOT
    #!/bin/bash
    apt-get update -y
    apt-get install -y apt-transport-https ca-certificates curl software-properties-common git

    curl -fsSL https://get.docker.com -o get-docker.sh
    sh get-docker.sh

    usermod -aG docker ubuntu

    DOCKER_COMPOSE_VERSION="v2.24.4"
    mkdir -p /usr/local/lib/docker/cli-plugins
    curl -SL https://github.com/docker/compose/releases/download/1.29.2/docker-compose-linux-x86_64 \
      -o /usr/local/lib/docker/cli-plugins/docker-compose
    chmod +x /usr/local/lib/docker/cli-plugins/docker-compose

    cd /home
    git clone https://github.com/saivivek-01/as-connect.git
    cd as-connect
    docker compose up -d
  EOT

  tags = ["http-server", "https-server"]

  service_account {
    email  = "saivivekmallavalli@gmail.com" # or remove this block to use default
    scopes = ["cloud-platform"]
  }
}
