<b> Привет! </b>
Ты только что поменял статус у поста "{{ $post->name }}" с id: {{ $post->id }}
<a href="{{ route('posts.show', $post->id) }}"> Посмотреть этот пост </a>
