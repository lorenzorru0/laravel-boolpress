<template>
	<section>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-3">
                    <h1 class="fw-bolder">Welcome to Boolpress blog Home</h1>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container main_guest">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <router-view></router-view>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li v-for="category in categories" :key="category.id"><a v-if="category.id % 2 == 1" href="">{{category.name}}</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li v-for="category in categories" :key="category.id"><a v-if="category.id % 2 == 0" href="">{{category.name}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tags widget-->
                    <div class="card mb-4">
                        <div class="card-header">Tags</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li v-for="tag in tags" :key="tag.id"><a v-if="tag.id % 2 == 1" href="">{{tag.name}}</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li v-for="tag in tags" :key="tag.id"><a v-if="tag.id % 2 == 0" href="">{{tag.name}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
	</section>
</template>

<script>
	export default {
		name: 'Main',
		data() {
			return {
                categories: [],
                tags: []
			}
		}, 
        mounted() {
			axios.get('/api/categories')
			.then((response) => {
				// handle success
				this.categories = response.data.data;
			})
			.catch( (error) => {
				// handle error
				console.log(error);
			});

            axios.get('/api/tags')
			.then((response) => {
				// handle success
				this.tags = response.data.data;
			})
			.catch( (error) => {
				// handle error
				console.log(error);
			})
		}
	}
</script>