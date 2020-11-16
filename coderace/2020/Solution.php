<?php

class BaseClass {

    public $stringExploded;

    public $stringReponseExploded;

    public const STRUCTURE = [
        'bytes_iniciais' => 8,
        'tamanho'        => [2, "string"],
        'data_hora'      => [6, "string"],
        'lat_atual'      => [4, "double"],
        'lng_atual'      => [4, "double"],
        'lat_anterior'   => [4, "double"],
        'lng_anterior'   => [4, "double"],
        'id_jogador'     => [4, "double"],
        'id_equipe'      => [1, "double"],
        'velocidade'     => [2, "double"],
        'direcao_status' => [2, "byte"],
        'saude'          => [1, "double"], // 0 a 100
        'skin_veiculo'   => [1, "double"],
        'tipo_veiculo'   => [1, "double"],
        'localization'   => [1, "localization"],
        'tamanho_regiao' => [1, "double"],
        'regiao'         => ['n', "size"],
        'tamanho_equipe' => [1, "double"],
        'equipe'         => ['n', "size"],
        'bytes_finais'   => 4
    ];

    public $response;

    public $finalResponse = [];


    function __construct($string) {
        $this->stringExploded = explode(' ', $string);
        $this->stringReponseExploded = [];

        foreach(self::STRUCTURE as $key => $size) {
            if (empty($size[1])) {
                $response = array_splice($this->stringExploded, 0, $size);
                $this->finalResponse[$key] = $this->transformChr($response);
            } else if($size[1] == "string") {
                $response = array_splice($this->stringExploded, 0, $size[0]);
                $this->finalResponse[$key] = (string) $this->transformHexaToString($response, $key);
            } else if($size[1] == "double") {
                $response = array_splice($this->stringExploded, 0, $size[0]);
                $this->finalResponse[$key] = (string) $this->transformHexaToString($response, $key);
            } else if($size[1] == "localization") {
                $response = array_splice($this->stringExploded, 0, $size[0]);
                $this->transformHexaToStringByteLocalization($response);

            } else if($size[1] == "byte") {
                $response = array_splice($this->stringExploded, 0, $size[0]);
                [$status, $satelites, $direction] = $this->transformHexaToStringByte($response);
                $this->finalResponse['status'] = $status;
                $this->finalResponse['satelites'] = $satelites;
                $this->finalResponse['direcao'] = $direction;
            } else if(!is_numeric($size[0])) {
                $sizeEntity = $this->finalResponse['tamanho_'.$key];
                $response = array_splice($this->stringExploded, 0, $sizeEntity);
                $this->finalResponse[$key] = $this->transformChr($response);
            }
        }

        $this->print();
    }

    function getResponse()
    {
        return json_encode($this->finalResponse);
    }

    function print()
    {
        //var_dump($this->finalResponse);
    }

    function transformChr($array)
    {
        $response = '';

        foreach($array as $value) {
            $response .= chr(hexdec($value));
        }

        return $response;
    }

    function transformHexaToStringByte($array)
    {

        foreach($array as $value) {
            $response[] = base_convert($value, 16, 2);
        }

        $binaryOne = str_pad($response[0], 8, "0", STR_PAD_LEFT);
        $binaryTwo = str_pad($response[1], 8, "0", STR_PAD_LEFT);

        $status = base_convert($binaryOne[0].$binaryOne[1], 2, 10);

        $satelites = base_convert($binaryOne[2].$binaryOne[3].$binaryOne[4].$binaryOne[5], 2, 10);

        $direction = base_convert($binaryOne[6].$binaryOne[7].$binaryTwo, 2, 10);

        return [$status, $satelites, $direction];
    }

    // 4 Longitude anterior: +1=Leste, -0=Oeste
    // 5 Latitude anterior: +1=Norte, -0=Sul
    // 6 Longitude atual: +1=Leste, -0=Oeste
    // 7 Latitude atual: +1=Norte, -0=Sul

    // sul = negativo norte = pos

    // esquerda negativo // direita positivo

    function transformHexaToStringByteLocalization($array)
    {
        foreach($array as $value) {
            $response[] = base_convert($value, 16, 2);
        }
        var_dump($array);

        $binary = str_pad($response[0], 8, "0", STR_PAD_LEFT);
        var_dump($binary);

        //long anterior
        if (!boolval($binary[4])) {
            $this->finalResponse['lng_anterior'] = "-".$this->finalResponse['lng_anterior'];
        }

        //lat anterior
        if(!boolval($binary[5])) {
            $this->finalResponse['lat_anterior'] = "-".$this->finalResponse['lat_anterior'];
        }

        //long atual
        if (!boolval($binary[6])) {
            $this->finalResponse['lng_atual'] = "-".$this->finalResponse['lng_atual'];
        }

        //lat atual
        if (!boolval($binary[7])) {
            $this->finalResponse['lat_atual'] = "-".$this->finalResponse['lat_atual'];
        }
    }

    function transformHexa($array)
    {
        $response = '';

        foreach($array as $value) {
            $response .= hexdec($value);
        }

        return $response;
    }

    function transformHexaToString($array, $key)
    {

        $response = [];

        if ($key == 'data_hora') {
            foreach($array as $value) {
                $response[]= hexdec($value);
            }

            $response = date("yy-m-d H:i:s",  mktime($response[3],$response[4], $response[5], $response[1], $response[2] ,$response[0]));
        } else if(in_array($key,['lng_atual'])) {
            $response = number_format(hexdec(implode('', $array)) / 1800000, 5);
        } else if(in_array($key,['lat_atual'])) {
            $response = number_format(hexdec(implode('', $array)) / 1800000, 5);
        } else if(in_array($key,['lng_anterior'])) {
            $response = number_format(hexdec(implode('', $array)) / 1800000, 5);
        } else if(in_array($key,['lat_anterior'])) {
            $response = number_format(hexdec(implode('', $array)) / 1800000, 5);
        } else if(in_array($key, ['id_jogador', 'id_equipe', 'velocidade', 'saude', 'skin_veiculo', 'tipo_veiculo', 'tamanho_regiao', 'tamanho_equipe'])) {
            $response = hexdec(implode('', $array));
        } else {
            foreach($array as $value) {
                $response[]= hexdec($value);
            }

            $response = (int) implode('', $response);
        }

        return $response;
    }

}

$string = "43 4f 44 45 52 41 43 45 00 5a 14 0a 1b 09 12 2f 03 23 0e b6 05 be d7 88 03 2b 77 0c 05 b9 34 5e 00 e6 db 74 17 00 3a C8 DF 44 3f 13 0F 10 4d 65 72 63 61 64 6f 20 43 6f 6c 6f 6e 69 61 6c 17 54 69 6d 65 20 46 61 78 69 6e 61 6c 20 64 6f 20 53 6f 74 75 72 6e 6f 32 30 32 30";

$obj = new BaseClass($string);

printf(str_replace("\\", "", json_encode($obj->getResponse(),JSON_PRETTY_PRINT)));



?>