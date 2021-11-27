@component('mail::message')
# Your Post was Liked

{{$liker->name}} Liked Your Post.

@component('mail::button', ['url' => route("posts.show",$post)])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
