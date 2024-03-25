<?php

function dd(mixed ...$vars): void
{
    echo '<pre>';
    foreach ($vars as $var) {
        var_dump($var);
        echo '<hr>';
    }
    echo '</pre>';
    die();
}

function view(string $path, array $data = []): void
{
    extract($data);
    $fragments = explode('.', $path);
    require base_path("resources/views/{$fragments[0]}/{$fragments[1]}.view.php");
}

function base_path(string $path = ''): string
{
    return BASE_PATH . ($path ? ('/' . $path) : $path);
}

function method(string $method): void
{
    echo <<<HTML
        <input type="hidden" name="_method" value="$method"/>
    HTML;

}

function get_csrf_token(): string
{
    return bin2hex(random_bytes(32));
}

function csrf_token()
{

    $_SESSION['csrf_token'] = get_csrf_token();
    echo <<<HTML
        <input type="hidden" name="_csrf" value="{$_SESSION['csrf_token']}">
    HTML;
}