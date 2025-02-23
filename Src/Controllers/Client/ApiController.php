<?php

namespace Src\Controllers\Client;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Src\Controllers\BaseController;

class ApiController extends BaseController
{
    public function fetchProvince()
    {
        $client = new Client();
        try {
            $api_key = $_ENV['GHN_API'];
            $response = $client->request('GET', 'https://online-gateway.ghn.vn/shiip/public-api/master-data/province', [
                'headers' => [
                    'token' => $api_key
                ]
            ]);

            header('Content-Type: application/json');
            echo $response->getBody();
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Lỗi khi gọi API: ' . $e->getMessage()]);
        }
    }

    public function fetchDistrict()
    {
        $client = new Client();
        $province_id = intval($_GET['id']);
        $api_key = $_ENV['GHN_API'];
        try {
            $response = $client->request('GET', 'https://online-gateway.ghn.vn/shiip/public-api/master-data/district', [
                'headers' => [
                    'token' => $api_key
                ],
                'json' => [
                    'province_id' => $province_id
                ]
            ]);

            header('Content-Type: application/json');
            echo $response->getBody();
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Lỗi khi gọi API: ' . $e->getMessage()]);
        }
    }

    public function fetchWard()
    {
        $client = new Client();
        $district_id = intval($_GET['id']);
        $api_key = $_ENV['GHN_API'];
        try {
            $response = $client->request('GET', 'https://online-gateway.ghn.vn/shiip/public-api/master-data/ward', [
                'headers' => [
                    'token' => $api_key
                ],
                'json' => [
                    'district_id' => $district_id
                ]
            ]);

            header('Content-Type: application/json');
            echo $response->getBody();
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Lỗi khi gọi API: ' . $e->getMessage()]);
        }
    }

    public function calculateFee(string $district, string $ward, int $price, array $products)
    {
        $client = new Client();

        $url = 'https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee';

        $headers = [
            'Content-Type' => 'application/json',
            'Token' => $_ENV['GHN_API'],
            'ShopId' => $_ENV['GHN_SHOP']
        ];

        $data = [
            "from_district_id" => 253,
            "from_ward_code" => 600401,
            "service_id" => null,
            "service_type_id" => 'standard',
            "to_district_id" => $district,
            "to_ward_code" => $ward,
            "height" => 15,
            "length" => 15,
            "weight" => 800,
            "width" => 30,
            "insurance_value" => $price,
            "cod_failed_amount" => 2000,
            "coupon" => null,
            "items" => [
                [
                    "name" => "TEST1",
                    "quantity" => 1,
                    "height" => 200,
                    "weight" => 1000,
                    "length" => 200,
                    "width" => 200
                ]
            ]
        ];

        try {
            $response = $client->post($url, [
                'headers' => $headers,
                'json' => $data 
            ]);

            $body = $response->getBody();
            $result = json_decode($body, true); 

            echo "Phí vận chuyển: " . ($result['data']['total'] ?? 'Không có dữ liệu') . " VND";
        } catch (RequestException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
