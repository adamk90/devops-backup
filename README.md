# DevOps - Backup

## Preparation
1. Start a "DevOps - Docker, Kubernetes" in the BME cloud
2. Expose ports 8088
4. If needed: tune the /etc/resolv.conf and add 8.8.8.8 as nameserver
5. Clone the https://github.com/szatmari/devops-backup repository to the cloud VM

## Build and start the infrastructure
1. Check the Dockerfiles created for the PHP and backup service
2. Build the custom images
```bash
docker-compose build --no-cache backup
docker-compose build --no-cache php-app
```
3. Start the services
```bash
docker-compose up -d
```

## Check the backup configuration
1. Check the rsnapshot.conf configuration
2. Discover the volume mounts
3. Test the first backup. Execute the following command in the backup container:
```bash
rsnapshopt daily
```
4. Check the created backup volume and its content
5. Try to create an inconsistent backup

