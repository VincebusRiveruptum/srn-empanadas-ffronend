sudo chmod -R 777 ./frontend && \
docker run --rm \
    -v ./frontend:/var/www/html \
    shinsenter/codeigniter4:latest \
    sh -c "echo 'CodeIgniter project created' && exit 0" && \
sudo chmod -R 777 ./frontend