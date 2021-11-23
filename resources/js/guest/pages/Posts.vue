<template>
	<section>
		<div v-for="post in posts" :key="post.id" class="card mb-4">
			<div class="card-body">
				<h2 class="card-title">{{post.title}}</h2>
				<div class="small text-muted">{{post.created_at.substr(0, 10)}} by {{post.username}}</div>
				<p class="card-text">{{post.content.substr(0, 100) + '...'}}</p>
				<a class="btn btn-primary" href="">Read more →</a>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		name: 'Posts',
		data() {
			return {
				posts: []
			}
		},
		mounted() {
			axios.get('/api/posts')
			.then((response) => {
				// handle success
				this.posts = response.data.data;
			})
			.catch( (error) => {
				// handle error
				console.log(error);
			})
		}
	}
</script>