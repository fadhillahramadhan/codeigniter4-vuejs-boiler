<template>
	<div id="app">
		<Header />
		<main class="container">
			<!-- Dynamic component rendering based on server route -->
			<component :is="currentComponent" :serverData="serverData" />
		</main>
		<Footer />
	</div>
</template>

<script>
import Header from './components/Header.vue';
import Welcome from './components/Welcome.vue';
import Dashboard from './components/Dashboard.vue';
import Profile from './components/Profile.vue';
import Footer from './components/Footer.vue';

export default {
	name: 'App',
	components: {
		Header,
		Welcome,
		Dashboard,
		Profile,
		Footer,
	},
	data() {
		return {
			serverData: window.serverData || {},
		};
	},
	computed: {
		currentComponent() {
			// Map server pages to Vue components
			const pageComponents = {
				home: 'Welcome',
				dashboard: 'Dashboard',
				profile: 'Profile',
			};

			return pageComponents[this.serverData.currentPage] || 'Welcome';
		},
	},
	mounted() {
		// You can also access server data here for global setup
		console.log('Server data:', this.serverData);
	},
};
</script>

<style>
* {
	transition: background-color 300ms ease, color 300ms ease;
}

*:focus {
	background-color: rgba(221, 72, 20, 0.2);
	outline: none;
}

html,
body {
	color: rgba(33, 37, 41, 1);
	font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial,
		sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji';
	font-size: 16px;
	margin: 0;
	padding: 0;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	text-rendering: optimizeLegibility;
}

.container {
	margin: 0 auto;
	max-width: 1100px;
	padding: 2.5rem 1.75rem 3.5rem 1.75rem;
}
</style>
