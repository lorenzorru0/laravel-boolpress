<template>
	<section>
		<div v-for="post in posts" :key="post.id" class="card mb-4">
			<PostCard :data="post"/>
		</div>
	</section>
</template>

<script>
import PostCard from './../components/PostCard.vue'; 

	export default {
		name: 'SinglePost',
		components: {
			PostCard
		},
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