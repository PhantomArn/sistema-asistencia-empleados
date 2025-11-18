<?php
namespace App\Controllers;

abstract class BaseController
{
    protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }

    protected function json(array $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function validate(array $data, array $rules): array
    {
        $errors = [];
        foreach ($rules as $field => $rule) {
            if (!isset($data[$field]) || empty(trim($data[$field]))) {
                $errors[$field] = "El campo $field es obligatorio.";
            } elseif ($rule === 'codigo' && !preg_match('/^EMP\d{3}$/', $data[$field])) {
                $errors[$field] = "Formato inválido. Use: EMP001";
            }
        }
        return $errors;
    }
}