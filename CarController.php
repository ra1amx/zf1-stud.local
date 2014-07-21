<?php

/*  aprs.fi ключ API 29355.FnpRXLyIrKohtz
 * Отправляем запрос для user=ra1amx-10
 * получаем ответ значения
 * передаем переменной this
 */

class CarController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function speedAction() {
        // тут пишем что надо делать -т.е. формируем запрос к api.aprs.fi

        //require_once 'Zend/Http/Client.php';  // * не верный вариант
        $client = new Zend_Http_Client();
        // * ниже формируем ссылку запроса c кодом своего API
        $client->setUri("http://api.aprs.fi/api/get?name=RA1AMX-10&what=loc&apikey=29355.FnpRXLyIrKohtz");
        $client->setMethod('GET');         // * метод запроса
        //$response = $client->send($client->getRequest()); // * пробуем и так
        $response = $client->request()->getBody();
        //echo '<pre>';                    // * смотрим, что у нас в ответ
        //print_r(json_decode($response)); // * весь листинг на экран
        $this->view->json_data = json_decode($response);
    }

    public function indexAction() {
        //   
    }

}
