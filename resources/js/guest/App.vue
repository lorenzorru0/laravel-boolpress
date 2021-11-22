<template>
	<div>
		<Header/>
		<main>
			<Posts/>
		</main>
		<Footer/>
	</div>
</template>

<script>
import Header from './components/Header.vue';
import Posts from './components/Posts.vue';
import Footer from './components/Footer.vue';
export default {
	name: 'App',
	components: {
		Header,
		Posts,
		Footer
	}	
}
</script>