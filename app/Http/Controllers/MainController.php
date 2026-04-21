<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $articles = json_decode(file_get_contents(public_path().'/articles.json'));

        // $jsonPath = public_path('articles.json');
        // $jsonContent = file_get_contents($jsonPath);
        // $articles = json_decode($jsonContent);

        // // Проверка ошибок JSON
        // if (json_last_error() !== JSON_ERROR_NONE) {
        //     dd('JSON Error: ' . json_last_error_msg());
        // }

        // // Проверка первого элемента
        // if (isset($articles[0])) {
        //     dd($articles[0]); // Покажет структуру первого объекта
        // } else {
        //     dd('$articles пуст или не массив');
        // }

        // $jsonPath = public_path('articles.json');

        // if (!file_exists($jsonPath)) {
        //     abort(500, 'Файл articles.json не найден по пути: ' . $jsonPath);
        // }

        // $jsonContent = file_get_contents($jsonPath);
        // if ($jsonContent === false) {
        //     abort(500, 'Не удалось прочитать файл articles.json');
        // }

        // $articles = json_decode($jsonContent);
        // if (json_last_error() !== JSON_ERROR_NONE) {
        //     abort(500, 'Ошибка JSON: ' . json_last_error_msg());
        // }

        // // Дополнительная проверка наличия поля shortDesc у всех элементов
        // foreach ($articles as $index => $article) {
        //     if (!isset($article->shortDesc)) {
        //         abort(500, "У элемента с индексом $index отсутствует поле shortDesc");
        //     }
        // }

        return view('components/home', ['articles' => $articles]);
    }

    public function show($full_image){
        return view('components/galery', ['image' => $full_image]);
    }
}
