<?php

    final class Request
    {
        public function __construct(
            private string $uri,
            private string $method,
            private array $queryParams
        )
        {

        }

        public static function createFromGlobal(): self
        {
            $requestUri = $_SERVER['REQUEST_URI'];
            $queryString = $_SERVER['QUERY_STRING'];
            $requestMethod = $_SERVER['REQUEST_METHOD'];
            $queryParams = [];

            parse_str($queryString, $queryParams);

            $url = '/' . ltrim(str_replace('?' . $queryString, '', $requestUri), '/');

            return new Request($url, $requestMethod, $queryParams);
        }


        public function getUri(): string
        {
            return $this->uri;
        }

        public function getMethod(): string
        {
            return $this->method;
        }

        public function get(string $name, mixed $default = null): mixed
        {
            if (isset($this->queryParams[$name])) {
                return $this->queryParams[$name];
            }
            if (filter_has_var(INPUT_POST, $name)) {
                return filter_input(INPUT_POST, $name);
            }
            return $default;
        }
    }
