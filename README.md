# Sistema de Portarias Midit 
Projeto para gestão de portarias e servidores.

## Configuração do Projeto
Siga as instruções abaixo para configurar e executar o projeto em sua máquina.

### Pré-requisitos
- Git
- Docker (opcional)
- Composer
- PHP
- node.js

### Instalação
```sh
    # Clone o repositório
    > git clone https://github.com/Casmei/portarias-ifnmg.git

    # Acesse a pasta do projeto
    > cd portarias-ifnmg

    # Crie o arquivo de configuração das variáveis de ambiente (Linux)
    > cp .env.example .env

    # Crie o arquivo de configuração das variáveis de ambiente (Windows)
    > copy .env.example .env
```
### Iniciando o Projeto
```sh
    # Instale as dependências do projeto com o Composer
    > composer install

    # Gere a chave de segurança requisitada pelo Laravel
    > php artisan key:generate

    # Execute as migrações do banco de dados ( Valide nas envs as credenciais de conexão com o banco caso dê erro )
    > php artisan migrate --seed

    # Inicie o sistema
    > php artisan serve

    # Em outro terminal rode os seguintes comandos
    > npm install

    > npm run dev
```

### Banco de Dados
Como eu falei anteriormente, é necessário que você valide nas envs a conexão do seu banco. Porém, para facilitar o processo, existe um `docker-compose.yml` contendo uma imagem do postgres, para usa-la, basta rodar esse comando:
```sh
    # Subindo o docker
    > docker-compose up --build
```

### Configuração finalizada ✅
Agora basta acessar essa url: http://127.0.0.1:8000

# Algumas imagens do projeto
- Login
  ![image](https://github.com/Casmei/portarias-ifnmg/assets/68354933/a30ff6a0-daed-41f9-9807-6f3df04b5b94)

- Tela inicial do Administrador e Gestor
![image](https://github.com/Casmei/portarias-ifnmg/assets/68354933/9f367f8c-c05c-4195-86cd-3d73d2f9e257)

- Listagem de Servidores
![image](https://github.com/Casmei/portarias-ifnmg/assets/68354933/f8baec2d-4a79-46ae-8746-8970f4d570d0)

- Criação de um servidor
![image](https://github.com/Casmei/portarias-ifnmg/assets/68354933/829b7d1c-9ed0-49b4-b2f3-ca0356d1f98c)

- Criação de vários servidores através de um arquivo csv
![image](https://github.com/Casmei/portarias-ifnmg/assets/68354933/f897d936-f1e1-4567-8b15-afe8951e481c)

- Criação de uma portaria
![image](https://github.com/Casmei/portarias-ifnmg/assets/68354933/343c4a93-095a-4b1f-9457-a8f9110b55c5)

- Listagem de portarias
![image](https://github.com/Casmei/portarias-ifnmg/assets/68354933/aa81c6cb-3560-45d5-b33b-76e81d4c3d13)






