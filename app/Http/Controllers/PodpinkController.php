<?php

namespace App\Http\Controllers;

use App\Services\YoutubeService;
use Illuminate\Http\Request;

class PodpinkController extends Controller
{
    /**
     * Exibe a página principal do PodPink com os últimos vídeos.
     */
    public function index(YoutubeService $youtubeService)
    {
        // Busca os últimos 4 vídeos do canal usando o serviço
        $videos = $youtubeService->getLatestVideos(4);

        return view('podpink', compact('videos'));
    }
}
