<?php

// Chave da API do YouTube
$api_key = 'api-youtube';

// ID do canal do YouTube
$channel_id = 'id_canal';
//channelIds
// Número máximo de vídeos para recuperar
$max_results = 10;

// URL da solicitação para a API do YouTube
$url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId='.$channel_id.'&maxResults='.$max_results.'&key='.$api_key;

// Fazendo a solicitação e obtendo os resultados
$resultados = json_decode(file_get_contents($url));

// Loop pelos resultados e exibir título, link e descrição de cada vídeo
foreach ($resultados->items as $item) {
    // Título do vídeo
    $titulo = $item->snippet->title;
    
    // ID do vídeo
    if(isset($item->id->videoId)){    
      $video_id = $item->id->videoId;      
      // Link do vídeo
      $link = 'https://www.youtube.com/watch?v='.$video_id;
      
      // Descrição do vídeo
      $descricao = $item->snippet->description;
      
      // Exibir os detalhes do vídeo
      echo '<h3>'.$titulo.'</h3>';
      echo '<p><a href="'.$link.'">'.$link.'</a></p>';
      echo '<p>'.$descricao.'</p>';
      echo '<hr>';
    }
}
