<?php
/*
 * (c) Adam Biciste <adam@freshost.cz>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace bicisteadm;

use GuzzleHttp;

class Cryptolens
{
    private $server;
    private $token;
    private $ProductId;

    public function __construct($ProductId, $token, $server = "https://app.cryptolens.io/api/")
    {
        $this->server = $server;
        $this->token = $token;
        $this->ProductId = $ProductId;
    }

    public function keyVerification($key)
    {
        // https://stackoverflow.com/a/53823135
        $client = new GuzzleHttp\Client([
            \GuzzleHttp\RequestOptions::VERIFY => \Composer\CaBundle\CaBundle::getSystemCaRootBundlePath()
        ]);
        $res = $client->request('GET', $this->server."/key/GetKey", [
            'query' => [
                "token" => $this->token,
                "ProductId" => $this->ProductId,
                "Key" => $key
            ],
        ]);

        $res = json_decode($res->getBody(), true);

        if ($res["result"] == "0") {
            $date_now = strtotime(date("Y-m-d\TH:i:s"));

            if (strtotime($res["licenseKey"]["expires"]) > $date_now and !$res["licenseKey"]["block"]) {
                return true;
            } else {
                return false;
            }
        }
    }


}