<?php

namespace App\Integration;

class Client {
    //Это один из вариантов реализации, можно было бы и в условный config-файл вынести это
    private $projects = [
        '2001' => [                     //project_id = 2001
            'url' => 'http://example.com/',
            'dataType' => 'json'
        ],
        '2002' => [
            'url' => 'http://example.com/',
            'dataType' => 'soap'
        ]
    ];

    public function sendRequest($endpoint = '', $data = [], $projectId = 0) {
        // Заглушка для отправки запроса во внешнюю систему
        if (! array_key_exists($projectId, $this->projects)) {
            //Проект не найден:
            return 404;
        }
        
        $project = $this->projects[$projectId];

        if($project['dataType'] === 'soap') {
            //Здесь делаем условный SOAP-запрос
        } else if ($project['dataType'] === 'soap') {
            //Здесь делаем условный CURL-запрос
        }

        // Возвращаем успешный ответ
        return 200;
    }
}