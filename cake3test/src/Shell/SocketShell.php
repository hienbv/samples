<?php

/**
 * Description of SocketShell
 *
 * @author HienBV <hienbv.it@gmail.com>
 */

namespace App\Shell;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Logic\WAMP\Chat;

class SocketShell extends \Cake\Console\Shell
{

    public function main()
    {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Chat()
                )
            ), 9090
        );

        $server->run();
    }

}
