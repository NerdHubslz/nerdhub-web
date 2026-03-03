<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class YoutubeService
{
    private $apiKey;

    private $channelId;

    public function __construct()
    {
        $this->apiKey = config('services.youtube.key');
        $this->channelId = config('services.youtube.channel_id');
    }

    /**
     * Busca informações do canal do YouTube
     *
     * @return array
     */
    public function getInfoChannel()
    {
        return Cache::remember(
            'youtube_podpink_info_channel',
            43200,
            function () {
                $apiKey = config('services.youtube.key');
                $channelId = config('services.youtube.channel_id');

                // Se as chaves não existirem (ex: no ambiente local das outras pessoas), retorna array vazio para não quebrar a tela.
                if (! $apiKey || ! $channelId) {
                    Log::warning(
                        'Credenciais do YouTube Data API (YOUTUBE_API_KEY ou YOUTUBE_CHANNEL_ID) não configuradas.',
                    );

                    return []; // Retorna um array vazio para o componente não falhar
                }

                try {
                    // Endpoint de search da API v3 do YouTube
                    //
                    $response = Http::get(
                        'https://www.googleapis.com/youtube/v3/channels',
                        [
                            'key' => $apiKey,
                            'id' => $channelId,
                            'part' => 'statistics,snippet,contentDetails,id',
                        ],
                    );

                    if ($response->successful()) {
                        return $response->json('items') ?? [];
                    }

                    Log::error(
                        'Erro ao consumir a API do YouTube: '.
                            $response->body(),
                    );

                    return [];
                } catch (\Exception $e) {
                    Log::error(
                        'Exceção ao tentar buscar vídeos do YouTube: '.
                            $e->getMessage(),
                    );

                    return [];
                }
            },
        );
    }

    /**
     * Busca os últimos vídeos do canal do YouTube
     *
     * @param  int  $maxResults  Número de vídeos para buscar
     */
    public function getLatestVideos(int $maxResults = 5): array
    {
        // Usa o cache do Laravel para evitar estourar o limite de requisições da API.
        // Guarda no cache por 12 horas (43200 segundos).
        return Cache::remember(
            'youtube_podpink_latest_videos_'.$maxResults,
            43200,
            function () use ($maxResults) {
                $infoChannel = $this->getInfoChannel();

                // Evita estourar "Undefined array key 0" se a API falhar ou a API Key estiver vazia
                if (empty($infoChannel) || ! isset($infoChannel[0]['contentDetails']['relatedPlaylists']['uploads'])) {
                    return [];
                }

                // pega id de playlist de uploads
                $playlistId = $infoChannel[0]['contentDetails']['relatedPlaylists']['uploads'];

                // Se as chaves não existirem (ex: no ambiente local das outras pessoas), retorna array vazio para não quebrar a tela.
                if (! $this->apiKey || ! $this->channelId) {
                    Log::warning(
                        'Credenciais do YouTube Data API (YOUTUBE_API_KEY ou YOUTUBE_CHANNEL_ID) não configuradas.',
                    );

                    return []; // Retorna um array vazio para o componente não falhar
                }

                try {
                    // Endpoint de search da API v3 do YouTube
                    $response = Http::get(
                        'https://www.googleapis.com/youtube/v3/playlistItems',
                        [
                            'key' => $this->apiKey,
                            'channelId' => $this->channelId,
                            'maxResults' => $maxResults,
                            'playlistId' => $playlistId,
                            'part' => 'snippet,id',
                        ],
                    );

                    if ($response->successful()) {
                        return $response->json('items') ?? [];
                    }

                    Log::error(
                        'Erro ao consumir a API do YouTube: '.
                            $response->body(),
                    );

                    return [];
                } catch (\Exception $e) {
                    Log::error(
                        'Exceção ao tentar buscar vídeos do YouTube: '.
                            $e->getMessage(),
                    );

                    return [];
                }
            },
        );
    }
}
