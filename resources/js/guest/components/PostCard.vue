<template>
    <div class="card-body">
        <h2 class="card-title">{{data.title}}</h2>
        <div class="small text-muted">{{data.created_at.substr(0, 10)}} by {{data.username}}</div>
        <p class="card-text">{{data.content.substr(0, 100) + '...'}}</p>
        <a class="btn btn-primary" href="">Read more →</a>
    </div>
</template>

<script>
	export default {
		name: 'PostCard',
		props: {
            data: Object
        }
	}
</script>