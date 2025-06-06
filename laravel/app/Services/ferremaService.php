<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class FerremaService
{
    protected function buildUrl(string $endpoint): string
    {
        $baseUrl = env('FERREMA_API_URL', 'http://host.docker.internal/api/');
        return rtrim($baseUrl, '/') . '/' . ltrim($endpoint, '/');
    }

    public function get(string $endpoint, array $params = [], bool $json = true)
    {
        try {
            $url = $this->buildUrl($endpoint);
            $response = Http::get($url, $params);
            return $this->handleResponse($response, $json);
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function post(string $endpoint, array $data = [], bool $json = true)
    {
        try {
            $url = $this->buildUrl($endpoint);
            $response = $json
                ? Http::withHeaders(['Content-Type' => 'application/json'])->post($url, $data)
                : Http::asForm()->post($url, $data);
            return $this->handleResponse($response, $json);
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function put(string $endpoint, array $data = [], bool $json = true)
    {
        try {
            $url = $this->buildUrl($endpoint);
            $response = $json
                ? Http::withHeaders(['Content-Type' => 'application/json'])->put($url, $data)
                : Http::asForm()->put($url, $data);
            return $this->handleResponse($response, $json);
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function delete(string $endpoint, array $data = [], bool $json = true)
    {
        try {
            $url = $this->buildUrl($endpoint);
            $response = $json
                ? Http::withHeaders(['Content-Type' => 'application/json'])->send('DELETE', $url, ['json' => $data])
                : Http::asForm()->send('DELETE', $url, ['form_params' => $data]);
            return $this->handleResponse($response, $json);
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    protected function handleResponse($response, bool $json)
    {
        $data = $json ? $response->json() : $response->body();

        if (!$response->successful()) {
            return false;
        }

        if ($json && isset($data['status']) && $data['status'] !== 'success') {
            return false;
        }

        return $data;
    }
}
