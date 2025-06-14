@props(['youtube_url'])

@if($youtube_url)
    @php

        // Handle different YouTube URL formats
        if (strpos($youtube_url, 'youtu.be/') !== false) {
            // Short URL format: https://youtu.be/VIDEO_ID
            $video_id = substr($youtube_url, strrpos($youtube_url, '/') + 1);
        } elseif (strpos($youtube_url, 'watch?v=') !== false) {
            // Standard URL format: https://www.youtube.com/watch?v=VIDEO_ID
            parse_str(parse_url($youtube_url, PHP_URL_QUERY), $query);
            $video_id = $query['v'] ?? '';
        } elseif (strpos($youtube_url, 'embed/') !== false) {
            // Already embed format
            $embed_url = $youtube_url;
        } else {
            $video_id = '';
        }

        // Create embed URL if we have a video ID
        if (!isset($embed_url) && !empty($video_id)) {
            $embed_url = "https://www.youtube.com/embed/" . $video_id;
        }
    @endphp

    @if(isset($embed_url) && !empty($embed_url))
        <div class="relative w-full mb-4 rounded-lg overflow-clip aspect-video shadow-md">
            <iframe
                class="absolute top-0 left-0 w-full h-full"
                src="{{ $embed_url }}"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen>
            </iframe>
        </div>
    @endif
@endif
