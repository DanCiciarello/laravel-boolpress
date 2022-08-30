@component('mail::message')
<p>Ehi {{ $user->name }},</p>
<p>il nuovo post <strong>{{ $post->title }}</strong> è stato creato correttamente.</p>

<p>Per vedere il tuo post:</p>

<img src="{{ Storage::url($post->cover_img) }}" alt="{{ $post->title }}">
@component('mail::button', ['url' => route('admin.posts.show', $post->slug)])
Vedi il post
@endcomponent

Ciao!
@endcomponent