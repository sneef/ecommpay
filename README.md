# ecommpay

Запуск проекта<br><br>

Варианты:<br>
1) Без Docker<br>
- скопировать файлы проекта из репозитория на локальный сервер и запустить;<br><br>

2) С Docker:<br>
- склонировать репозиторий:<br>
git clone https://github.com/sneef/ecommpay.git<br>
- Копируем файлы ключей (id_rsa, id_rsa.pub) в папку .docker-conf/.ssh/<br>
- Запускаем команды в корне проекта:<br>
    docker-compose build app --no-cache<br>
    docker-compose up -d<br>
- После автоматической сборки образа и всего проекта в целом, должны запуститься все контейнеры (их всего 2)<br>
- Проверить открылся ли сайт проекта по ссылке:<br>
http://localhost:8021/<br>