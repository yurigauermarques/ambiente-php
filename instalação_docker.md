## Instalação Docker

### Material
- [How to install Docker CE on CentOS8](https://www.youtube.com/watch?v=tVoZkq1DKv8)
- [Get Docker Engine - Community for CentOS](https://docs.docker.com/install/linux/docker-ce/centos/)

### Instalação
- Instalação de pacotes requeridos
```bash
sudo yum install -y yum-utils  device-mapper-persistent-data lvm2
```
- Adicionar o repositório estável
```bash
sudo yum-config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo
```
- Executar o seguinte comando`docker`.
```bash
sudo yum install docker-ce docker-ce-cli containerd.io
```
- Para iniciar o `docker`
```bash
sudo systemctl start docker
```
- Para testar o `docker`
```bash
sudo docker run hello-world
```

## Instalação Docker Compose

### Material
- [How to installl docker composer](https://unihost.com/help/how-to-install-and-use-docker-compose-on-centos-8/)

### Instalação
- Instalação de pacotes requeridos
```bash
sudo yum install curl
```
- Antes de proceder verifique o caminho do diretório `bin`, isso depende da 
  compilação do `sshd` e vai ser importante para executar o próximo comando, 
  atualize se necessário, existem duas possibilidades, verifique qual dos dois
  diretórios tem seus binarios, e faça o download do docker-compose para ele:
  - `/usr/local/bin`
  - `/usr/bin`
- Fazer o download da ultima versão do `Docker Compose`
```bash
curl -L https://github.com/docker/compose/releases/download/1.25.5/docker-compose-`uname -s`-`uname -m` -o /usr/bin/docker-compose
```
- Modificar a permissão para poder executar o `Docker Composer`
```bash
chmod +x /usr/bin/docker-compose;
````
- Para conferir se funcionou verifique a versão do `Docker Composer`
```bash
docker-compose --version
````
- Obs: se não funcionar repita os comando de cima, porém troque o `/usr/bin/docker-compose` para `/usr/local/bin/docker-compose`