<template>
	<section>
		<h2>Lista tutti post</h2>
		<ul>
			<li v-for="post in posts" :key="post.id">
                <h2>{{post.title}}</h2>
                <p>{{post.content}}</p>
            </li>
		</ul>
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